<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Job;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->limit(5)
            ->get();

        $popular_categories = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->limit(5)
            ->get();

        $category = Category::where('slug', request('slug'))->first();

        // Fetch jobs that belong to the selected category
        $jobs = $category ? $category->jobs()->paginate(10) : collect();

        return view('categories.browse-by-category', [
            'categories' => $categories,
            'popular_categories' => $popular_categories,
            'jobs' => $jobs,
            'category' => $category->name ?? 'Category not found'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:Categorys,name',
        ]);

        $slug = Str::slug($request->name);
        Category::create(['name' => $request->name, 'slug' => $slug]);

        return back()->with('success', 'Category created successfully.');

        // when creating or editing a Category, save its Category
        // Pass an array of Category IDs to the sync method
        // $job->Categorys()->sync($CategoryIds);
    }
}
