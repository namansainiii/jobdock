<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
        $user = Auth::user();

        if ($user->role === 'company') {
            $jobs = Job::where('user_id', $user->id)->with('applicants')->get();
            return view('dashboard.index', compact('user', 'jobs'));
        } else {
            // Employee user: load their job applications and saved/bookmarked jobs
            $applications = Applicant::where('user_id', $user->id)->with('job')->get();
            $bookmarks = $user->bookmarkedJobs()->get();
            return view('dashboard.index', compact('user', 'applications', 'bookmarks'));
        }
    }
}
