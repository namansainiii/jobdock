<x-layout>
    <section class="max-w-8xl mx-auto flex flex-col md:flex-row gap-4 px-4 py-6">
        <div class="bg-white p-8 rounded-lg shadow-md w-full mx-auto ">
            <h3 class="h3 text-3xl text-center font-bold mb-4">
                My Profile
            </h3>
            @if($user->avatar)
            <div class="div mt-2 flex justify-center">
                <img src="{{asset('storage/' . $user->avatar)}}" alt="{{$user->name}}" class="w-32 h-32 object-cover rounded-full">
            </div>
            @endif
            <form method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-input.text label="Name" id="name" name="name" value="{{$user->name}}" />

                <x-input.text label="Email" id="email" type="email" name="email" value="{{$user->email}}" />

                <x-input.file label="Upload Avatar" id="avatar" name="avatar" />
                
                <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 border rounded hover:bg-green-600 focus:outline-none">Save</button>

            </form>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md w-full mx-auto">
            <h3 class="h3 text-3xl text-center font-bold mb-4">
                My Job Listings
            </h3>
            @forelse($jobs as $job)
            <div class="flex justify-between items-center order-b-2 border-t border-gray-300 py-2">
                <div>
                    <h3 class="text-xl font-semibold">{{$job->title}} <span class="text-sm">({{$job->job_type}})</span></h3>
                    <p class="text-gray-700">{{$job->description}}</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('jobs.edit', ['job' => $job->id, 'from' => 'dashboard']) }}" class="bg-blue-500 text-white px-4 py-2 rounded text-sm">Edit</a>
                    <form method="POST" action="{{ route('jobs.destroy' , $job->id) }}?from=dashboard" onsubmit="return confirm('Are you sure you want to delete this Job?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="mb-2 pl-3 pt-2 pb-2 bg-gray-100 rounded-md">
                <h4 class="text-lg font-semibold mb-2">Applicants</h4>
                @forelse($job->applicants as $applicant)
                <div class="py-2">
                    <p class="text-gray-800">
                        <strong>Name: </strong>{{$applicant->full_name}}
                    </p>
                    @if($applicant->contact_phone)
                        <p class="text-gray-800">
                            <strong>Phone: </strong>{{$applicant->contact_phone}}
                        </p>
                    @endif
                    <p class="text-gray-800">
                        <strong>Email: </strong>{{$applicant->contact_email}}
                    </p>
                    @if($applicant->location)
                        <p class="text-gray-800">
                            <strong>Location: </strong>{{$applicant->location}}
                        </p>
                    @endif

                    @if($applicant->message)
                        <p class="text-gray-800">
                            <strong>Messgae: </strong>{{$applicant->message}}
                        </p>
                    @endif

                    <div class="flex items-center gap-6 my-4 text-sm">
                        <a href="{{ asset('storage/' . $applicant->resume_path )}}" target="_blank" class="text-blue-500 hover:underline">
                            <i class="fas fa-eye"></i>View Resume
                        </a>
                        <a href="{{ asset('storage/' . $applicant->resume_path )}}" target="_blank" class="text-blue-500 hover:underline" download>
                            <i class="fas fa-download"></i>Download Resume
                        </a>
                        <form method="POST" action="{{ route('applicants.destroy' , $applicant->id) }}" onsubmit="return confirm('Are you sure you want to delete the Applicant?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline cursor-pointer"><i class="fas fa-trash"></i>Delete The Applicant</button>
                        </form>
                    </div>
                </div>
                @empty
                    <p class="text-gray-700 mb-6">No Applicants For This Job</p>
                @endforelse
            </div>
            @empty
            <p class="text-gray-700 text-center mt-10">YOU HAVE NO JOB LISTINGS</p>
            @endforelse
        </div>
    </section>
    <x-bottom-banner/>
</x-layout>