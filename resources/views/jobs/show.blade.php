<x-layout>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <section class="md:col-span-2">
        <div class="rounded-lg shadow-md bg-white p-3">
            <div class="flex justify-between items-center">
                <a class="block p-4 text-blue-700" href="{{ route('jobs.index') }}">
                    <i class="fa fa-arrow-alt-circle-left"></i>
                    Back To Listings
                </a>
                {{-- just 2 different ways , from both these the edit and delete can be accessed from the url (this will be handled in controller) --}}
                {{-- @auth
                @if(auth()->user()->id == $job->user_id) --}}
                @can('update' , $job)
                <div class="flex space-x-3 ml-4">
                    <a href="{{ route('jobs.edit' , $job->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded">
                        Edit
                    </a>
                    <!-- Delete Form -->
                    <form method="POST" action="{{ route('jobs.destroy' , $job->id) }}" onsubmit="return confirm('Are you sure you want to delete this Job?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded">
                            Delete
                        </button>
                    </form>
                    <!-- End Delete Form -->
                </div>
                @endcan
                {{-- @endif
                @endauth --}}
            </div>
            <div class="p-4">
                <h2 class="text-xl font-semibold">{{$job->title}}</h2>
                <p class="text-gray-700 text-lg mt-2">{{$job->description}}</p>
                <ul class="my-4 bg-gray-100 p-4">
                <li class="mb-2">
                    <strong>Job Type:</strong> {{$job->job_type}}
                </li>
                <li class="mb-2">
                    <strong>Remote:</strong> {{$job->remote ? 'Yes' : 'No'}}
                </li>
                <li class="mb-2">
                    <strong>Salary:</strong> ${{$job->salary}}
                </li>
                <li class="mb-2">
                    <strong>Site Location:</strong> {{$job->city}}, {{$job->state}}
                </li>
                @if($job->tags)
                    <li class="mb-2">
                        <strong>Tags:</strong>
                        {{ucwords(str_replace(',', ', ' ,$job->tags))}}
                    </li>
                @endif
                </ul>
            </div>
        </div>

        <div class="container mx-auto p-4">
            @if($job->requirements || $job->benefits)
            <h2 class="text-xl font-semibold mb-4">Job Details</h2>
            <div class="rounded-lg shadow-md bg-white p-4">
                <h3 class="text-lg font-semibold mb-2 text-blue-500">
                    Job Requirements
                </h3>
                <p>{{$job->requirements}}</p>
                <h3 class="text-lg font-semibold mt-4 mb-2 text-blue-500">
                    Benefits
                </h3>
                <p>{{$job->benefits}}</p>
            </div>
            @endif
            <p class="my-5">
                {{-- Put "Job Application" as the subject of your email
                and attach your resume. --}}
            </p>

            @auth
                @if(auth()->user()->id != $job->user_id)
                    @if(auth()->user()->role === 'employee')
                        <div class="grid grid-cols-2 gap-4">
                            @if(!\App\Models\Applicant::where('user_id', auth()->id())->where('job_id', $job->id)->exists())
                                <div x-data="{ open: false }" id="applicant-form">
                                    <button @click="open = true" class="w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                        Apply Now
                                    </button>
                
                                    <div x-cloak x-show="open" class="fixed inset-0 flex items-center justify-center bg-transparent">
                                        <div @click.away="open = false" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md border border-black-200">
                                            <h3 class="text-lg font-semibold mb-4">
                                                Apply for {{$job->title}}
                                            </h3>
                                            <form method="POST" action="{{route('applicants.store' , $job->id)}}" enctype="multipart/form-data"
                                                x-data="{ useSavedResume: {{ auth()->user()->resume_path ? 'true' : 'false' }} }">
                                                @csrf
                                                <x-input.text label="Full Name" id="full_name" name="full_name" :required="true" placeholder="Full Name"/>
                    
                                                <x-input.text label="Phone Number" id="contact_phone" name="contact_phone" placeholder="Phone Number"/>
                    
                                                <x-input.text label="Email Address" id="contact_email" name="contact_email" :required="true" placeholder="Email Address"/>
                    
                                                <x-input.text-area label="Remark" id="message" rows="2" name="message" placeholder="Enter Your Message For The Company" />
                    
                                                <x-input.text label="Location" id="location" name="location" placeholder="Location"/>

                                                {{-- Resume section --}}
                                                <div class="mt-3 mb-3">
                                                    <label class="block text-sm font-medium text-gray-700 mb-2">Resume</label>

                                                    @if(auth()->user()->resume_path)
                                                        {{-- Saved resume option --}}
                                                        <div class="flex items-center gap-2 bg-green-50 border border-green-200 rounded-lg px-3 py-2 mb-2">
                                                            <i class="fas fa-file-pdf text-red-500"></i>
                                                            <div class="flex-1 min-w-0">
                                                                <p class="text-xs font-semibold text-gray-800">Profile Resume Available</p>
                                                                <a href="{{ Storage::disk('s3')->url(auth()->user()->resume_path) }}" target="_blank" class="text-xs text-blue-600 hover:underline">Preview →</a>
                                                            </div>
                                                        </div>
                                                        <label class="flex items-center gap-2 cursor-pointer mb-2">
                                                            <input type="checkbox" name="use_saved_resume" value="1"
                                                                x-model="useSavedResume"
                                                                class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 w-4 h-4">
                                                            <span class="text-sm text-gray-700 font-medium">Use my saved profile resume</span>
                                                        </label>

                                                        {{-- File upload: only visible when not using saved resume --}}
                                                        <div x-show="!useSavedResume" x-transition>
                                                            <label class="block text-xs text-gray-500 mb-1">Or upload a different PDF:</label>
                                                            <input type="file" id="resume_path" name="resume_path" accept=".pdf"
                                                                :required="!useSavedResume"
                                                                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-200 rounded-lg">
                                                        </div>
                                                    @else
                                                        {{-- No saved resume — show required file upload --}}
                                                        <input type="file" id="resume_path" name="resume_path" accept=".pdf" required
                                                            class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-200 rounded-lg">
                                                        <p class="text-xs text-gray-400 mt-1">Save a resume to your profile to reuse it instantly!</p>
                                                    @endif
                                                </div>
                    
                                                <button type="button" @click="open = false" class="mr-3 ml-40 bg-gray-300 hover:bg-gray-400 text-black px-2 py-2 rounded-md">Cancel</button>
                    
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-2 py-2 rounded-md">Submit Application</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <button type="button" class="w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-200">
                                    Already Applied
                                </button>
                            @endif
                            <a href="mailto:{{ $job->contact_email }}" class="w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer bg-gray-300 hover:bg-gray-400">
                                Send An Email To The Company
                            </a>
                        </div>
                    @else
                        {{-- Company user views another company's job post --}}
                        <div class="flex justify-end">
                            <a href="mailto:{{ $job->contact_email }}" class="w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer bg-gray-300 hover:bg-gray-400">
                                Send An Email To The Company
                            </a>
                        </div>
                    @endif
                @else
                    <div x-data="{ opened: false }">
                        <button @click="opened = true" class="w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer bg-gray-300 hover:bg-gray-400">
                            View Applications 
                        </button>
                        <div x-cloak x-show="opened" class="fixed inset-0 flex items-center justify-center bg-transparent">
                            <div @click.away="opened = false" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md border border-black-200">
                                <h3 class="text-lg font-semibold mb-4">
                                    Applications for {{$job->title}}
                                </h3>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <a href="{{ route('login') }}" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medicursor-pointer text-black-700 bg-gray-100 hover:bg-gray-200">
                    Login To Apply For The Job
                </a>
            @endauth
        </div>
        {{-- <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <div id="map"></div>
        </div> --}}
    </section>
    <aside class="bg-white rounded-lg shadow-md p-3">
        <h3 class="text-xl text-center mb-4 font-bold">
            Company Info
        </h3>
        @if($job->company_logo)
            <img src="/storage/{{$job->company_logo}}" alt="{{ $job->company_name }}" class="w-50 rounded-lg mb-4 m-auto"/>
        @endif
        <h4 class="text-lg font-bold">{{$job->company_name}}</h4>
        <p class="text-gray-700 text-lg my-3">{{$job->description}}</p>
        @if($job->company_website)
            <a href="{{$job->company_website}}" target="_blank" class="text-blue-500">Visit Website</a>
        @endif

        @php
            $isBookmarked = auth()->check() &&
            auth()->user()->bookmarkedJobs->contains($job->id);
        @endphp
        @guest
            <p class="mt-10 bg-gray-200 text-gray-700 font-bold w-full py-2 px-4 rounded-full text-center">
                <i class="fas fa-bookmark mr-3"></i>
                You must be logged in to bookmark a job
            </p>
        @else
            @if($isBookmarked)
                <form method="POST" action="{{ route('bookmarks.destroy', $job->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="mt-10 bg-gray-300 text-gray-800 font-bold w-full py-2 px-4 rounded-full">
                        <i class="fas fa-bookmark mr-3"></i>
                        Bookmarked
                    </button>
                </form>
            @else
                <form method="POST" action="{{ route('bookmarks.store', $job->id) }}">
                    @csrf
                    <button type="submit"
                        class="mt-10 bg-blue-500 hover:bg-blue-600 text-white font-bold w-full py-2 px-4 rounded-full">
                        <i class="fas fa-bookmark mr-3"></i>
                        Bookmark
                    </button>
                </form>
            @endif
        @endguest 
    </aside>
</div>
</x-layout>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Your Mapbox access token
    mapboxgl.accessToken = "{{ env('MAPBOX_API_KEY') }}";

    // Initialize the map
    const map = new mapboxgl.Map({
      container: 'map', // ID of the container element
      style: 'mapbox://styles/mapbox/streets-v11', // Map style
      center: [-74.5, 40], // Default center
      zoom: 9, // Default zoom level
    });

    // Get address from Laravel view
    const city = '{{ $job->city }}';
    const state = '{{ $job->state }}';
    const address = city + ', ' + state;

    // Geocode the address
    fetch(`/geocode?address=${encodeURIComponent(address)}`)
      .then((response) => response.json())
      .then((data) => {
        if (data.features.length > 0) {
          const [longitude, latitude] = data.features[0].center;

          // Center the map and add a marker
          map.setCenter([longitude, latitude]);
          map.setZoom(14);

          new mapboxgl.Marker().setLngLat([longitude, latitude]).addTo(map);
        } else {
          console.error('No results found for the address.');
        }
      })
      .catch((error) => console.error('Error geocoding address:', error));
  });

    let map;
    let marker;
    
    function initMap() {
    
        const defaultLocation = {
            lat: 28.6139,
            lng: 77.2090
        };
    
        map = new google.maps.Map(
            document.getElementById('map'),
            {
                center: defaultLocation,
                zoom: 12
            }
        );
    
        marker = new google.maps.Marker({
            position: defaultLocation,
            map: map,
            draggable: true
        });
    
        const input =
            document.getElementById('search-input');
    
        const autocomplete =
            new google.maps.places.Autocomplete(input);
    
        autocomplete.addListener('place_changed', () => {
    
            const place = autocomplete.getPlace();
    
            if (!place.geometry) return;
    
            map.setCenter(place.geometry.location);
    
            marker.setPosition(place.geometry.location);
    
            console.log(
                'Latitude:',
                place.geometry.location.lat()
            );
    
            console.log(
                'Longitude:',
                place.geometry.location.lng()
            );
        });
    }

    function initMap() {
    const location = {
        lat: {{ $job->latitude }},
        lng: {{ $job->longitude }}
    };

    const map = new google.maps.Map(
        document.getElementById("map"),
        {
            zoom: 15,
            center: location
        }
    );

    new google.maps.Marker({
        position: location,
        map: map
    });
}

</script>
