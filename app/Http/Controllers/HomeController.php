<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View{
        // session()->put('test' , 123);


        // session()->get('test');


        // session()->forget('test');


        $jobs = Job::oldest()->limit(3)->get();
        return view('pages.index')->with('jobs' , $jobs);
    }
}
