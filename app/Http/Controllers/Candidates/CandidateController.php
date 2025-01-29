<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CandidateController extends Controller
{
    public function index()
    {
        // Show all visible candidate profiles to companies
        // $candidate = User::where('role', 'candidate')
        //     ->paginate(10); // Paginate results

        // return view('candidates.profile', compact('candidate'));
    }

    public function show($id)
    {
        $candidate = User::where('role', 'candidate')
            ->findOrFail($id);

        return view('candidates.profile', compact('candidate'));
    }

    public function toggleVisibility($id)
    {
        // Only companies can hide profiles
        if (auth()->user()->role !== 'company') {
            abort(403);
        }

        $candidate = User::findOrFail($id);
        $candidate->update([
            'is_visible' => !$candidate->is_visible
        ]);

        return back()->with('success', 'Profile visibility updated successfully');
    }
}
