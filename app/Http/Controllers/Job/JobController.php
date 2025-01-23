<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\Tag;

class JobController extends Controller
{
    public function viewJobs()
    {
        $jobs = Job::paginate(5);

        $company = Company::all();

        $popular_jobs = Job::withCount('company')->orderBy('company_count', 'desc')->take(5)->get();
        $popular_tags = Tag::withCount('jobs')->orderBy('jobs_count', 'desc')->take(5)->get();

        $tags = Tag::all();

        return view('job-lists', compact('jobs', 'company', 'popular_jobs', 'tags'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $country = $request->input('country');
        $category = $request->input('category');
        $tag = $request->input('tag');

        // Retrieve the country code from the request
        $countryCode = request('country');

        // Get the country name from the configuration file
        $countryName = config('countries.' . $countryCode);

        $jobs = Job::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhereHas('company', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('tag', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    })
                    ->orWhere('location', 'like', "%$search%");
            })
            ->when($countryName, function ($query) use ($countryName) {
                $query->whereHas('company', function ($q) use ($countryName) {
                    $q->where('country', $countryName);
                });
            })
            ->get();

        return view('jobs.search-results', compact('jobs'));
    }

    public function show($id)
    {
        $job = Job::with('company')->findOrFail($id);

        return view('job-details', compact('job'));
    }

    public function filterByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();

        $jobs = $tag->jobs()->with('company')->paginate(10);

        return view('job-lists', compact('jobs', 'tag'));
    }

}
