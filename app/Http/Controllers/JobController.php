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

    public function index(Request $request)
    {
        // If any filter/search params present, delegate to search()
        if ($request->hasAny(['keywords', 'location', 'job_type', 'min_salary'])) {
            return $this->search($request);
        }

        // Only show active jobs to the public
        $jobs = Job::public()->oldest()->paginate(9);
        return view('jobs.index')->with('jobs', $jobs);
    }

    public function create(){
        if (auth()->user()->role !== 'company') {
            abort(403, 'Unauthorized. Only employers can create jobs.');
        }
        return view('jobs.create');
    }

    public function show(Job $job){
        return view('jobs.show')->with('job', $job);  
    }


    public function store(Request $request){
        if (auth()->user()->role !== 'company') {
            abort(403, 'Unauthorized. Only employers can create jobs.');
        }
        $validatedData = $request->validate([
            'title'               => 'required|string|max:255',
            'description'         => 'required|string',
            'salary'              => 'required|integer',
            'salary_max'          => 'nullable|integer|gte:salary',
            'tags'                => 'nullable|string',
            'job_type'            => 'required|string',
            'remote'              => 'required|boolean',
            'experience_level'    => 'nullable|string',
            'education_level'     => 'nullable|string',
            'industry'            => 'nullable|string',
            'vacancies'           => 'nullable|integer|min:1',
            'application_deadline'=> 'nullable|date|after:today',
            'requirements'        => 'nullable|string',
            'benefits'            => 'nullable|string',
            'address'             => 'nullable|string',
            'city'                => 'required|string',
            'state'               => 'required|string',
            'zipcode'             => 'nullable|string',
            'contact_email'       => 'required|string',
            'contact_phone'       => 'nullable|string',
            'company_name'        => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo'        => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website'     => 'nullable|url',
            'latitude'            => 'nullable|numeric',
            'longitude'           => 'nullable|numeric',
            'status'              => 'nullable|string|in:active,draft,closed',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        // Default to active if not set
        $validatedData['status'] = $validatedData['status'] ?? 'active';

        //check for image
        if($request->hasFile('company_logo')){
            $path = $request->file('company_logo')->store('logos' , 'public');
            $validatedData['company_logo'] = $path;
        }

        Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success' , 'Job Added Successfully!');
    }

    //to show the edit page of job 
    public function edit(Job $job):View
    {
        $this->authorize('update' , $job);
        return view('jobs.edit')->with('job' , $job);
    }

    public function update(Request $request, Job $job):RedirectResponse
    {
          $this->authorize('update' , $job);

          $validatedData = $request->validate([
            'title'               => 'required|string|max:255',
            'description'         => 'required|string',
            'salary'              => 'required|integer',
            'salary_max'          => 'nullable|integer|gte:salary',
            'tags'                => 'nullable|string',
            'job_type'            => 'required|string',
            'remote'              => 'required|boolean',
            'experience_level'    => 'nullable|string',
            'education_level'     => 'nullable|string',
            'industry'            => 'nullable|string',
            'vacancies'           => 'nullable|integer|min:1',
            'application_deadline'=> 'nullable|date|after_or_equal:today',
            'requirements'        => 'nullable|string',
            'benefits'            => 'nullable|string',
            'address'             => 'nullable|string',
            'city'                => 'required|string',
            'state'               => 'required|string',
            'zipcode'             => 'nullable|string',
            'contact_email'       => 'required|string',
            'contact_phone'       => 'nullable|string',
            'company_name'        => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo'        => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'company_website'     => 'nullable|url',
            'status'              => 'nullable|string|in:active,draft,closed',
        ]);

        //check for image
        if($request->hasFile('company_logo')){
            if($job->company_logo){
                Storage::disk('public')->delete($job->company_logo);
            }
            $path = $request->file('company_logo')->store('logos' , 'public');
            $validatedData['company_logo'] = $path;
        }

        $job->update($validatedData);

        if($request->from == 'dashboard'){
            return redirect()->route('dashboard.index')->with('success' , 'Job Updated Successfully!');
        }else{
            return redirect()->route('jobs.index')->with('success' , 'Job Updated Successfully!');
        }
    }

    public function destroy(Job $job):RedirectResponse
    {
        $this->authorize('delete' , $job);

        if($job->company_logo){
            Storage::disk('public')->delete($job->company_logo);
        }

        $job->delete();

        if(request()->query('from') == 'dashboard'){
            return redirect()->route('dashboard.index')->with('success' , 'Job Deleted Successfully!');
        }else{
            return redirect()->route('jobs.index')->with('success' , 'Job Deleted Successfully!');
        }
    }

    /**
     * Quick-toggle job status from the employer dashboard.
     * PATCH /jobs/{job}/status
     */
    public function updateStatus(Request $request, Job $job): RedirectResponse
    {
        $this->authorize('update', $job);

        $request->validate([
            'status' => 'required|string|in:active,draft,closed',
        ]);

        $job->update(['status' => $request->status]);

        $label = ucfirst($request->status);
        return redirect()->route('dashboard.index')
            ->with('success', "Job status changed to {$label}!")
            ->with('open_modal_job_id', null);
    }

    public function search(Request $request): View
    {
        $keywords  = strtolower($request->input('keywords', ''));
        $location  = strtolower($request->input('location', ''));
        $jobTypes  = $request->input('job_type', []);     // array of selected types
        $minSalary = $request->input('min_salary');        // numeric or null

        // Only search through active (public) jobs
        $query = Job::public();

        // Search by keywords
        if ($keywords) {
            $query->where(function ($q) use ($keywords) {
                $q->whereRaw('LOWER(title) LIKE ?', ['%' . $keywords . '%'])
                  ->orWhereRaw('LOWER(description) LIKE ?', ['%' . $keywords . '%'])
                  ->orWhereRaw('LOWER(tags) LIKE ?', ['%' . $keywords . '%']);
            });
        }

        // Search by location
        if ($location) {
            $query->where(function ($q) use ($location) {
                $q->whereRaw('LOWER(address) LIKE ?', ['%' . $location . '%'])
                  ->orWhereRaw('LOWER(city) LIKE ?', ['%' . $location . '%'])
                  ->orWhereRaw('LOWER(state) LIKE ?', ['%' . $location . '%'])
                  ->orWhereRaw('LOWER(zipcode) LIKE ?', ['%' . $location . '%']);
            });
        }

        // Filter by job type (checkboxes — multi-select array)
        if (!empty($jobTypes)) {
            $query->whereIn('job_type', $jobTypes);
        }

        // Filter by minimum salary
        if ($minSalary !== null && $minSalary !== '') {
            $query->where('salary', '>=', (int) $minSalary);
        }

        $jobs = $query->oldest()->paginate(9)->withQueryString();

        return view('jobs.index')->with('jobs', $jobs);
    }
 
}

