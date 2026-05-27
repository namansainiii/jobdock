<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookmarkController extends Controller
{
    //
    public function index(): View{
        $user = Auth::user();

        $bookmarks = $user->bookmarkedJobs()->orderBy('job_user_bookmarks.created_at')->paginate(9);
        
        // dd($bookmarks);
        return view('jobs.bookmarked')->with('bookmarks' , $bookmarks);
    }

    public function store(Job $job): RedirectResponse{
        $user = Auth::user();

        if($user->bookmarkedJobs()->where('job_id' , $job->id)->exists()){
            return back()->with('status' , 'Job is already bookmarked');
        }

        //create new book marking
        $user->bookmarkedJobs()->attach($job->id);

        return back()->with('success', 'Job Bookmarked Successfully!');
    }


    public function destroy(Job $job): RedirectResponse
    {
        $user = Auth::user();
    
        if(!$user->bookmarkedJobs()->where('job_id' , $job->id)->exists()){
            return back()->with('error' , 'Job is not bookmarked');
        }

        $user->bookmarkedJobs()->detach($job->id);
    
        return back()->with('success', 'Bookmark Removed Successfully!');
    }
}
