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
        $salaryRange = $request->input('salary_range');
        $jobType = $request->input('job_type');
        $workExperience = $request->input('work_experience');
        $employmentType = $request->input('employment_type');

        $country = $request->input('country');
        $countryCode = request('country');
        $countryName = config('countries.' . $countryCode);

        $jobs = Job::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhereHas('company', fn($q) => $q->where('name', 'like', "%$search%"))
                    ->orWhereHas('tag', fn($q) => $q->where('name', 'like', "%$search%"))
                    ->orWhereHas('category', fn($q) => $q->where('name', 'like', "%$search%"))
                    ->orWhere('location', 'like', "%$search%");
            })
            ->when($countryName, function ($query) use ($countryName) {
                $query->whereHas('company', function ($q) use ($countryName) {
                    $q->where('country', $countryName);
                });
            })
            ->when($salaryRange, function ($query, $salaryRange) {
                [$min, $max] = explode('-', $salaryRange);
                $query->whereBetween('salary', [(int) $min, (int) $max]);
            })
            ->when($jobType, fn($query, $jobType) => $query->where('job_type', $jobType))
            ->when($workExperience, fn($query, $workExperience) => $query->where('experience', $workExperience))
            ->when($employmentType, fn($query, $employmentType) => $query->where('employment_type', $employmentType))
            ->paginate(10);

        $tags = Tag::all();
        $job_experiences = Job::select('experience')->distinct()->get()->sortBy('experience');
        ;

        $job_types = Job::select('type')->distinct()->get();


        return view('jobs.search-results', compact('jobs', 'tags', 'job_experiences', 'job_types'));
    }

    public function show($id)
    {
        $job = Job::with('company')->findOrFail($id);

        $relatedJobs = Job::where('category_id', $job->category_id)
            ->where('id', '!=', $job->id)
            ->get();

        return view('job-details', compact('job', 'relatedJobs'));
    }

    public function filterByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $jobs = $tag->jobs()->with('company')->paginate(10);

        return view('job-lists', compact('jobs', 'tag'));
    }

}
