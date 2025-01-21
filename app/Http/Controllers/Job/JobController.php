<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;

class JobController extends Controller
{
    public function viewJobs()
    {
        $jobs = Job::paginate(5);

        $company = Company::all();

        $popular_jobs = Job::withCount('company')->orderBy('company_count', 'desc')->take(5)->get();
        //$popular_jobs = Job::orderBy('views', 'desc')->take(5)->get();

        return view('job-lists', compact('jobs', 'company', 'popular_jobs'));
    }

    public function search(Request $request)
    {
        $jobs = Job::query()
            ->search($request->input('query'))
            ->filterByCountry($request->input('country'))
            ->paginate(10);

        return view('jobs.search-results', compact('jobs'));
    }


}
