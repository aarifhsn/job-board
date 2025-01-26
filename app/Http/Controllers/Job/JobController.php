<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\Tag;
use App\Models\Category;

class JobController extends Controller
{
    public function viewJobs()
    {
        $jobs = Job::paginate(10);

        $company = Company::all();

        $popular_categories = Category::withCount('jobs')->orderBy('jobs_count', 'desc')->take(5)->get();
        $popular_tags = Tag::withCount('jobs')->orderBy('jobs_count', 'desc')->take(5)->get();

        $tags = Tag::all();

        $job_experiences = Job::select('experience')->distinct()->get()->sortBy('experience');

        $job_types = Job::select('type')->distinct()->get();

        return view('job-lists', compact('jobs', 'company', 'popular_categories', 'tags', 'popular_tags', 'job_experiences', 'job_types'));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $tag = $request->input('tag');

        $country = $request->input('country');
        $countryCode = request('country');
        $countryName = config('countries.' . $countryCode);

        $jobs = Job::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhereHas('company', fn($q) => $q->where('name', 'like', "%$search%"))
                    ->orWhereHas('tag', fn($q) => $q->where('name', 'like', "%$search%"))
                    ->orWhereHas('category', fn($q) => $q->where('name', 'like', "%$search%"));
            })
            ->when($countryName, function ($query) use ($countryName) {
                $query->whereHas('company', function ($q) use ($countryName) {
                    $q->where('country', $countryName);
                });
            })
            ->paginate(10);

        $tags = Tag::all();
        $job_experiences = Job::select('experience')->distinct()->get()->sortBy('experience');

        $job_types = Job::select('type')->distinct()->get();


        return view('jobs.search-results', compact('jobs', 'tags', 'job_experiences', 'job_types', ));
    }

    public function show($id)
    {
        $job = Job::with('company')->findOrFail($id);

        $relatedJobs = Job::where('category_id', $job->category_id)
            ->where('id', '!=', $job->id)
            ->get();

        return view('job-details', compact('job', 'relatedJobs'));
    }

    public function filter(Request $request)
    {
        $jobs = Job::query();

        // Apply filters
        $this->filterByJobType($jobs, $request);
        $this->filterByWorkExperience($jobs, $request);
        $this->filterByDatePosted($jobs, $request);

        // Fetch data for the view
        $jobs = $jobs->get();
        $popular_categories = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(5)
            ->get();

        $tags = Tag::all();
        $job_experiences = Job::select('experience')->distinct()->get()->sortBy('experience');
        $job_types = Job::select('type')->distinct()->get();

        return view('jobs.search-results', compact(
            'jobs',
            'popular_categories',
            'tags',
            'job_experiences',
            'job_types'
        ));
    }

    // Private Methods for Filters
    private function filterByJobType($query, Request $request)
    {
        if ($request->filled('job_type')) {
            $query->where('type', $request->input('job_type'));
        }
    }

    private function filterByWorkExperience($query, Request $request)
    {
        if ($request->filled('work_experience')) {
            $query->whereIn('experience', $request->input('work_experience'));
        }
    }

    private function filterByDatePosted($query, Request $request)
    {
        if ($request->filled('date_posted')) {
            $datePosted = $request->input('date_posted');
            $conditions = [
                'last_hour' => now()->subHour(),
                'last_24_hours' => now()->subDay(),
                'last_7_days' => now()->subDays(7),
            ];

            foreach ($conditions as $key => $value) {
                if (in_array($key, $datePosted)) {
                    $query->where('created_at', '>=', $value);
                }
            }
        }
    }


    public function filterByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $jobs = $tag->jobs()->with('company')->paginate(10);

        return view('job-lists', compact('jobs', 'tag'));
    }

}
