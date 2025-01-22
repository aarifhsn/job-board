<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        // Get all tags
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
