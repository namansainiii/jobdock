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
        $user = auth()->user();

        if ($user->role === 'company') {
            // Check if this company owns the job listing
            if ($applicant->job->user_id !== $user->id) {
                abort(403, 'Unauthorized.');
            }
        } else {
            // Check if this employee owns the application
            if ($applicant->user_id !== $user->id) {
                abort(403, 'Unauthorized.');
            }
        }

        if($applicant->resume_path){
            Storage::disk('public')->delete($applicant->resume_path);
        }

        $jobId = $applicant->job_id;
        $applicant->delete();
            
        return redirect()->back()
            ->with('success', 'Applicant Deleted Successfully!')
            ->with('open_modal_job_id', $jobId);
    }

    public function updateStatus(Request $request, $id): RedirectResponse {
        $applicant = Applicant::findOrFail($id);
        $user = auth()->user();

        // Check if this company owns the job listing
        if ($user->role !== 'company' || $applicant->job->user_id !== $user->id) {
            abort(403, 'Unauthorized.');
        }

        $validatedData = $request->validate([
            'status' => 'required|string|in:Applied,Reviewing,Shortlisted,Interviewing,Rejected'
        ]);

        $applicant->update(['status' => $validatedData['status']]);

        return redirect()->back()
            ->with('success', 'Applicant status updated successfully!')
            ->with('open_modal_job_id', $applicant->job_id)
            ->with('open_drawer_id', $applicant->id);
    }
}
