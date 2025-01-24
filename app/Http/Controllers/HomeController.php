<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Job;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        // Fetch distinct job types from the jobs table
        $jobTypes = Job::select('type')->distinct()->pluck('type');

        // Fetch jobs for each job type
        $jobsByType = [];
        foreach ($jobTypes as $type) {
            $jobsByType[$type] = Job::where('type', $type)
                ->with('tag')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        }

        // Fetch recent jobs
        $recent_jobs = Job::with('company', 'tag')->latest()->take(10)->get();

        // take latest jobs number or count as the last 30 days jobs and not expired
        $total_latest_jobs = Job::where('created_at', '>=', now()->subDays(30))
            ->where('expiration_date', '>=', now())
            ->count();

        return view('home', compact('categories', 'recent_jobs', 'jobsByType', 'jobTypes', 'total_latest_jobs'));
    }

    public function jobCategories()
    {
        $all_categories = Category::withCount('jobs')->get();

        return view('job-categories', compact('all_categories'));
    }

    public function homeSearch()
    {
        $countries = config('countries');
        return view('home', compact('countries'));
    }



}