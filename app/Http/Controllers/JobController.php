<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;



class JobController extends Controller
{
    // public function index(){
    //     $title = 'Available jobs';
    //     $jobs = [
    //         'Software Developer',
    //         'Java Developer',
    //         'Php Developer',
    //         'C Developer',
    //         'Python Developer'
    //     ];
    
    //     return view('jobs.index', compact('title' , 'jobs'));
    // }

    use AuthorizesRequests;

    public function index()
    {
        // $value = session()->get('test');
        // dd($value);

        // $jobs = Job::all();
        $jobs = Job::oldest()->paginate(6);

        // return view('jobs.index', compact('jobs'));
        return view('jobs.index')->with('jobs', $jobs);  

    }

    public function create(){

        // if(!Auth::check()){
        //     return redirect()->route('login');
        // }
        return view('jobs.create');
    }

    public function show(Job $job){
        // $jobs = Job::all();
        // return "job id $job";

        return view('jobs.show')->with('job', $job);  
        // return view('jobs.show')->compact('job');  

    }


    public function store(Request $request){
        // $title = $request->input('title');
        // $description = $request->input('description');

        // dd($request->file('company_logo'));
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'contact_email' => 'required|string',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);


        //Hardcoded user Id
        // $validatedData['user_id'] = 7;

        $validatedData['user_id'] = auth()->user()->id;

        //check for image
        if($request->hasFile('company_logo')){
            //store the file and get path
            $path = $request->file('company_logo')->store('logos' , 'public');

            //add path to db
            $validatedData['company_logo'] = $path;
        }

        //submit to database
        Job::create($validatedData);

        // Job::create([
        //     'title' => $validatedData['title'], 
        //     'description' => $validatedData['description']
        // ]);

        return redirect()->route('jobs.index')->with('success' , 'Job Added Successfully!');
        // return "Title: $title , description: $description";
    }

    //to show the edit page of job 
    public function edit(Job $job):View
    {
        $this->authorize('update' , $job);

        return view('jobs.edit')->with('job' , $job);
    }

    public function update(Request $request, Job $job):RedirectResponse
    {
          //check if user is Authorized
          //with this form will be shown through url but while saving error will be given 
          $this->authorize('update' , $job);

          $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zipcode' => 'nullable|string',
            'contact_email' => 'required|string',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);

        //check for image
        if($request->hasFile('company_logo')){
            //Delete old images 
            // Storage::disk('public')->delete($job->company_logo);

            if($job->company_logo){
                Storage::disk('public')->delete($job->company_logo);
            }


            //store the file and get path
            $path = $request->file('company_logo')->store('logos' , 'public');

            //add path to db
            $validatedData['company_logo'] = $path;
        }

        //submit to database
        $job->update($validatedData);

        //check if request is from dashobard
        // if(request()->query('from') == 'dashboard'){
        if($request->from == 'dashboard'){
            return redirect()->route('dashboard.index')->with('success' , 'Job Updated Successfully!');
        }else{
            return redirect()->route('jobs.index')->with('success' , 'Job Updated Successfully!');
        }

    }

    public function destroy(Job $job):RedirectResponse
    {

        //check if user is Authorized
        //with this form will be shown through url but while saving error will be given 
        $this->authorize('delete' , $job);

        //check the logo if present then delete
        if($job->company_logo){
            Storage::disk('public')->delete($job->company_logo);
        }

        $job->delete();


        //check if request is from dashobard
        if(request()->query('from') == 'dashboard'){
            return redirect()->route('dashboard.index')->with('success' , 'Job Deleted Successfully!');
        }else{
            return redirect()->route('jobs.index')->with('success' , 'Job Deleted Successfully!');
        }
    }
 
}
