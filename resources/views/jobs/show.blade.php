<x-layout>
<x-slot name="title">{{ $job->title }} — {{ $job->company_name }} | JobDock</x-slot>

{{-- ════════════════════════════════════════════════════════
     HERO BANNER
════════════════════════════════════════════════════════ --}}
<div class="bg-gradient-to-br from-slate-900 via-slate-800 to-zinc-950 px-4 py-8 mb-6">
    <div class="max-w-6xl mx-auto">
        <a href="{{ route('jobs.index') }}" class="inline-flex items-center gap-2 text-slate-300 hover:text-amber-500 text-sm mb-4 transition-colors">
            <i class="fas fa-arrow-left text-xs"></i> Back To Listings
        </a>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                @if($job->company_logo)
                    <img src="/storage/{{ $job->company_logo }}" alt="{{ $job->company_name }}"
                        class="w-16 h-16 rounded-2xl object-contain bg-white p-1 shadow-lg flex-shrink-0">
                @else
                    <div class="w-16 h-16 rounded-2xl bg-white/20 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-building text-white text-2xl"></i>
                    </div>
                @endif
                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-white leading-tight">{{ $job->title }}</h1>
                    <p class="text-slate-300 mt-0.5">{{ $job->company_name }} &bull; {{ $job->city }}, {{ $job->state }}</p>
                    {{-- Quick pills --}}
                    <div class="flex flex-wrap gap-2 mt-2">
                        <span class="bg-white/20 text-white text-xs font-semibold px-2.5 py-1 rounded-full">
                            <i class="fas fa-briefcase mr-1 text-[10px]"></i>{{ $job->job_type }}
                        </span>
                        <span class="bg-white/20 text-white text-xs font-semibold px-2.5 py-1 rounded-full">
                            <i class="fas fa-{{ $job->remote ? 'laptop-house' : 'building' }} mr-1 text-[10px]"></i>{{ $job->remote ? 'Remote' : 'On-site' }}
                        </span>
                        @if($job->experience_level)
                        <span class="bg-white/20 text-white text-xs font-semibold px-2.5 py-1 rounded-full">
                            <i class="fas fa-chart-line mr-1 text-[10px]"></i>{{ $job->experience_level }}
                        </span>
                        @endif
                        @if($job->industry)
                        <span class="bg-white/20 text-white text-xs font-semibold px-2.5 py-1 rounded-full">
                            <i class="fas fa-industry mr-1 text-[10px]"></i>{{ $job->industry }}
                        </span>
                        @endif
                        @if($job->status === 'active')
                        <span class="bg-green-500 text-white text-xs font-bold px-2.5 py-1 rounded-full border border-green-400/20">
                            <i class="fas fa-circle-check mr-1 text-[10px]"></i>Active
                        </span>
                        @elseif($job->status === 'draft')
                        <span class="bg-yellow-500 text-white text-xs font-bold px-2.5 py-1 rounded-full border border-yellow-400/20">
                            <i class="fas fa-pen-to-square mr-1 text-[10px]"></i>Opening Soon
                        </span>
                        @elseif($job->status === 'closed')
                        <span class="bg-red-500 text-white text-xs font-bold px-2.5 py-1 rounded-full border border-red-400/20">
                            <i class="fas fa-ban mr-1 text-[10px]"></i>Closed
                        </span>
                        @endif
                        @if($job->application_deadline && \Carbon\Carbon::parse($job->application_deadline)->isPast() && $job->status === 'active')
                        <span class="bg-red-400 text-white text-xs font-bold px-2.5 py-1 rounded-full">
                            <i class="fas fa-clock mr-1 text-[10px]"></i>Deadline Passed
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Salary --}}
            <div class="text-right flex-shrink-0">
                <div class="text-white font-extrabold text-2xl">
                    ${{ number_format($job->salary) }}
                    @if($job->salary_max)
                        – ${{ number_format($job->salary_max) }}
                    @endif
                </div>
                <p class="text-amber-400 text-xs mt-0.5">per year</p>
                @if($job->vacancies && $job->vacancies > 1)
                <p class="text-slate-300 text-xs mt-1"><i class="fas fa-users mr-1"></i>{{ $job->vacancies }} open positions</p>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- ════════════════════════════════════════════════════════
     BODY — 2-column layout
