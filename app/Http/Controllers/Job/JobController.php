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

        $search = $request->input('search');
        $country = $request->input('country');

        // Retrieve the country code from the request
        $countryCode = request('country');

        // Get the country name from the configuration file
        $countryName = config('countries.' . $countryCode);

        $jobs = Job::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhereHas('company', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
            })
            ->when($countryName, function ($query) use ($countryName) {
                $query->whereHas('company', function ($q) use ($countryName) {
                    $q->where('country', $countryName);
                });
            })
            ->get();

        return view('jobs.search-results', compact('jobs'));
    }

}
