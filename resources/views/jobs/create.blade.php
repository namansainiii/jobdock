<x-layout>
    <x-slot name="title">Create Jobs</x-slot>
<div class="bg-white mx-auto p-8 rounded-lg shadow-md w-full md:max-w-3xl">
                <h2 class="text-4xl text-center font-bold mb-4">
                    Create Job
                </h2>
                <form
                    method="POST"
                    action="/jobs"
                    enctype="multipart/form-data"
                >
                @csrf
                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Job Info
                    </h2>

                    <x-input.text label="Job Title" id="title" name="title" placeholder="Software Engineer" />

                    <x-input.text-area label="Job Description" id="description" cols="30" rows="7" name="description" placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team..." />

                    <x-input.text label="Annual Salary" id="salary" type="number" name="salary" placeholder="90000" />

                    <x-input.text-area label="Requirements" id="requirements" rows="2" name="requirements" placeholder="Bachelor's degree in Computer Science" />

                    <x-input.text-area label="Benefits" id="benefits" rows="2" name="benefits" placeholder="Health insurance, 401k, paid time off" />

                    <x-input.text label="Tags (comma-separated)" id="tags" name="tags" placeholder="development,coding,java,python" />

                    <x-input.select label="Job Type" id="job_type" name="job_type" :options="[
                        'Full-Time' => 'Full-Time' , 
                        'Part-Time' => 'Part-Time' 
                        // 'Contract' => 'Contract' , 
                        // 'Temporary' => 'Temporary' , 
                        // 'Internship' => 'Internship' , 
                        // 'Volunteer' => 'Volunteer' , 
                        // 'On-Call' => 'On-Call' 
                    ]" />

                    <x-input.select label="Remote" id="remote" name="remote" :options="[
                        '0' => 'No' , 
                        '1' => 'Yes' 
                    ]" />

                    <x-input.text label="Address" id="address" name="address" placeholder="123 Main St" />

                    <x-input.text label="City" id="city" name="city" placeholder="Albany" />

                    <x-input.text label="State" id="state" name="state" placeholder="NY" />

                    <x-input.text label="ZIP Code" id="zipcode" name="zipcode" placeholder="12201" />

                    <h2 class="text-2xl font-bold mb-6 text-center text-gray-500">
                        Company Info
                    </h2>

                    <x-input.text label="Company Name" id="company_name" name="company_name" placeholder="Company Name" />

                    <x-input.text-area label="Company Description" id="company_description" rows="2" name="company_description" placeholder="Company Description" />

                    <x-input.text label="Company Website" id="company_website" type="url" name="company_website" placeholder="Enter website" />

                    <x-input.text label="Contact Phone" id="contact_phone" name="contact_phone" placeholder="Enter phone Number" />

                    <x-input.text label="Contact Email" id="contact_email" type="email" name="contact_email" placeholder="Email where you want to receive applications" />

                    <x-input.file label="Contact Logo" id="company_logo" name="company_logo" />

                    <button
                        type="submit"
                        class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3 rounded focus:outline-none">
                        Save
                    </button>
                </form>
            </div>
</x-layout>