════════════════════════════════════════════════════════ --}}
<div class="max-w-6xl mx-auto px-4 pb-12 grid grid-cols-1 md:grid-cols-3 gap-6">

    {{-- ┌─────────────────────────────────────────┐
         │  LEFT COLUMN — main content (2/3)       │
         └─────────────────────────────────────────┘ --}}
    <section class="md:col-span-2 space-y-5">

        {{-- Owner controls --}}
        @can('update', $job)
        <div class="flex items-center gap-3 bg-amber-50 border border-amber-200 rounded-xl px-4 py-3">
            <i class="fas fa-shield-halved text-amber-500"></i>
            <span class="text-sm font-semibold text-amber-800 flex-1">You own this listing</span>
            <a href="{{ route('jobs.edit', $job->id) }}" class="px-4 py-1.5 bg-amber-600 hover:bg-amber-700 text-white text-sm font-semibold rounded-lg transition-all">
                <i class="fas fa-pen mr-1 text-xs"></i>Edit
            </a>
            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}" onsubmit="return confirm('Delete this job?')">
                @csrf @method('DELETE')
                <button class="px-4 py-1.5 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg transition-all">
                    <i class="fas fa-trash mr-1 text-xs"></i>Delete
                </button>
            </form>
        </div>
        @endcan

        {{-- ── Quick Info Grid ── --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h2 class="text-base font-bold text-gray-700 mb-4 flex items-center gap-2">
                <i class="fas fa-circle-info text-amber-600"></i> Job At A Glance
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                {{-- Job Type --}}
                <div class="bg-gray-50 rounded-xl p-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Job Type</p>
                    <p class="text-sm font-bold text-gray-800">{{ $job->job_type }}</p>
                </div>
                {{-- Remote --}}
                <div class="bg-gray-50 rounded-xl p-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Work Mode</p>
                    <p class="text-sm font-bold text-gray-800">{{ $job->remote ? '🌐 Remote' : '🏢 On-site' }}</p>
                </div>
                {{-- Salary --}}
                <div class="bg-green-50 rounded-xl p-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Salary</p>
                    <p class="text-sm font-bold text-green-700">
                        ${{ number_format($job->salary) }}
                        @if($job->salary_max) – ${{ number_format($job->salary_max) }} @endif
                        <span class="font-normal text-gray-500 text-xs">/yr</span>
                    </p>
                </div>
                {{-- Location --}}
                <div class="bg-gray-50 rounded-xl p-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Location</p>
                    <p class="text-sm font-bold text-gray-800">{{ $job->city }}, {{ $job->state }}</p>
                </div>
                @if($job->experience_level)
                <div class="bg-amber-50/40 border border-amber-100 rounded-xl p-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Experience</p>
                    <p class="text-sm font-bold text-amber-800">{{ $job->experience_level }}</p>
                </div>
                @endif
                @if($job->education_level)
                <div class="bg-purple-50 rounded-xl p-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Education</p>
                    <p class="text-sm font-bold text-purple-700">{{ $job->education_level }}</p>
                </div>
                @endif
                @if($job->industry)
                <div class="bg-orange-50 rounded-xl p-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Industry</p>
                    <p class="text-sm font-bold text-orange-700">{{ $job->industry }}</p>
                </div>
                @endif
                @if($job->vacancies)
                <div class="bg-gray-50 rounded-xl p-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Open Positions</p>
                    <p class="text-sm font-bold text-gray-800">{{ $job->vacancies }} {{ $job->vacancies == 1 ? 'position' : 'positions' }}</p>
                </div>
                @endif
                @if($job->application_deadline)
                <div class="{{ \Carbon\Carbon::parse($job->application_deadline)->isPast() ? 'bg-red-50' : 'bg-yellow-50' }} rounded-xl p-3">
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wide mb-1">Apply By</p>
                    <p class="text-sm font-bold {{ \Carbon\Carbon::parse($job->application_deadline)->isPast() ? 'text-red-600' : 'text-yellow-700' }}">
                        {{ \Carbon\Carbon::parse($job->application_deadline)->format('M d, Y') }}
                        @if(\Carbon\Carbon::parse($job->application_deadline)->isPast())
                            <span class="block text-[10px] font-normal">Deadline passed</span>
                        @else
                            <span class="block text-[10px] font-normal text-gray-500">{{ \Carbon\Carbon::parse($job->application_deadline)->diffForHumans() }}</span>
                        @endif
                    </p>
                </div>
                @endif
            </div>
        </div>

        {{-- ── Job Description ── --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex items-center gap-3 px-5 py-3.5 border-b border-gray-100 bg-gradient-to-r from-slate-100 to-slate-200/60">
                <div class="w-7 h-7 bg-slate-700 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-lines text-white text-xs"></i>
                </div>
                <h2 class="text-sm font-bold text-gray-800">About This Role</h2>
            </div>
            <div class="p-5">
                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $job->description }}</p>
            </div>
        </div>

        {{-- ── Requirements + Benefits ── --}}
        @if($job->requirements || $job->benefits)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex items-center gap-3 px-5 py-3.5 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-violet-50">
                <div class="w-7 h-7 bg-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-list-check text-white text-xs"></i>
                </div>
                <h2 class="text-sm font-bold text-gray-800">Job Details</h2>
            </div>
            <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-5">
                @if($job->requirements)
                <div>
                    <h3 class="text-sm font-bold text-purple-700 mb-2 flex items-center gap-1.5">
                        <i class="fas fa-clipboard-check text-xs"></i> Requirements
                    </h3>
                    <p class="text-gray-700 text-sm leading-relaxed whitespace-pre-line">{{ $job->requirements }}</p>
                </div>
                @endif
                @if($job->benefits)
                <div>
                    <h3 class="text-sm font-bold text-green-700 mb-2 flex items-center gap-1.5">
                        <i class="fas fa-gift text-xs"></i> Benefits
                    </h3>
                    <p class="text-gray-700 text-sm leading-relaxed whitespace-pre-line">{{ $job->benefits }}</p>
                </div>
                @endif
            </div>
        </div>
        @endif

        {{-- ── Tags ── --}}
        @if($job->tags)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
            <h2 class="text-sm font-bold text-gray-700 mb-3 flex items-center gap-2">
                <i class="fas fa-tags text-amber-500"></i> Tags
            </h2>
            <div class="flex flex-wrap gap-2">
                @foreach(explode(',', $job->tags) as $tag)
                <span class="bg-amber-50 border border-amber-200 text-amber-800 text-xs font-semibold px-3 py-1 rounded-full">
                    #{{ trim($tag) }}
                </span>
                @endforeach
            </div>
        </div>
        @endif

        {{-- ── CTA Buttons (Apply / Email) ── --}}
        @auth
            @if(auth()->user()->id != $job->user_id)
                @if(auth()->user()->role === 'employee')
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @if($job->status === 'active')
                        @if(!\App\Models\Applicant::where('user_id', auth()->id())->where('job_id', $job->id)->exists())

                            {{-- ════════════════════════════════════════════
                                 APPLY NOW MODAL
                            ════════════════════════════════════════════ --}}
                            <div x-data="{ open: false }" id="applicant-form">
                                <button @click="open = true"
                                    class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl shadow-md hover:shadow-lg transition-all cursor-pointer">
                                    <i class="fas fa-paper-plane text-sm"></i> Apply Now
                                </button>

                                {{-- Modal Backdrop --}}
                                <div x-cloak x-show="open"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    class="fixed inset-0 z-50 flex items-center justify-center p-4"
                                    style="background: rgba(15,23,42,0.6); backdrop-filter: blur(4px);">

                                    {{-- Modal Card --}}
                                    <div @click.away="open = false"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 scale-95"
                                        x-transition:enter-end="opacity-100 scale-100"
                                        class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden">

                                        {{-- Modal Header --}}
                                        <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-zinc-950 px-6 py-5">
                                            <div class="flex items-start justify-between">
                                                <div>
                                                    <h3 class="text-lg font-extrabold text-white">Apply for Position</h3>
                                                    <p class="text-slate-350 text-sm mt-0.5">{{ $job->title }} &bull; {{ $job->company_name }}</p>
                                                </div>
                                                <button @click="open = false" class="text-slate-400 hover:text-amber-500 transition-colors mt-0.5 cursor-pointer">
                                                    <i class="fas fa-xmark text-xl"></i>
                                                </button>
                                            </div>
                                            {{-- Quick job info in modal --}}
                                            <div class="flex flex-wrap gap-2 mt-3">
                                                <span class="bg-white/20 text-white text-[11px] font-semibold px-2 py-0.5 rounded-full">
                                                    <i class="fas fa-briefcase mr-1 text-[9px]"></i>{{ $job->job_type }}
                                                </span>
                                                @if($job->experience_level)
                                                <span class="bg-white/20 text-white text-[11px] font-semibold px-2 py-0.5 rounded-full">
                                                    <i class="fas fa-chart-line mr-1 text-[9px]"></i>{{ $job->experience_level }}
                                                </span>
                                                @endif
                                                <span class="bg-green-400/30 text-green-100 text-[11px] font-bold px-2 py-0.5 rounded-full">
                                                    ${{ number_format($job->salary) }}@if($job->salary_max) – ${{ number_format($job->salary_max) }}@endif /yr
                                                </span>
                                                @if($job->application_deadline && !\Carbon\Carbon::parse($job->application_deadline)->isPast())
                                                <span class="bg-yellow-400/30 text-yellow-100 text-[11px] font-semibold px-2 py-0.5 rounded-full">
                                                    <i class="fas fa-clock mr-1 text-[9px]"></i>Deadline: {{ \Carbon\Carbon::parse($job->application_deadline)->format('M d') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- Modal Body --}}
                                        <form method="POST" action="{{ route('applicants.store', $job->id) }}"
                                            enctype="multipart/form-data"
                                            x-data="{ useSavedResume: {{ auth()->user()->resume_path ? 'true' : 'false' }} }">
                                            @csrf
                                            <div class="px-6 py-5 space-y-4">

                                                {{-- Row: Full Name + Phone --}}
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-600 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                                                        <div class="relative">
                                                            <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                                            <input type="text" name="full_name" id="full_name" required
                                                                placeholder="Your full name"
                                                                value="{{ auth()->user()->name }}"
                                                                class="w-full border border-gray-200 rounded-xl pl-8 pr-3 py-2 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-600 mb-1.5">Phone</label>
                                                        <div class="relative">
                                                            <i class="fas fa-phone absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                                            <input type="text" name="contact_phone" id="contact_phone"
                                                                placeholder="+1 (555) 000-0000"
                                                                class="w-full border border-gray-200 rounded-xl pl-8 pr-3 py-2 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Row: Email + Location --}}
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-600 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                                                        <div class="relative">
                                                            <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                                            <input type="email" name="contact_email" id="contact_email" required
                                                                placeholder="your@email.com"
                                                                value="{{ auth()->user()->email }}"
                                                                class="w-full border border-gray-200 rounded-xl pl-8 pr-3 py-2 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-600 mb-1.5">Your Location</label>
                                                        <div class="relative">
                                                            <i class="fas fa-map-pin absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
                                                            <input type="text" name="location" id="location"
                                                                placeholder="City, State"
                                                                class="w-full border border-gray-200 rounded-xl pl-8 pr-3 py-2 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Cover Message --}}
                                                <div>
                                                    <label class="block text-xs font-bold text-gray-600 mb-1.5">Message to Company</label>
                                                    <textarea name="message" id="message" rows="3"
                                                        placeholder="Tell them why you're a great fit..."
                                                        class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all resize-none"></textarea>
                                                </div>

                                                {{-- Row: Experience + Education --}}
                                                <div class="grid grid-cols-2 gap-3">
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-600 mb-1.5">Your Experience Level</label>
                                                        <select name="experience_level" id="experience_level"
                                                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-white">
                                                            <option value="">— Select —</option>
                                                            @foreach(['Entry Level','Mid Level','Senior Level','Lead / Principal','Executive'] as $exp)
                                                                <option value="{{ $exp }}" {{ old('experience_level') === $exp ? 'selected' : '' }}>{{ $exp }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label class="block text-xs font-bold text-gray-600 mb-1.5">Your Education Level</label>
                                                        <select name="education_level" id="education_level"
                                                            class="w-full border border-gray-200 rounded-xl px-3 py-2 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-white">
                                                            <option value="">— Select —</option>
                                                            @foreach(['No Requirement','High School / GED',"Bachelor's Degree","Master's Degree","PhD / Doctorate",'Certification / Diploma'] as $edu)
                                                                <option value="{{ $edu }}" {{ old('education_level') === $edu ? 'selected' : '' }}>{{ $edu }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Resume Section --}}
                                                <div>
                                                    <label class="block text-xs font-bold text-gray-600 mb-2">Resume <span class="text-red-500">*</span></label>
                                                    @if(auth()->user()->resume_path)
                                                        <div class="flex items-center gap-2 bg-green-50 border border-green-200 rounded-xl px-3 py-2.5 mb-2.5">
                                                            <div class="w-7 h-7 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                                                <i class="fas fa-file-pdf text-red-500 text-sm"></i>
                                                            </div>
                                                            <div class="flex-1 min-w-0">
                                                                <p class="text-xs font-bold text-gray-800">Profile Resume Available</p>
                                                                <a href="{{ Storage::disk('s3')->url(auth()->user()->resume_path) }}" target="_blank"
                                                                    class="text-[11px] text-amber-600 hover:underline">Preview PDF →</a>
                                                            </div>
                                                        </div>
                                                        <label class="flex items-center gap-2 cursor-pointer mb-2.5">
                                                            <input type="checkbox" name="use_saved_resume" value="1"
                                                                x-model="useSavedResume"
                                                                class="rounded border-gray-300 text-amber-600 focus:ring-amber-500 w-4 h-4">
                                                            <span class="text-sm text-gray-700 font-medium">Use my saved profile resume</span>
                                                        </label>
                                                        <div x-show="!useSavedResume" x-transition>
                                                            <label class="block text-xs text-gray-500 mb-1">Or upload a different PDF:</label>
                                                            <div class="border-2 border-dashed border-gray-200 rounded-xl p-3 hover:border-amber-300 transition-all">
                                                                <input type="file" name="resume_path" accept=".pdf"
                                                                    :required="!useSavedResume"
                                                                    class="block w-full text-sm text-gray-500 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-3 hover:border-amber-300 transition-all">
                                                            <input type="file" name="resume_path" accept=".pdf" required
                                                                class="block w-full text-sm text-gray-500 file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                                                        </div>
                                                        <p class="text-[11px] text-gray-400 mt-1.5">
                                                            <a href="{{ route('dashboard.index') }}" class="text-amber-600 hover:underline">Save a resume to your profile</a> to reuse it instantly!
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>

                                            {{-- Modal Footer --}}
                                            <div class="px-6 pb-5 flex gap-3">
                                                <button type="button" @click="open = false"
                                                    class="flex-1 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all text-sm">
                                                    Cancel
                                                </button>
                                                <button type="submit"
                                                    class="flex-1 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl transition-all text-sm shadow-md flex items-center justify-center gap-2 cursor-pointer">
                                                    <i class="fas fa-paper-plane text-xs"></i> Submit Application
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        @else
                            <div class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-green-150 text-green-700 font-bold rounded-xl border border-green-300 text-sm">
                                <i class="fas fa-circle-check"></i> Already Applied
                            </div>
                        @endif
                    @else
                        {{-- Disabled Status Button --}}
                        <div class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-gray-100 text-gray-500 font-bold rounded-xl border border-gray-200 text-sm">
                            <i class="fas fa-lock text-gray-400"></i> Applications not open ({{ $job->status === 'draft' ? 'Opening Soon' : 'Closed' }})
                        </div>
                    @endif

                    <a href="mailto:{{ $job->contact_email }}"
                        class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all text-sm border border-gray-200">
                        <i class="fas fa-envelope text-sm"></i> Email the Company
                    </a>
                </div>

                @else
                    {{-- Company user viewing another company's job --}}
                    <a href="mailto:{{ $job->contact_email }}"
                        class="flex items-center justify-center gap-2 px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all text-sm border border-gray-200">
                        <i class="fas fa-envelope text-sm"></i> Email the Company
                    </a>
                @endif
            @else
                {{-- Owner viewing their own job --}}
                <div x-data="{ opened: false }">
                    <button @click="opened = true"
                        class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl transition-all text-sm border border-gray-200">
                        <i class="fas fa-users text-sm"></i> View Applications
                    </button>
                    <div x-cloak x-show="opened" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background: rgba(15,23,42,0.5); backdrop-filter: blur(4px);">
                        <div @click.away="opened = false" class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-md">
                            <h3 class="text-lg font-bold mb-2">Applications for {{ $job->title }}</h3>
                            <p class="text-gray-500 text-sm">Manage applications from your <a href="{{ route('dashboard.index') }}" class="text-amber-600 underline">dashboard</a>.</p>
                        </div>
                    </div>
                </div>
            @endif
        @else
            @if($job->status === 'active')
                <a href="{{ route('login') }}"
                    class="flex items-center justify-center gap-2 w-full px-5 py-3 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl transition-all shadow-md cursor-pointer">
                    <i class="fas fa-right-to-bracket text-sm"></i> Login To Apply
                </a>
            @else
                <div class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-gray-100 text-gray-500 font-bold rounded-xl border border-gray-200 text-sm">
                    <i class="fas fa-lock text-gray-400"></i> Applications not open ({{ $job->status === 'draft' ? 'Opening Soon' : 'Closed' }})
                </div>
            @endif
        @endauth

    </section>

    {{-- ┌─────────────────────────────────────────┐
         │  RIGHT COLUMN — sidebar (1/3)           │
         └─────────────────────────────────────────┘ --}}
    <aside class="space-y-4">

        {{-- Company Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100 bg-gradient-to-r from-slate-50 to-gray-50">
                <h3 class="text-sm font-bold text-gray-700 flex items-center gap-2">
                    <i class="fas fa-building text-slate-500"></i> Company Info
                </h3>
            </div>
            <div class="p-5 text-center">
                @if($job->company_logo)
                    <img src="/storage/{{ $job->company_logo }}" alt="{{ $job->company_name }}"
                        class="w-20 h-20 rounded-2xl object-contain bg-gray-50 p-1 border border-gray-100 mx-auto mb-3">
                @else
                    <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-building text-gray-400 text-2xl"></i>
                    </div>
                @endif
                <h4 class="text-base font-bold text-gray-800">{{ $job->company_name }}</h4>
                @if($job->company_description ?? $job->description)
                <p class="text-gray-500 text-sm mt-2 leading-relaxed">
                    {{ \Illuminate\Support\Str::limit($job->company_description ?: $job->description, 150) }}
                </p>
                @endif
                @if($job->company_website)
                <a href="{{ $job->company_website }}" target="_blank"
                    class="inline-flex items-center gap-1.5 mt-3 text-amber-600 hover:text-amber-800 text-sm font-semibold transition-colors">
                    <i class="fas fa-globe text-xs"></i> Visit Website
                </a>
                @endif
                @if($job->contact_email)
                <a href="mailto:{{ $job->contact_email }}"
                    class="block mt-2 text-gray-500 hover:text-gray-700 text-xs transition-colors">
                    <i class="fas fa-envelope mr-1"></i>{{ $job->contact_email }}
                </a>
                @endif
                @if($job->contact_phone)
                <p class="mt-1 text-gray-500 text-xs"><i class="fas fa-phone mr-1"></i>{{ $job->contact_phone }}</p>
                @endif
            </div>
        </div>

        {{-- Save Job --}}
        @php
            $isBookmarked = auth()->check() && auth()->user()->bookmarkedJobs->contains($job->id);
        @endphp
        @guest
            <div class="bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 text-center text-sm text-gray-500">
                <i class="fas fa-bookmark mr-1"></i> <a href="{{ route('login') }}" class="text-amber-600 hover:underline">Login</a> to save this job
            </div>
        @else
            @if($isBookmarked)
                <form method="POST" action="{{ route('bookmarks.destroy', $job->id) }}">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-xl border border-gray-200 transition-all text-sm cursor-pointer">
                        <i class="fas fa-bookmark text-amber-500"></i> Saved
                    </button>
                </form>
            @else
                <form method="POST" action="{{ route('bookmarks.store', $job->id) }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl transition-all shadow-md text-sm cursor-pointer">
                        <i class="fas fa-bookmark"></i> Save Job
                    </button>
                </form>
            @endif
        @endguest

        {{-- Application Deadline Reminder --}}
        @if($job->application_deadline)
        <div class="{{ \Carbon\Carbon::parse($job->application_deadline)->isPast() ? 'bg-red-50 border-red-200' : 'bg-amber-50 border-amber-200' }} rounded-2xl border p-4 text-center">
            <i class="fas fa-clock {{ \Carbon\Carbon::parse($job->application_deadline)->isPast() ? 'text-red-500' : 'text-amber-500' }} text-lg mb-1"></i>
            <p class="text-xs font-bold {{ \Carbon\Carbon::parse($job->application_deadline)->isPast() ? 'text-red-700' : 'text-amber-700' }}">
                {{ \Carbon\Carbon::parse($job->application_deadline)->isPast() ? 'Applications Closed' : 'Apply Before' }}
            </p>
            <p class="text-sm font-extrabold {{ \Carbon\Carbon::parse($job->application_deadline)->isPast() ? 'text-red-800' : 'text-amber-800' }} mt-0.5">
                {{ \Carbon\Carbon::parse($job->application_deadline)->format('M d, Y') }}
            </p>
            @if(!\Carbon\Carbon::parse($job->application_deadline)->isPast())
            <p class="text-xs text-amber-600 mt-0.5">{{ \Carbon\Carbon::parse($job->application_deadline)->diffForHumans() }}</p>
            @endif
        </div>
        @endif

        {{-- Job Location Map Card --}}
        @if($job->latitude && $job->longitude)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-5 py-4 border-b border-gray-100 bg-gradient-to-r from-orange-50 to-amber-50">
                <h3 class="text-sm font-bold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-map-location-dot text-orange-500"></i> Job Location Map
                </h3>
            </div>
            <div class="p-3">
                <div id="map" class="w-full rounded-xl border border-gray-200 shadow-sm" style="height: 240px;"></div>
                <p class="text-[11px] text-gray-400 mt-2 text-center"><i class="fas fa-location-crosshairs mr-1"></i>{{ $job->city }}, {{ $job->state }}</p>
            </div>
        </div>
        @endif

    </aside>
</div>

@if($job->latitude && $job->longitude)
<script>
window.initMap = function() {
    const jobLocation = {
        lat: {{ floatval($job->latitude) }},
        lng: {{ floatval($job->longitude) }}
    };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: jobLocation,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: true
    });
    new google.maps.Marker({
        position: jobLocation,
        map: map,
        animation: google.maps.Animation.DROP
    });
};
</script>
@endif
</x-layout>
