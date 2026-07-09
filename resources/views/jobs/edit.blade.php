<x-layout>
    <x-slot name="title">Edit Job — {{ $job->title }}</x-slot>

    {{-- Page Hero --}}
    <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-zinc-950 py-10 px-4 text-center text-white mb-8">
        <div class="flex items-center justify-center gap-3 mb-2">
            <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                <i class="fas fa-pen-to-square text-white text-lg"></i>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight">Edit Job</h1>
        </div>
        <p class="text-slate-300 text-sm">Update the details for <span class="font-semibold text-white">{{ $job->title }}</span></p>
    </div>

    <div class="max-w-5xl mx-auto px-4 pb-16">
        {{-- Validation Errors --}}
        @if($errors->any())
        <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 flex gap-3">
            <i class="fas fa-circle-exclamation text-red-500 mt-0.5 flex-shrink-0"></i>
            <div>
                <p class="text-sm font-bold text-red-700 mb-1">Please fix the following errors:</p>
                <ul class="list-disc list-inside text-sm text-red-600 space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <form method="POST" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            <input type="hidden" name="from" value="{{ request('from') }}">

            {{-- ══════════════════════════════════════════
                 SECTION 1 — JOB OVERVIEW
            ══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex items-center gap-3 px-6 py-4 bg-gradient-to-r from-slate-100 to-slate-200 border-b border-gray-100">
                    <div class="w-8 h-8 bg-slate-700 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-info-circle text-white text-sm"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Job Overview</h2>
                        <p class="text-xs text-gray-500">Basic information about the position</p>
                    </div>
                </div>
                <div class="p-6 space-y-5">
                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Job Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}"
                            placeholder="e.g. Senior Frontend Developer"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all @error('title') border-red-400 bg-red-50 @enderror">
                    </div>

                    {{-- Row: Industry + Job Type --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Industry</label>
                            <select name="industry" id="industry"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-white">
                                <option value="">— Select Industry —</option>
                                @foreach([
                                    'Technology','Software / IT','Finance & Banking','Healthcare',
                                    'Marketing & Advertising','Education','Retail & E-commerce',
                                    'Manufacturing','Logistics & Supply Chain','Hospitality',
                                    'Legal','Real Estate','Media & Entertainment','Other'
                                ] as $ind)
                                    <option value="{{ $ind }}" {{ old('industry', $job->industry) === $ind ? 'selected' : '' }}>{{ $ind }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Job Type <span class="text-red-500">*</span></label>
                            <select name="job_type" id="job_type"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-white @error('job_type') border-red-400 @enderror">
                                @foreach(['Full-Time','Part-Time','Contract','Internship','Freelance'] as $jt)
                                    <option value="{{ $jt }}" {{ old('job_type', $job->job_type) === $jt ? 'selected' : '' }}>{{ $jt }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Row: Experience + Education --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Experience Level</label>
                            <select name="experience_level" id="experience_level"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-white">
                                <option value="">— Any Experience —</option>
                                @foreach(['Entry Level','Mid Level','Senior Level','Lead / Principal','Executive'] as $exp)
                                    <option value="{{ $exp }}" {{ old('experience_level', $job->experience_level) === $exp ? 'selected' : '' }}>{{ $exp }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Education Level</label>
                            <select name="education_level" id="education_level"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-white">
                                <option value="">— Any Education —</option>
                                @foreach(['No Requirement','High School / GED',"Bachelor's Degree","Master's Degree","PhD / Doctorate",'Certification / Diploma'] as $edu)
                                    <option value="{{ $edu }}" {{ old('education_level', $job->education_level) === $edu ? 'selected' : '' }}>{{ $edu }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Row: Remote + Vacancies + Deadline --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Remote Work <span class="text-red-500">*</span></label>
                            <select name="remote" id="remote"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-white">
                                <option value="0" {{ old('remote', $job->remote) == '0' ? 'selected' : '' }}>On-site</option>
                                <option value="1" {{ old('remote', $job->remote) == '1' ? 'selected' : '' }}>Remote</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Open Positions</label>
                            <input type="number" name="vacancies" id="vacancies"
                                value="{{ old('vacancies', $job->vacancies ?? 1) }}"
                                min="1" max="999"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Application Deadline</label>
                            <input type="date" name="application_deadline" id="application_deadline"
                                value="{{ old('application_deadline', $job->application_deadline ? \Carbon\Carbon::parse($job->application_deadline)->format('Y-m-d') : '') }}"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                        </div>
                    </div>

                    {{-- Tags --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Tags <span class="text-gray-400 font-normal">(comma-separated)</span></label>
                        <div class="relative">
                            <i class="fas fa-tags absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="text" name="tags" id="tags" value="{{ old('tags', $job->tags) }}"
                                placeholder="e.g. react,nodejs,remote,startup"
                                class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                        </div>
                    </div>
                </div>
            </div>

            {{-- ══════════════════════════════════════════
                 SECTION 2 — COMPENSATION
            ══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex items-center gap-3 px-6 py-4 bg-gradient-to-r from-green-50 to-emerald-50 border-b border-gray-100">
                    <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-dollar-sign text-white text-sm"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Compensation</h2>
                        <p class="text-xs text-gray-500">Salary range in annual USD</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Min Salary (Annual) <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 font-semibold text-sm">$</span>
                                <input type="number" name="salary" id="salary" value="{{ old('salary', $job->salary) }}"
                                    placeholder="60000" min="0" step="1000"
                                    class="w-full border border-gray-200 rounded-xl pl-8 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all @error('salary') border-red-400 @enderror">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Max Salary <span class="text-gray-400 font-normal">(optional)</span></label>
                            <div class="relative">
                                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 font-semibold text-sm">$</span>
                                <input type="number" name="salary_max" id="salary_max" value="{{ old('salary_max', $job->salary_max) }}"
                                    placeholder="90000" min="0" step="1000"
                                    class="w-full border border-gray-200 rounded-xl pl-8 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ══════════════════════════════════════════
                 SECTION 3 — JOB DETAILS
            ══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex items-center gap-3 px-6 py-4 bg-gradient-to-r from-purple-50 to-violet-50 border-b border-gray-100">
                    <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-file-lines text-white text-sm"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Job Details</h2>
                        <p class="text-xs text-gray-500">Description, requirements, and benefits</p>
                    </div>
                </div>
                <div class="p-6 space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Job Description <span class="text-red-500">*</span></label>
                        <textarea name="description" id="description" rows="6"
                            placeholder="Describe the role, responsibilities..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all resize-none @error('description') border-red-400 @enderror">{{ old('description', $job->description) }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Requirements</label>
                            <textarea name="requirements" id="requirements" rows="4"
                                placeholder="Required skills, education, experience..."
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all resize-none">{{ old('requirements', $job->requirements) }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Benefits</label>
                            <textarea name="benefits" id="benefits" rows="4"
                                placeholder="Health insurance, 401k, flexible hours..."
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all resize-none">{{ old('benefits', $job->benefits) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ══════════════════════════════════════════
                 SECTION 4 — LOCATION
            ══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex items-center gap-3 px-6 py-4 bg-gradient-to-r from-orange-50 to-amber-50 border-b border-gray-100">
                    <div class="w-8 h-8 bg-orange-500 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-map-pin text-white text-sm"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Location</h2>
                        <p class="text-xs text-gray-500">Where is the job based?</p>
                    </div>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Address</label>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            <input type="text" name="address" id="address" value="{{ old('address', $job->address) }}"
                                placeholder="Start typing an address..."
                                class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-3">
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">City <span class="text-red-500">*</span></label>
                                <input type="text" name="city" id="city" value="{{ old('city', $job->city) }}"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm @error('city') border-red-400 @enderror">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">State <span class="text-red-500">*</span></label>
                                <input type="text" name="state" id="state" value="{{ old('state', $job->state) }}"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm @error('state') border-red-400 @enderror">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">ZIP Code</label>
                                <input type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', $job->zipcode) }}"
                                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm">
                            </div>
                            <input type="hidden" name="latitude" id="latitude" value="{{ $job->latitude }}">
                            <input type="hidden" name="longitude" id="longitude" value="{{ $job->longitude }}">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Map Preview</label>
                            <div id="map" class="w-full rounded-xl border border-gray-200 shadow-sm" style="height: 220px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ══════════════════════════════════════════
                 SECTION 5 — COMPANY INFO
            ══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex items-center gap-3 px-6 py-4 bg-gradient-to-r from-slate-50 to-gray-50 border-b border-gray-100">
                    <div class="w-8 h-8 bg-slate-700 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-building text-white text-sm"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Company Info</h2>
                        <p class="text-xs text-gray-500">Tell candidates about your company</p>
                    </div>
                </div>
                <div class="p-6 space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Company Name <span class="text-red-500">*</span></label>
                            <input type="text" name="company_name" id="company_name" value="{{ old('company_name', $job->company_name) }}"
                                placeholder="Acme Corp"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all @error('company_name') border-red-400 @enderror">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Company Website</label>
                            <div class="relative">
                                <i class="fas fa-globe absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                                <input type="url" name="company_website" id="company_website" value="{{ old('company_website', $job->company_website) }}"
                                    placeholder="https://acmecorp.com"
                                    class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Company Description</label>
                        <textarea name="company_description" id="company_description" rows="3"
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all resize-none">{{ old('company_description', $job->company_description) }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Contact Email <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                                <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $job->contact_email) }}"
                                    class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all @error('contact_email') border-red-400 @enderror">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Contact Phone</label>
                            <div class="relative">
                                <i class="fas fa-phone absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                                <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $job->contact_phone) }}"
                                    class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Company Logo</label>
                        @if($job->company_logo)
                        <div class="flex items-center gap-3 mb-3 p-3 bg-gray-50 rounded-xl border border-gray-200">
                            <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Current logo" class="w-12 h-12 object-contain rounded-lg border bg-white">
                            <p class="text-xs text-gray-500">Current logo — upload a new one to replace it.</p>
                        </div>
                        @endif
                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 flex items-center gap-4 hover:border-amber-300 transition-all">
                            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                            <div class="flex-1">
                                <input type="file" name="company_logo" id="company_logo" accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                                <p class="text-xs text-gray-400 mt-0.5">PNG, JPG, GIF up to 2MB</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ══════════════════════════════════════════
                 SECTION 6 — PUBLISH
            ══════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="flex items-center gap-3 px-6 py-4 bg-gradient-to-r from-teal-50 to-cyan-50 border-b border-gray-100">
                    <div class="w-8 h-8 bg-teal-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-paper-plane text-white text-sm"></i>
                    </div>
                    <div>
                        <h2 class="text-base font-bold text-gray-800">Publishing</h2>
                        <p class="text-xs text-gray-500">Control visibility of this listing</p>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-end">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1.5">Publish Status</label>
                            <select name="status" id="status"
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all bg-white">
                                <option value="active"  {{ old('status', $job->status) === 'active'  ? 'selected' : '' }}>🟢 Active — visible to job seekers</option>
                                <option value="draft"   {{ old('status', $job->status) === 'draft'   ? 'selected' : '' }}>🟡 Draft — hidden, save for later</option>
                                <option value="closed"  {{ old('status', $job->status) === 'closed'  ? 'selected' : '' }}>🔴 Closed — position filled</option>
                            </select>
                            <p class="text-xs text-gray-400 mt-1.5">You can also toggle this directly from your dashboard.</p>
                        </div>
                        <div class="flex flex-col gap-2">
                            <button type="submit"
                                class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-6 rounded-xl transition-all flex items-center justify-center gap-2 shadow-md hover:shadow-lg cursor-pointer">
                                <i class="fas fa-floppy-disk text-sm"></i>
                                Save Changes
                            </button>
                            <a href="{{ request('from') === 'dashboard' ? route('dashboard.index') : route('jobs.index') }}"
                                class="w-full text-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2.5 px-6 rounded-xl transition-all text-sm">
                                Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</x-layout>

<script>
let map, marker, autocomplete;
function initMap() {
    const lat = {{ $job->latitude ?? 28.6139 }};
    const lng = {{ $job->longitude ?? 77.2090 }};
    const defaultLocation = { lat, lng };
    map = new google.maps.Map(document.getElementById("map"), { center: defaultLocation, zoom: $job->latitude ? 13 : 5 });
    marker = new google.maps.Marker({ position: defaultLocation, map });
    autocomplete = new google.maps.places.Autocomplete(document.getElementById("address"), { types: ['address'] });
    autocomplete.addListener("place_changed", function() {
        const place = autocomplete.getPlace();
        if (!place.geometry) return;
        const lat = place.geometry.location.lat();
        const lng = place.geometry.location.lng();
        map.setCenter({ lat, lng });
        map.setZoom(15);
        marker.setPosition({ lat, lng });
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;
        let city = '', state = '', zipcode = '';
        place.address_components.forEach(component => {
            const types = component.types;
            if (types.includes('locality') || types.includes('sublocality') || types.includes('sublocality_level_1')) city = component.long_name;
            if (types.includes('administrative_area_level_1')) state = component.long_name;
            if (types.includes('postal_code')) zipcode = component.long_name;
        });
        marker = new google.maps.Marker({ position: { lat, lng }, map, draggable: true });
        document.getElementById("city").value = city;
        document.getElementById("state").value = state;
        document.getElementById("zipcode").value = zipcode;
    });
}
</script>