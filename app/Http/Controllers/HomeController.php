<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::active()->get();
        return view('home', compact('categories'));
    }

    public function jobCategories()
    {
        $categories = Category::withCount('jobs')->get();

        return view('job-categories', compact('categories'));
    }
}
