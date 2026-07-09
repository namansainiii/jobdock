<x-layout>
    <section class="max-w-8xl mx-auto flex flex-col md:flex-row items-start gap-6 px-4 py-6 @if($user->role === 'company') md:h-[calc(100vh-140px)] @endif">
        <!-- Left Pane: Profile Card -->
        <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-150 w-full md:w-1/3 md:sticky md:top-6">
            <h3 class="h3 text-3xl text-center font-bold mb-4">
                My Profile
            </h3>
            <div class="mt-2 flex justify-center">
                @if($user->avatar)
                    <img src="{{ Storage::disk('s3')->url($user->avatar) }}" alt="{{ $user->name }}" class="w-32 h-32 object-cover rounded-full">
                @else
                    <img src="{{ asset('images/profile.png') }}" class="w-32 h-32 object-cover rounded-full">
                @endif
            </div>

            <form method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-input.text label="Name" id="name" name="name" value="{{$user->name}}" />

                <x-input.text label="Email" id="email" type="email" name="email" value="{{$user->email}}" />

                <x-input.file label="Upload Avatar" id="avatar" name="avatar" />

                {{-- Profile Resume Section --}}
                <div class="mt-4 mb-3">
                    <p class="block text-sm font-medium text-gray-700 mb-1">Profile Resume (PDF)</p>

                    @if($user->resume_path)
                        {{-- Resume exists: show file info + delete button --}}
                        <div class="flex items-center justify-between bg-green-50 border border-green-200 rounded-lg px-3 py-2 mb-2">
                            <div class="flex items-center gap-2 min-w-0">
                                <i class="fas fa-file-pdf text-red-500 text-lg flex-shrink-0"></i>
                                <div class="min-w-0">
                                    <p class="text-sm font-semibold text-gray-800 truncate">Resume Saved</p>
                                    <a href="{{ Storage::disk('s3')->url($user->resume_path) }}" target="_blank" class="text-xs text-blue-600 hover:underline">View current resume →</a>
                                </div>
                            </div>
                            <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-0.5 rounded-full flex-shrink-0 ml-2">Active</span>
                        </div>

                        {{-- Upload a new one to replace --}}
                        <label class="block text-xs text-gray-500 mb-1">Replace with a new PDF:</label>
                        <input type="file" id="resume_path" name="resume_path" accept=".pdf"
                            class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-200 rounded-lg">
                    @else
                        {{-- No resume: show upload input --}}
                        <label class="block text-xs text-gray-400 mb-1">No resume saved yet. Upload a PDF (max 5MB):</label>
                        <input type="file" id="resume_path" name="resume_path" accept=".pdf"
                            class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 border border-gray-200 rounded-lg">
                    @endif
                </div>
                
                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 border rounded hover:bg-green-600 focus:outline-none transition-all font-semibold">Save</button>

            </form>

            {{-- Delete resume form (outside the main form, separate POST) --}}
            @if($user->resume_path)
                <form method="POST" action="{{ route('profile.resume.delete') }}" class="mt-2" onsubmit="return confirm('Remove your saved resume?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-50 hover:bg-red-100 text-red-600 border border-red-200 py-1.5 px-4 rounded font-semibold text-sm transition-all">
                        <i class="fas fa-trash-alt text-xs"></i>
                        Remove Saved Resume
                    </button>
                </form>
            @endif
        </div>


        <!-- Right Pane: Listings or Employee View -->
        <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-150 w-full md:w-2/3 @if($user->role === 'company') md:h-full md:overflow-y-auto md:pr-4 @endif">
            @if($user->role === 'company')
                @php
                    $countAll    = $jobs->count();
                    $countActive = $jobs->where('status', 'active')->count();
                    $countDraft  = $jobs->where('status', 'draft')->count();
                    $countClosed = $jobs->where('status', 'closed')->count();
                @endphp

                <div x-data="{ listingFilter: 'all' }">
                    {{-- Header + Filter Tabs --}}
                    <div class="border-b border-gray-100 pb-4 mb-2">
                        <h3 class="h3 text-3xl text-center font-bold mb-4">
                            My Job Listings
                        </h3>
                        {{-- Filter Tab Bar --}}
                        <div class="flex items-center gap-2 flex-wrap justify-center">
                            <button @click="listingFilter = 'all'"
                                :class="listingFilter === 'all' ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all">
                                All
                                <span class="bg-white/20 px-1.5 py-0.5 rounded-full text-[10px]">{{ $countAll }}</span>
                            </button>
                            <button @click="listingFilter = 'active'"
                                :class="listingFilter === 'active' ? 'bg-green-600 text-white' : 'bg-green-50 text-green-700 border border-green-200 hover:bg-green-100'"
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all">
                                🟢 Active
                                <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-white/20">{{ $countActive }}</span>
                            </button>
                            <button @click="listingFilter = 'draft'"
                                :class="listingFilter === 'draft' ? 'bg-yellow-500 text-white' : 'bg-yellow-50 text-yellow-700 border border-yellow-200 hover:bg-yellow-100'"
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all">
                                🟡 Draft
                                <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-white/20">{{ $countDraft }}</span>
                            </button>
                            <button @click="listingFilter = 'closed'"
                                :class="listingFilter === 'closed' ? 'bg-red-600 text-white' : 'bg-red-50 text-red-700 border border-red-200 hover:bg-red-100'"
                                class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all">
                                🔴 Closed
                                <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-white/20">{{ $countClosed }}</span>
                            </button>
                        </div>
                    </div>

                @forelse($jobs as $job)
                <div x-show="listingFilter === 'all' || listingFilter === '{{ $job->status }}'"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-1"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="border-b border-gray-200 py-6 last:border-b-0">

                    <div class="flex justify-between items-start gap-3">
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="text-xl font-bold text-gray-900">{{$job->title}}</h3>
                                <span class="text-sm font-normal text-gray-500">({{$job->job_type}})</span>
                                {{-- Status Badge --}}
                                @php
                                    $badgeClass = match($job->status) {
                                        'active'  => 'bg-green-100 text-green-700 border border-green-300',
                                        'draft'   => 'bg-yellow-100 text-yellow-700 border border-yellow-300',
                                        'closed'  => 'bg-red-100 text-red-700 border border-red-300',
                                        default   => 'bg-gray-100 text-gray-600 border border-gray-300',
                                    };
                                    $badgeIcon = match($job->status) {
                                        'active'  => 'fa-circle-check',
                                        'draft'   => 'fa-pen-to-square',
                                        'closed'  => 'fa-ban',
                                        default   => 'fa-circle',
                                    };
                                @endphp
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold {{ $badgeClass }}">
                                    <i class="fas {{ $badgeIcon }} text-[10px]"></i>
                                    {{ ucfirst($job->status) }}
                                </span>
                            </div>
                            <p class="text-gray-600 mt-1 text-sm truncate">{{$job->description}}</p>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            {{-- Status Toggle --}}
                            <form method="POST" action="{{ route('jobs.status', $job->id) }}">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()"
                                    class="text-xs font-semibold border rounded-lg px-2 py-1.5 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all
                                    {{ $job->status === 'active' ? 'bg-green-50 border-green-300 text-green-700' : ($job->status === 'draft' ? 'bg-yellow-50 border-yellow-300 text-yellow-700' : 'bg-red-50 border-red-300 text-red-700') }}">
                                    <option value="active"  {{ $job->status === 'active'  ? 'selected' : '' }}>🟢 Active</option>
                                    <option value="draft"   {{ $job->status === 'draft'   ? 'selected' : '' }}>🟡 Draft</option>
                                    <option value="closed"  {{ $job->status === 'closed'  ? 'selected' : '' }}>🔴 Closed</option>
                                </select>
                            </form>
                            <a href="{{ route('jobs.edit', ['job' => $job->id, 'from' => 'dashboard']) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded text-sm transition-all font-semibold shadow-sm">Edit</a>
                            <form method="POST" action="{{ route('jobs.destroy' , $job->id) }}?from=dashboard" onsubmit="return confirm('Are you sure you want to delete this Job?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm transition-all font-semibold shadow-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                <div class="mt-4 mb-8" x-data="{ 
                    openModal: {{ session('open_modal_job_id') == $job->id ? 'true' : 'false' }},
                    activeApplicantId: {{ (session('open_modal_job_id') == $job->id && session('open_drawer_id')) ? session('open_drawer_id') : 'null' }},
                    statusFilter: 'All'
                }">
                    <!-- Total Applicants Trigger Card -->
                    <button @click="openModal = true" class="px-5 py-3 bg-blue-50 border border-blue-200 hover:bg-blue-100 text-blue-900 rounded-xl text-sm font-bold transition-all flex items-center gap-2.5 cursor-pointer shadow-sm">
                        <i class="fas fa-users text-blue-500 text-lg"></i>
                        <span>Applicants:</span>
                        <span class="bg-blue-600 text-white rounded-full px-2.5 py-0.5 text-xs font-extrabold">{{ $job->applicants->count() }}</span>
                        <span class="text-xs text-blue-400 font-semibold">(Click to view)</span>
                    </button>

                    <!-- The Modal Container -->
                    <div 
                        x-show="openModal" 
                        class="fixed inset-0 overflow-hidden z-50 flex items-center justify-center p-4 sm:p-6" 
                        role="dialog" 
                        aria-modal="true"
                        style="display: none;"
                        @click="openModal = false"
                    >
                        <!-- Backdrop with Blur Effect -->
                        <div 
                            x-show="openModal"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 bg-gray-950/20 backdrop-blur-md transition-opacity"
                        ></div>

                        <!-- Modal Window Card (Always max-w-5xl Split Layout) -->
                        <div 
                            x-show="openModal"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="relative z-10 bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-300 ease-in-out w-full flex flex-col max-h-[85vh] border border-gray-150 max-w-5xl"
                            @click.stop
                        >
                            <!-- Modal Header -->
                            <div class="bg-gray-50 border-b border-gray-150 px-6 py-4 flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-extrabold text-gray-900">{{ $job->title }} Applicants</h3>
                                    <p class="text-xs text-gray-400 mt-0.5">Manage and filter candidates applying to this role.</p>
                                </div>
                                <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none p-1.5 hover:bg-gray-100 rounded-lg transition-all" @click="openModal = false">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Modal Body Container (split layout) -->
                            <div class="flex-1 overflow-hidden flex flex-row divide-x divide-gray-200 min-h-0">
                                
                                <!-- Left Pane: Filters & Applicant List -->
                                <div 
                                    class="overflow-y-auto p-6 space-y-4 w-full md:w-5/12"
                                    :class="activeApplicantId ? 'hidden md:block' : 'block'"
                                >
                                    
                                    <!-- Filters -->
                                    <div class="space-y-2">
                                        <span class="text-xs font-bold uppercase text-gray-400 tracking-wider">Filter Status</span>
                                        <div class="flex flex-wrap gap-1.5">
                                            <button type="button" @click="statusFilter = 'All'" :class="statusFilter === 'All' ? 'bg-blue-600 text-white shadow-sm font-bold' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
                                                All ({{ $job->applicants->count() }})
                                            </button>
                                            <button type="button" @click="statusFilter = 'Applied'" :class="statusFilter === 'Applied' ? 'bg-gray-600 text-white shadow-sm font-bold' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
                                                Applied ({{ $job->applicants->where('status', 'Applied')->count() }})
                                            </button>
                                            <button type="button" @click="statusFilter = 'Reviewing'" :class="statusFilter === 'Reviewing' ? 'bg-yellow-500 text-white shadow-sm font-bold' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
                                                Reviewing ({{ $job->applicants->where('status', 'Reviewing')->count() }})
                                            </button>
                                            <button type="button" @click="statusFilter = 'Shortlisted'" :class="statusFilter === 'Shortlisted' ? 'bg-green-600 text-white shadow-sm font-bold' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
                                                Shortlisted ({{ $job->applicants->where('status', 'Shortlisted')->count() }})
                                            </button>
                                            <button type="button" @click="statusFilter = 'Interviewing'" :class="statusFilter === 'Interviewing' ? 'bg-blue-600 text-white shadow-sm font-bold' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
                                                Interviewing ({{ $job->applicants->where('status', 'Interviewing')->count() }})
                                            </button>
                                            <button type="button" @click="statusFilter = 'Rejected'" :class="statusFilter === 'Rejected' ? 'bg-red-600 text-white shadow-sm font-bold' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
                                                Rejected ({{ $job->applicants->where('status', 'Rejected')->count() }})
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Applicant List -->
                                    <div class="space-y-2 mt-4">
                                        <span class="text-xs font-bold uppercase text-gray-400 tracking-wider block">Candidates</span>
                                        
                                        <div class="space-y-2 max-h-[45vh] overflow-y-auto pr-1">
                                            @forelse($job->applicants as $applicant)
                                            <div 
                                                x-show="statusFilter === 'All' || '{{ $applicant->status }}' === statusFilter"
                                                @click="activeApplicantId = {{ $applicant->id }}"
                                                :class="activeApplicantId === {{ $applicant->id }} ? 'border-blue-500 bg-blue-50/40 shadow-sm ring-1 ring-blue-500' : 'border-gray-200 hover:bg-gray-50'"
                                                class="p-4 border rounded-xl cursor-pointer transition-all duration-200 flex justify-between items-center"
                                            >
                                                <div>
                                                    <h5 class="text-sm font-extrabold text-gray-900">{{ $applicant->full_name }}</h5>
                                                    <p class="text-xs text-gray-400 mt-0.5">Applied: {{ $applicant->created_at->format('M d, Y') }}</p>
                                                    <span class="inline-block mt-2 px-2 py-0.5 rounded-full text-[10px] font-bold 
                                                        {{ $applicant->status === 'Shortlisted' ? 'bg-green-100 text-green-800' : '' }}
                                                        {{ $applicant->status === 'Reviewing' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                        {{ $applicant->status === 'Interviewing' ? 'bg-blue-100 text-blue-800' : '' }}
                                                        {{ $applicant->status === 'Rejected' ? 'bg-red-100 text-red-800' : '' }}
                                                        {{ $applicant->status === 'Applied' ? 'bg-gray-100 text-gray-800' : '' }}
                                                    ">
                                                        {{ $applicant->status }}
                                                    </span>
                                                </div>
                                                <i class="fas fa-chevron-right text-gray-300 text-xs"></i>
                                            </div>
                                            @empty
                                            <p class="text-sm text-gray-500 text-center py-6">No applicants found matching this status.</p>
                                            @endforelse
                                        </div>
                                    </div>

                                </div>

                                <!-- Right Pane: Dynamic Slider Profile Details -->
                                <div 
                                    class="flex-1 flex flex-col bg-white divide-y divide-gray-200 min-w-0" 
                                    :class="activeApplicantId ? 'w-full md:w-7/12' : 'hidden md:flex md:w-7/12'"
                                >
                                    @foreach($job->applicants as $applicant)
                                    <div 
                                        x-show="activeApplicantId === {{ $applicant->id }}"
                                        class="flex-1 flex flex-col h-full bg-white min-w-0" 
                                        style="display: none;"
                                    >
                                        <!-- Detail Header -->
                                        <div class="bg-blue-900 px-6 py-4 flex items-center justify-between">
                                            <div class="flex items-center gap-2">
                                                <!-- Close Arrow back to list -->
                                                <button @click="activeApplicantId = null" class="text-white hover:text-gray-200 p-1.5 hover:bg-white/10 rounded-lg transition-all focus:outline-none">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                                    </svg>
                                                </button>
                                                <div>
                                                    <h4 class="text-sm font-bold text-white">Applicant Profile</h4>
                                                    <p class="text-[10px] text-blue-200">Inspect resume and submit changes.</p>
                                                </div>
                                            </div>
                                            <button @click="activeApplicantId = null" class="text-blue-300 hover:text-white text-xs font-bold tracking-wide uppercase focus:outline-none">
                                                Close
                                            </button>
                                        </div>

                                        <!-- Detail Scroll Area -->
                                        <div class="flex-1 overflow-y-auto p-6 space-y-6">
                                            <div>
                                                <h4 class="text-2xl font-black text-gray-950 leading-tight">{{ $applicant->full_name }}</h4>
                                                <p class="text-xs text-gray-400 mt-1">Applied: {{ $applicant->created_at->format('M d, Y') }} &bull; Status: <span class="font-bold text-gray-600">{{ $applicant->status }}</span></p>
                                            </div>

                                            <div class="space-y-4 pt-4 border-t border-gray-100">
                                                <div>
                                                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Email</span>
                                                    <a href="mailto:{{ $applicant->contact_email }}" class="text-blue-600 hover:underline font-bold text-sm break-all">{{ $applicant->contact_email }}</a>
                                                </div>
                                                @if($applicant->contact_phone)
                                                <div>
                                                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Phone</span>
                                                    <span class="text-gray-800 font-semibold text-sm">{{ $applicant->contact_phone }}</span>
                                                </div>
                                                @endif
                                                @if($applicant->location)
                                                <div>
                                                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Location</span>
                                                    <span class="text-gray-800 font-semibold text-sm">{{ $applicant->location }}</span>
                                                </div>
                                                @endif
                                            </div>

                                            @if($applicant->message)
                                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-150 text-sm">
                                                <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Cover Message</span>
                                                <p class="text-gray-700 leading-relaxed">{{ $applicant->message }}</p>
                                            </div>
                                            @endif

                                            <!-- Status Picker inside details pane -->
                                            <div class="pt-4 border-t border-gray-100">
                                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-2.5">Update Status:</span>
                                                <div class="flex flex-col bg-gray-100 rounded-xl p-1.5 gap-1">
                                                    <form method="POST" action="{{ route('applicants.status', $applicant->id) }}" class="w-full">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="Applied">
                                                        <button type="submit" class="w-full px-3 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer text-left flex items-center justify-between {{ $applicant->status === 'Applied' ? 'bg-white text-gray-800 shadow-sm border border-gray-200' : 'text-gray-500 hover:text-gray-900 border border-transparent' }}">
                                                            Applied
                                                            <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                                                        </button>
                                                    </form>

                                                    <form method="POST" action="{{ route('applicants.status', $applicant->id) }}" class="w-full">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="Reviewing">
                                                        <button type="submit" class="w-full px-3 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer text-left flex items-center justify-between {{ $applicant->status === 'Reviewing' ? 'bg-yellow-100 text-yellow-800 shadow-sm border border-yellow-300' : 'text-gray-500 hover:text-gray-900 border border-transparent' }}">
                                                            Reviewing
                                                            <span class="w-2 h-2 rounded-full bg-yellow-400"></span>
                                                        </button>
                                                    </form>

                                                    <form method="POST" action="{{ route('applicants.status', $applicant->id) }}" class="w-full">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="Shortlisted">
                                                        <button type="submit" class="w-full px-3 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer text-left flex items-center justify-between {{ $applicant->status === 'Shortlisted' ? 'bg-green-100 text-green-800 shadow-sm border border-green-300' : 'text-gray-500 hover:text-gray-900 border border-transparent' }}">
                                                            Shortlisted
                                                            <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                                        </button>
                                                    </form>

                                                    <form method="POST" action="{{ route('applicants.status', $applicant->id) }}" class="w-full">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="Interviewing">
                                                        <button type="submit" class="w-full px-3 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer text-left flex items-center justify-between {{ $applicant->status === 'Interviewing' ? 'bg-blue-100 text-blue-800 shadow-sm border border-blue-300' : 'text-gray-500 hover:text-gray-900 border border-transparent' }}">
                                                            Interviewing
                                                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                                        </button>
                                                    </form>

                                                    <form method="POST" action="{{ route('applicants.status', $applicant->id) }}" class="w-full">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="status" value="Rejected">
                                                        <button type="submit" class="w-full px-3 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer text-left flex items-center justify-between {{ $applicant->status === 'Rejected' ? 'bg-red-100 text-red-800 shadow-sm border border-red-300' : 'text-gray-500 hover:text-gray-900 border border-transparent' }}">
                                                            Rejected
                                                            <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Detail Footer -->
                                        <div class="border-t border-gray-150 px-6 py-4 bg-gray-50 flex items-center justify-between mt-auto" @click.stop>
                                            <div class="flex items-center gap-2">
                                                <a href="{{ asset('storage/' . $applicant->resume_path )}}" target="_blank" class="px-3 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg text-xs font-bold flex items-center gap-1.5 transition-all">
                                                    <i class="fas fa-eye"></i> View Resume
                                                </a>
                                                <a href="{{ asset('storage/' . $applicant->resume_path )}}" target="_blank" class="px-3 py-2 border border-gray-200 hover:bg-gray-50 text-gray-700 rounded-lg text-xs font-bold flex items-center gap-1.5 transition-all" download>
                                                    <i class="fas fa-download text-gray-400"></i> Download
                                                </a>
                                            </div>
                                            
                                            <form method="POST" action="{{ route('applicants.destroy' , $applicant->id) }}" onsubmit="return confirm('Are you sure you want to delete this applicant?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-2 hover:bg-red-50 text-red-600 rounded-lg text-xs font-bold cursor-pointer transition-all flex items-center gap-1.5">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                    @endforeach

                                    <!-- Default Placeholder when no profile is selected -->
                                    <div 
                                        x-show="!activeApplicantId"
                                        class="flex-1 flex flex-col items-center justify-center p-8 text-center text-gray-500 bg-white"
                                    >
                                        <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-full flex items-center justify-center mb-4 shadow-sm border border-blue-100">
                                            <i class="fas fa-user-circle text-4xl"></i>
                                        </div>
                                        <h4 class="text-lg font-bold text-gray-800 mb-2">No Profile Selected</h4>
                                        <p class="text-sm text-gray-500 max-w-xs leading-relaxed">
                                            Select a profile from the candidate list on the left to view their application details, cover message, and update status.
                                        </p>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
                @empty
                    <p class="text-gray-700 text-center mt-10">YOU HAVE NO JOB LISTINGS</p>
                @endforelse

                {{-- No-results message when a filter returns 0 items (all jobs exist but none match the active filter) --}}
                <div x-show="
                    (listingFilter === 'active'  && {{ $countActive }}  === 0) ||
                    (listingFilter === 'draft'   && {{ $countDraft }}   === 0) ||
                    (listingFilter === 'closed'  && {{ $countClosed }}  === 0)
                " class="text-center py-10 text-gray-400 text-sm" style="display:none;">
                    <div class="text-4xl mb-2">📭</div>
                    <p class="font-medium">No jobs with this status yet.</p>
                </div>

                </div>{{-- end x-data listingFilter --}}
            @else
                <!-- Employee/Job Seeker dashboard view -->
                <div class="mb-8">
                    @php
                        $appCountAll    = $applications->count();
                        $appCountActive = $applications->filter(fn($a) => $a->job?->status === 'active')->count();
                        $appCountDraft  = $applications->filter(fn($a) => $a->job?->status === 'draft')->count();
                        $appCountClosed = $applications->filter(fn($a) => $a->job?->status === 'closed')->count();
                    @endphp

                    <div x-data="{ appFilter: 'all' }">
                        {{-- Header + Filter Tabs --}}
                        <div class="border-b border-gray-100 pb-4 mb-2">
                            <h3 class="h3 text-3xl text-center font-bold mb-4">
                                My Job Applications
                            </h3>
                            {{-- Filter Tab Bar --}}
                            <div class="flex items-center gap-2 flex-wrap justify-center">
                                <button @click="appFilter = 'all'"
                                    :class="appFilter === 'all' ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all">
                                    All
                                    <span class="bg-white/20 px-1.5 py-0.5 rounded-full text-[10px]">{{ $appCountAll }}</span>
                                </button>
                                <button @click="appFilter = 'active'"
                                    :class="appFilter === 'active' ? 'bg-green-600 text-white' : 'bg-green-50 text-green-700 border border-green-200 hover:bg-green-100'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all">
                                    🟢 Active Jobs
                                    <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-white/20">{{ $appCountActive }}</span>
                                </button>
                                <button @click="appFilter = 'draft'"
                                    :class="appFilter === 'draft' ? 'bg-yellow-500 text-white' : 'bg-yellow-50 text-yellow-700 border border-yellow-200 hover:bg-yellow-100'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all">
                                    🟡 Draft Jobs
                                    <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-white/20">{{ $appCountDraft }}</span>
                                </button>
                                <button @click="appFilter = 'closed'"
                                    :class="appFilter === 'closed' ? 'bg-red-600 text-white' : 'bg-red-50 text-red-700 border border-red-200 hover:bg-red-100'"
                                    class="flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold transition-all">
                                    🔴 Closed Jobs
                                    <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-white/20">{{ $appCountClosed }}</span>
                                </button>
                            </div>
                        </div>

                        @forelse($applications as $application)
                        @php
                            $jobStatus = $application->job?->status ?? 'active';
                            $jobStatusBadge = match($jobStatus) {
                                'active'  => ['class' => 'bg-green-100 text-green-700 border border-green-300', 'icon' => 'fa-circle-check',    'label' => 'Active'],
                                'draft'   => ['class' => 'bg-yellow-100 text-yellow-700 border border-yellow-300', 'icon' => 'fa-pen-to-square', 'label' => 'Draft'],
                                'closed'  => ['class' => 'bg-red-100 text-red-700 border border-red-300',       'icon' => 'fa-ban',             'label' => 'Closed'],
                                default   => ['class' => 'bg-gray-100 text-gray-600 border border-gray-300',    'icon' => 'fa-circle',          'label' => ucfirst($jobStatus)],
                            };
                        @endphp
                        <div x-show="appFilter === 'all' || appFilter === '{{ $jobStatus }}'"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="flex justify-between items-center border-b border-gray-200 py-4">
                            <div>
                                <div class="flex items-center gap-2 flex-wrap mb-0.5">
                                    <h4 class="text-xl font-semibold">
                                        <a href="{{ route('jobs.show', $application->job->id) }}" class="hover:underline text-blue-900">
                                            {{ $application->job->title }}
                                        </a>
                                    </h4>
                                    {{-- Job Status Badge --}}
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-bold {{ $jobStatusBadge['class'] }}">
                                        <i class="fas {{ $jobStatusBadge['icon'] }} text-[9px]"></i>
                                        {{ $jobStatusBadge['label'] }}
                                    </span>
                                </div>
                                <p class="text-gray-600">{{ $application->job->company_name }} &bull; {{ $application->job->city }}, {{ $application->job->state }}</p>
                                <p class="text-sm text-gray-500 mt-1">Applied on: {{ $application->created_at->format('M d, Y') }}</p>
                                <div class="mt-2">
                                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold 
                                        {{ $application->status === 'Shortlisted'  ? 'bg-green-100 text-green-800'  : '' }}
                                        {{ $application->status === 'Reviewing'    ? 'bg-yellow-100 text-yellow-800' : '' }}
                                        {{ $application->status === 'Interviewing' ? 'bg-blue-100 text-blue-800'    : '' }}
                                        {{ $application->status === 'Rejected'     ? 'bg-red-100 text-red-800'      : '' }}
                                        {{ $application->status === 'Applied'      ? 'bg-gray-100 text-gray-800'    : '' }}
                                    ">
                                        {{ $application->status }}
                                    </span>
                                </div>
                            </div>
                            <div>
                                <form method="POST" action="{{ route('applicants.destroy', $application->id) }}" onsubmit="return confirm('Are you sure you want to withdraw this application?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
                                        Withdraw
                                    </button>
                                </form>
                            </div>
                        </div>
                        @empty
                        <p class="text-gray-700 text-center mt-6">You have not applied for any jobs yet.</p>
                        @endforelse

                        {{-- No-results message when the selected filter has no matching applications --}}
                        <div x-show="
                            (appFilter === 'active'  && {{ $appCountActive }} === 0) ||
                            (appFilter === 'draft'   && {{ $appCountDraft  }} === 0) ||
                            (appFilter === 'closed'  && {{ $appCountClosed }} === 0)
                        " class="text-center py-10 text-gray-400 text-sm" style="display:none;">
                            <div class="text-4xl mb-2">📭</div>
                            <p class="font-medium">No applications for jobs with this status.</p>
                        </div>

                    </div>{{-- end x-data appFilter --}}
                </div>

            @endif
        </div>
    </section>
    {{-- <x-bottom-banner/> --}}
    {{-- Hidden dummy element to force compilation of dynamic Tailwind layout classes --}}
    <div class="hidden max-w-2xl max-w-5xl w-1/2 md:w-1/2 md:block"></div>
</x-layout>