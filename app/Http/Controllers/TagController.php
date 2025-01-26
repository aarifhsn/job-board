<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;
use App\Models\Job;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->limit(5)
            ->get();

        $popular_tags = Tag::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->limit(5)
            ->get();

        $tag = Tag::where('name', request('name'))->first();

        // Fetch jobs that belong to the selected tag
        $jobs = $tag ? $tag->jobs()->paginate(10) : collect();

        $job_experiences = Job::select('experience')->distinct()->get()->sortBy('experience');

        $job_types = Job::select('type')->distinct()->get();

        return view('tags.browse-by-tag', [
            'tags' => $tags,
            'popular_tags' => $popular_tags,
            'jobs' => $jobs,
            'tag' => $tag->name ?? 'Tag not found',
            'job_experiences' => $job_experiences,
            'job_types' => $job_types,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name',
        ]);

        $slug = Str::slug($request->name);
        Tag::create(['name' => $request->name, 'slug' => $slug]);

        return back()->with('success', 'Tag created successfully.');

        // when creating or editing a tag, save its tag
        // Pass an array of tag IDs to the sync method
        // $job->tags()->sync($tagIds);
    }
}
