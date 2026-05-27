<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\JobApplied;
use Illuminate\Support\Facades\Mail;


class ApplicantController extends Controller
{
    //route: jobs/{job}/apply
    public function store(Request $request , Job $job): RedirectResponse {

        //check applicant has already apply 
        $existing_applicant = Applicant::where('job_id' , $job->id)->where('user_id' , auth()->id())->exists();
        if($existing_applicant){
            return redirect()->back()->with('error', 'you have already applied to this job');
        }
        $validatedData = $request->validate([
            'full_name' => 'required|string',
            'contact_phone' => 'nullable|string',
            'contact_email' => 'required|string|email',
            'message' => 'nullable|string',
            'location' => 'nullable|string',
            'resume_path' => 'required|file|mimes:pdf|max:2048',
        ]);

        //check for resume
        if($request->hasFile('resume_path')){
            //store the file and get path
            $path = $request->file('resume_path')->store('resume' , 'public');

            //add path to db
            $validatedData['resume_path'] = $path;
        }

        $application = new Applicant($validatedData);
        $application->job_id = $job->id;
        $application->user_id = auth()->id();
        $application->save();

        //send email to owner
        Mail::to($job->user->email)->send(new JobApplied($application , $job));
        // return redirect()->route('jobs.show')->with('success' , 'Job Applied Successfully!');
        return redirect()->back()->with('success' , 'Job Applied Successfully!');

    }



    public function destroy($id): RedirectResponse
    {
        $applicant = Applicant::findOrFail($id);

        if($applicant->resume_path){
            Storage::disk('public')->delete($applicant->resume_path);
        }

        $applicant->delete();
            
        return redirect()->route('dashboard.index')->with('success' , 'Applicant Deleted Successfully!');

    }
}
