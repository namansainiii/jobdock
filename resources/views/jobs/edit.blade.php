<x-layout>
    <x-slot name="title">Edit Jobs</x-slot>
<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
                <h2 class="text-4xl text-center font-bold mb-4">
                    Edit Job
                </h2>
                <form
                    method="POST"
                    action="{{ route('jobs.update' , $job->id)}}"
                    enctype="multipart/form-data"
                >
                @csrf
                @method('PUT')
                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Job Info
                    </h2>

                    <x-input.text label="Job Title" id="title" name="title" placeholder="Software Engineer" :value="old('title' , $job->title)"/>

                    <input type="hidden" name="from" value="{{ request('from') }}">

                    <x-input.text-area label="Job Description" id="description" cols="30" rows="7" name="description" placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..." :value="old('description' , $job->description)"/>

                    <x-input.text label="Annual Salary" id="salary" type="number" name="salary" placeholder="90000" :value="old('salary' , $job->salary)"/>

                    <x-input.text-area label="Requirements" id="requirements" rows="2" name="requirements" placeholder="Bachelor's degree in Computer Science" :value="old('requirements' , $job->requirements)" />

                    <x-input.text-area label="Benefits" id="benefits" rows="2" name="benefits" placeholder="Health insurance, 401k, paid time off" :value="old('benefits' , $job->benefits)"/>

                    <x-input.text label="Tags (comma-separated)" id="tags" name="tags" placeholder="development,coding,java,python" :value="old('tags' , $job->tags)"/>

                    <x-input.select label="Job Type" id="job_type" name="job_type" :options="[
                        'Full-Time' => 'Full-Time' , 
                        'Part-Time' => 'Part-Time' 
                        // 'Contract' => 'Contract' , 
                        // 'Temporary' => 'Temporary' , 
                        // 'Internship' => 'Internship' , 
                        // 'Volunteer' => 'Volunteer' , 
                        // 'On-Call' => 'On-Call' 
                    ]" :value="old('job_type' , $job->job_type)" />

                    <x-input.select label="Remote" id="remote" name="remote" :options="[
                        '0' => 'No' , 
                        '1' => 'Yes' 
                    ]" :value="old('remote' , $job->remote)" />

                    <x-input.text label="Address" id="address" name="address" placeholder="123 Main St" :value="old('address' , $job->address)"/>

                    <x-input.text label="City" id="city" name="city" placeholder="Albany" :value="old('city' , $job->city)"/>

                    <x-input.text label="State" id="state" name="state" placeholder="NY" :value="old('state' , $job->state)"/>

                    <x-input.text label="ZIP Code" id="zipcode" name="zipcode" placeholder="12201" :value="old('zipcode' , $job->zipcode)"/>

                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Company Info
                    </h2>

                    <x-input.text label="Company Name" id="company_name" name="company_name" placeholder="Company Name" :value="old('company_name' , $job->company_name)"/>

                    <x-input.text-area label="Company Description" id="company_description" rows="2" name="company_description" placeholder="Company Description" :value="old('company_description' , $job->company_description)"/>

                    <x-input.text label="Company Website" id="company_website" type="url" name="company_website" placeholder="Enter website" :value="old('company_website' , $job->company_website)"/>

                    <x-input.text label="Contact Phone" id="contact_phone" name="contact_phone" placeholder="Enter phone Number" :value="old('contact_phone' , $job->contact_phone)"/>

                    <x-input.text label="Contact Email" id="contact_email" type="email" name="contact_email" placeholder="Email where you want to receive applications" :value="old('contact_email' , $job->contact_email)"/>

                    <x-input.file label="Contact Logo" id="company_logo" name="company_logo" />

                    <button
                        type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                        Save
                    </button>
                </form>
            </div>
</x-layout>