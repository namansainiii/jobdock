<x-layout>
    <section class="max-w-8xl mx-auto flex flex-col md:flex-row items-start gap-6 px-4 py-6 @if($user->role === 'company') md:h-[calc(100vh-140px)] @endif">
        <!-- Left Pane: Profile Card -->
        <div x-data="{ 
            editing: {{ ($errors->any() || session('edit_profile')) ? 'true' : 'false' }},
            avatarPreview: '{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/profile.png') }}'
        }" class="bg-white p-6 rounded-2xl shadow-md border border-gray-150 w-full md:w-1/3 md:sticky md:top-6">
            <div class="flex items-center justify-between mb-6 pb-2 border-b border-gray-100">
                <h3 class="text-2xl font-bold text-gray-800">
                    My Profile
                </h3>
                <button 
                    type="button" 
                    @click="editing = !editing"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-50 hover:bg-amber-50 hover:text-amber-700 text-gray-600 text-xs font-bold rounded-xl border border-gray-200 hover:border-amber-200 transition-all shadow-sm cursor-pointer"
                >
                    <template x-if="!editing">
                        <span><i class="fas fa-edit text-xs"></i> Edit</span>
                    </template>
                    <template x-if="editing">
                        <span><i class="fas fa-arrow-left text-xs"></i> Back</span>
                    </template>
                </button>
            </div>
            
            <div class="mt-2 flex justify-center mb-6">
                <img :src="avatarPreview" alt="{{ $user->name }}" class="w-32 h-32 object-cover rounded-full ring-4 ring-amber-500/10">
            </div>

            <!-- Display Mode -->
            <div x-show="!editing" class="space-y-5" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Name</span>
                    <p class="text-sm font-semibold text-gray-850 mt-0.5">{{ $user->name }}</p>
                </div>
                
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Email</span>
                    <p class="text-sm font-semibold text-gray-850 mt-0.5">{{ $user->email }}</p>
                </div>

                @if($user->role === 'company')
                    @if($user->company_about)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Company About</span>
                            <p class="text-sm text-gray-650 leading-relaxed mt-1 whitespace-pre-line">{{ $user->company_about }}</p>
                        </div>
                    @endif

                    @if($user->technologies_used)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Technologies Used</span>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(array_map('trim', explode(',', $user->technologies_used)) as $tech)
                                    @if($tech)
                                        <span class="bg-slate-50 border border-slate-200 text-slate-700 text-xs font-semibold px-2.5 py-1 rounded-lg">
                                            {{ $tech }}
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($user->contact_phone)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Contact Phone</span>
                            <p class="text-sm font-semibold text-gray-850 mt-0.5">{{ $user->contact_phone }}</p>
                        </div>
                    @endif

                    @if($user->contact_email)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Contact Email</span>
                            <p class="text-sm font-semibold text-gray-855 mt-0.5">{{ $user->contact_email }}</p>
                        </div>
                    @endif
                @else
                    @if($user->about_me)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">About Yourself</span>
                            <p class="text-sm text-gray-650 leading-relaxed mt-1 whitespace-pre-line">{{ $user->about_me }}</p>
                        </div>
                    @endif

                    @if($user->skills)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Skills</span>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach(array_map('trim', explode(',', $user->skills)) as $skill)
                                    @if($skill)
                                        <span class="bg-amber-50 border border-amber-200 text-amber-800 text-xs font-semibold px-2.5 py-1 rounded-lg shadow-sm">
                                            {{ $skill }}
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if($user->education)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Education</span>
                            <p class="text-sm font-semibold text-gray-850 mt-0.5">🎓 {{ $user->education }}</p>
                        </div>
                    @endif

                    @if($user->contact_phone)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Contact Phone</span>
                            <p class="text-sm font-semibold text-gray-850 mt-0.5">{{ $user->contact_phone }}</p>
                        </div>
                    @endif

                    @if($user->contact_email)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Contact Email</span>
                            <p class="text-sm font-semibold text-gray-855 mt-0.5">{{ $user->contact_email }}</p>
                        </div>
                    @endif

                    @if($user->resume_path)
                        <div>
                            <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-1.5">Resume</span>
                            <div class="flex items-center justify-between bg-green-50 border border-green-200 rounded-xl px-3.5 py-2.5">
                                <div class="flex items-center gap-2 min-w-0">
                                    <i class="fas fa-file-pdf text-red-500 text-lg flex-shrink-0"></i>
                                    <span class="text-xs font-bold text-gray-800 truncate">Resume Saved</span>
                                </div>
                                <a href="{{ asset('storage/' . $user->resume_path) }}" target="_blank" class="text-xs font-bold text-amber-600 hover:underline flex-shrink-0 ml-2">View current resume →</a>
                            </div>
                        </div>
                    @endif
                @endif

                <div class="pt-3 border-t border-gray-100">
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Phone Visibility</span>
                    <p class="text-xs text-gray-500 mt-1">
                        @if($user->show_phone_to_others)
                            <span class="text-green-600 font-semibold"><i class="fas fa-eye"></i> Visible</span> to connected users.
                        @else
                            <span class="text-gray-500 font-semibold"><i class="fas fa-eye-slash"></i> Hidden</span> from others.
                        @endif
                    </p>
                </div>
            </div>

            <!-- Edit Mode -->
            <div x-show="editing" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <form method="POST" action={{ route('profile.update') }} enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <x-input.text label="Name" id="name" name="name" value="{{$user->name}}" />

                    <x-input.text label="Email" id="email" type="email" name="email" value="{{$user->email}}" />

                    <x-input.file label="Upload Avatar" id="avatar" name="avatar" @change="
                        const file = $event.target.files[0];
                        if (file) {
                            avatarPreview = URL.createObjectURL(file);
                        }
                    " />

                    @if($user->role === 'company')
                        {{-- Company Fields --}}
                        <x-input.text-area label="Company About" id="company_about" name="company_about" value="{{$user->company_about}}" rows="4" placeholder="Describe your company, mission, and work culture..." />
                        
                        <x-input.text label="Technologies Used" id="technologies_used" name="technologies_used" value="{{$user->technologies_used}}" placeholder="e.g. PHP, Laravel, React, Tailwind CSS" list="technologies-list" />
                        <datalist id="technologies-list">
                            <option value="Laravel">Laravel</option>
                            <option value="PHP">PHP</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="React">React</option>
                            <option value="Vue">Vue</option>
                            <option value="Angular">Angular</option>
                            <option value="Node.js">Node.js</option>
                            <option value="Python">Python</option>
                            <option value="Django">Django</option>
                            <option value="Ruby on Rails">Ruby on Rails</option>
                            <option value="Java">Java</option>
                            <option value="C#">C#</option>
                            <option value="Go">Go</option>
                            <option value="Docker">Docker</option>
                            <option value="PostgreSQL">PostgreSQL</option>
                            <option value="MySQL">MySQL</option>
                            <option value="MongoDB">MongoDB</option>
                            <option value="Tailwind CSS">Tailwind CSS</option>
                            <option value="Bootstrap">Bootstrap</option>
                            <option value="TypeScript">TypeScript</option>
                            <option value="AWS">AWS</option>
                            <option value="Firebase">Firebase</option>
                            <option value="Swift">Swift</option>
                            <option value="Kotlin">Kotlin</option>
                            <option value="Flutter">Flutter</option>
                        </datalist>
                        
                        <x-input.text label="Contact Phone" id="contact_phone" name="contact_phone" value="{{$user->contact_phone}}" placeholder="e.g. +1 (555) 123-4567" />
                        
                        <x-input.text label="Contact Email" id="contact_email" type="email" name="contact_email" value="{{$user->contact_email}}" placeholder="e.g. contact@company.com" />
                    @else
                        {{-- User (Employee) Fields --}}
                        <x-input.text-area label="About Yourself" id="about_me" name="about_me" value="{{$user->about_me}}" rows="4" placeholder="Describe your professional background, goals, and interests..." />
                        
                        <div x-data="{
                            skills: '{{ addslashes($user->skills ?? '') }}'.split(',').map(s => s.trim()).filter(s => s.length > 0),
                            inputValue: '',
                            addSkill(value) {
                                let skill = value.trim();
                                if (skill && !this.skills.includes(skill)) {
                                    this.skills.push(skill);
                                }
                                this.inputValue = '';
                            },
                            removeSkill(index) {
                                this.skills.splice(index, 1);
                            },
                            handleInput(e) {
                                const val = this.inputValue;
                                if (val.endsWith(',')) {
                                    let skill = val.slice(0, -1).trim();
                                    if (skill) {
                                        this.addSkill(skill);
                                    }
                                    return;
                                }
                                const isSelection = e && (e.inputType === 'insertReplacementText' || !e.inputType || e.type === 'change');
                                if (isSelection) {
                                    const datalist = document.getElementById('skills-list');
                                    if (datalist) {
                                        const match = Array.from(datalist.options).find(opt => opt.value.toLowerCase() === val.trim().toLowerCase());
                                        if (match) {
                                            this.addSkill(match.value);
                                        }
                                    }
                                }
                            }
                        }" class="mb-4">
                            <label class="block text-gray-700" for="skills_input">Skills</label>
                            <input type="hidden" name="skills" :value="skills.join(', ')">
                            <div class="relative">
                                <input
                                    id="skills_input"
                                    type="text"
                                    class="w-full px-4 py-2.5 border @error('skills') border-red-500 @else border-gray-250 @enderror rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all text-sm"
                                    placeholder="e.g. JavaScript, Python, UI Design, Project Management"
                                    x-model="inputValue"
                                    @keydown.enter.prevent="addSkill(inputValue)"
                                    @keydown.comma.prevent="addSkill(inputValue)"
                                    @input="handleInput($event)"
                                    @change="handleInput($event)"
                                    @blur="addSkill(inputValue)"
                                    list="skills-list"
                                />
                            </div>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <template x-for="(skill, index) in skills" :key="index">
                                    <span class="inline-flex items-center gap-1 bg-amber-50 hover:bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-1 rounded-lg border border-amber-200 transition-all shadow-sm">
                                        <span x-text="skill"></span>
                                        <button type="button" @click="removeSkill(index)" class="text-amber-600 hover:text-amber-900 focus:outline-none font-bold text-sm ml-1 cursor-pointer">
                                            &times;
                                        </button>
                                    </span>
                                </template>
                            </div>
                            @error('skills')
                                <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <datalist id="skills-list">
                            <option value="JavaScript">JavaScript</option>
                            <option value="TypeScript">TypeScript</option>
                            <option value="Python">Python</option>
                            <option value="PHP">PHP</option>
                            <option value="HTML & CSS">HTML & CSS</option>
                            <option value="React">React</option>
                            <option value="Vue">Vue</option>
                            <option value="Angular">Angular</option>
                            <option value="Node.js">Node.js</option>
                            <option value="SQL">SQL</option>
                            <option value="Java">Java</option>
                            <option value="C++">C++</option>
                            <option value="C#">C#</option>
                            <option value="Go">Go</option>
                            <option value="Swift">Swift</option>
                            <option value="Kotlin">Kotlin</option>
                            <option value="Flutter">Flutter</option>
                            <option value="Frontend Development">Frontend Development</option>
                            <option value="Backend Development">Backend Development</option>
                            <option value="Full Stack Development">Full Stack Development</option>
                            <option value="Mobile App Development">Mobile App Development</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Project Management">Project Management</option>
                            <option value="Product Management">Product Management</option>
                            <option value="Quality Assurance (QA)">Quality Assurance (QA)</option>
                            <option value="DevOps">DevOps</option>
                            <option value="Cloud Architecture">Cloud Architecture</option>
                            <option value="Data Analysis">Data Analysis</option>
                            <option value="Data Science">Data Science</option>
                            <option value="Machine Learning">Machine Learning</option>
                            <option value="Database Administration">Database Administration</option>
                            <option value="Cybersecurity">Cybersecurity</option>
                            <option value="Git & Version Control">Git & Version Control</option>
                            <option value="Agile Methodologies">Agile Methodologies</option>
                            <option value="Technical Writing">Technical Writing</option>
                        </datalist>
                        
                        @php
                        $educationOptions = [
                            '' => 'Select Education Level',
                            'High School' => 'High School',
                            'Associate' => "Associate's Degree",
                            'Bachelor' => "Bachelor's Degree",
                            'Master' => "Master's Degree",
                            'Doctorate' => 'Doctorate / PhD',
                            'Other' => 'Other / Self-Taught'
                        ];
                        @endphp
                        <x-input.select label="Education" id="education" name="education" value="{{$user->education}}" :options="$educationOptions" />
                        
                        <x-input.text label="Contact Phone" id="contact_phone" name="contact_phone" value="{{$user->contact_phone}}" placeholder="e.g. +1 (555) 987-6543" />
                        
                        <x-input.text label="Contact Email" id="contact_email" type="email" name="contact_email" value="{{$user->contact_email}}" placeholder="e.g. seeker@test.com" />
                        
                        {{-- Profile Resume Section --}}
                        <div class="mt-4 mb-3 border-t border-gray-100 pt-4">
                            <p class="block text-sm font-semibold text-gray-700 mb-1">Profile Resume (PDF)</p>

                            @if($user->resume_path)
                                {{-- Resume exists: show file info + delete button --}}
                                <div class="flex items-center justify-between bg-green-50 border border-green-200 rounded-xl px-3 py-2 mb-2">
                                    <div class="flex items-center gap-2 min-w-0">
                                        <i class="fas fa-file-pdf text-red-500 text-lg flex-shrink-0"></i>
                                        <div class="min-w-0">
                                            <p class="text-sm font-semibold text-gray-800 truncate">Resume Saved</p>
                                            <a href="{{ asset('storage/' . $user->resume_path) }}" target="_blank" class="text-xs text-amber-600 hover:underline">View current resume →</a>
                                        </div>
                                    </div>
                                    <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-0.5 rounded-full flex-shrink-0 ml-2">Active</span>
                                </div>

                                {{-- Upload a new one to replace --}}
                                <label class="block text-xs text-gray-500 mb-1">Replace with a new PDF:</label>
                                <input type="file" id="resume_path" name="resume_path" accept=".pdf"
                                    class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 border border-gray-200 rounded-lg">
                            @else
                                {{-- No resume: show upload input --}}
                                <label class="block text-xs text-gray-400 mb-1">No resume saved yet. Upload a PDF (max 5MB):</label>
                                <input type="file" id="resume_path" name="resume_path" accept=".pdf"
                                    class="block w-full text-sm text-gray-500 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-semibold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100 border border-gray-200 rounded-lg">
                            @endif
                        </div>
                    @endif

                    {{-- Contact phone visibility toggle --}}
                    <div class="mt-4 mb-4 flex items-start gap-2.5">
                        <div class="flex items-center h-5">
                            <input id="show_phone_to_others" name="show_phone_to_others" type="checkbox" value="1" {{ $user->show_phone_to_others ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500 cursor-pointer">
                        </div>
                        <div class="text-xs">
                            <label for="show_phone_to_others" class="font-semibold text-gray-700 cursor-pointer select-none">Show contact phone number to others</label>
                            <p class="text-gray-500">Enable this to allow users you connect with to view your phone number.</p>
                        </div>
                    </div>
                    
                    <div class="flex gap-3 mt-6">
                        <button type="submit" class="flex-1 bg-amber-600 hover:bg-amber-700 text-white py-2 px-4 rounded-xl transition-all font-semibold cursor-pointer shadow-sm text-sm">Save Profile</button>
                        <button type="button" @click="editing = false" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-xl transition-all font-semibold cursor-pointer shadow-sm text-sm text-center">Back</button>
                    </div>
                </form>

                {{-- Delete resume form (outside the main form, separate POST) --}}
                @if($user->role !== 'company' && $user->resume_path)
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
                                    class="text-xs font-semibold border rounded-lg px-2 py-1.5 cursor-pointer focus:outline-none focus:ring-2 focus:ring-amber-500 transition-all
                                    {{ $job->status === 'active' ? 'bg-green-50 border-green-300 text-green-700' : ($job->status === 'draft' ? 'bg-yellow-50 border-yellow-300 text-yellow-700' : 'bg-red-50 border-red-300 text-red-700') }}">
                                    <option value="active"  {{ $job->status === 'active'  ? 'selected' : '' }}>🟢 Active</option>
                                    <option value="draft"   {{ $job->status === 'draft'   ? 'selected' : '' }}>🟡 Draft</option>
                                    <option value="closed"  {{ $job->status === 'closed'  ? 'selected' : '' }}>🔴 Closed</option>
                                </select>
                            </form>
                            <a href="{{ route('jobs.edit', ['job' => $job->id, 'from' => 'dashboard']) }}" class="bg-amber-600 hover:bg-amber-700 text-white px-4 py-2 rounded text-sm transition-all font-semibold shadow-sm cursor-pointer">Edit</a>
                            <form method="POST" action="{{ route('jobs.destroy' , $job->id) }}?from=dashboard" onsubmit="return confirm('Are you sure you want to delete this Job?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm transition-all font-semibold shadow-sm cursor-pointer">
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
                    <button @click="openModal = true" class="px-5 py-3 bg-amber-50 border border-amber-200 hover:bg-amber-100 text-amber-950 rounded-xl text-sm font-bold transition-all flex items-center gap-2.5 cursor-pointer shadow-sm">
                        <i class="fas fa-users text-amber-600 text-lg"></i>
                        <span>Applicants:</span>
                        <span class="bg-amber-600 text-white rounded-full px-2.5 py-0.5 text-xs font-extrabold">{{ $job->applicants->count() }}</span>
                        <span class="text-xs text-amber-600 font-semibold">(Click to view)</span>
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
                                            <button type="button" @click="statusFilter = 'All'" :class="statusFilter === 'All' ? 'bg-amber-600 text-white shadow-sm font-bold' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
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
                                            <button type="button" @click="statusFilter = 'Interviewing'" :class="statusFilter === 'Interviewing' ? 'bg-amber-600 text-white shadow-sm font-bold' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'" class="px-3 py-1.5 rounded-lg text-xs transition-all cursor-pointer">
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
                                                :class="activeApplicantId === {{ $applicant->id }} ? 'border-amber-500 bg-amber-50/40 shadow-sm ring-1 ring-amber-500' : 'border-gray-200 hover:bg-gray-50'"
                                                class="p-4 border rounded-xl cursor-pointer transition-all duration-200 flex justify-between items-center"
                                            >
                                                <div>
                                                    <h5 class="text-sm font-extrabold text-gray-900">{{ $applicant->full_name }}</h5>
                                                    <p class="text-xs text-gray-400 mt-0.5">Applied: {{ $applicant->created_at->format('M d, Y') }}</p>
                                                    <span class="inline-block mt-2 px-2 py-0.5 rounded-full text-[10px] font-bold 
                                                        {{ $applicant->status === 'Shortlisted' ? 'bg-green-100 text-green-800' : '' }}
                                                        {{ $applicant->status === 'Reviewing' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                        {{ $applicant->status === 'Interviewing' ? 'bg-amber-100 text-amber-800' : '' }}
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
                                        <div class="bg-slate-900 px-6 py-4 flex items-center justify-between border-b border-slate-800">
                                            <div class="flex items-center gap-2">
                                                <!-- Close Arrow back to list -->
                                                <button @click="activeApplicantId = null" class="text-white hover:text-amber-500 p-1.5 hover:bg-white/10 rounded-lg transition-all focus:outline-none cursor-pointer">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                                                    </svg>
                                                </button>
                                                <div>
                                                    <h4 class="text-sm font-bold text-white">Applicant Profile</h4>
                                                    <p class="text-[10px] text-slate-300">Inspect resume and submit changes.</p>
                                                </div>
                                            </div>
                                            <button @click="activeApplicantId = null" class="text-slate-400 hover:text-amber-500 text-xs font-bold tracking-wide uppercase focus:outline-none cursor-pointer">
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
                                                    <a href="mailto:{{ $applicant->contact_email }}" class="text-amber-600 hover:underline font-bold text-sm break-all">{{ $applicant->contact_email }}</a>
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
                                                @if($applicant->experience_level)
                                                <div>
                                                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Experience Level</span>
                                                    <span class="text-gray-800 font-semibold text-sm">💼 {{ $applicant->experience_level }}</span>
                                                </div>
                                                @endif
                                                @if($applicant->education_level)
                                                <div>
                                                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">Education Level</span>
                                                    <span class="text-gray-800 font-semibold text-sm">🎓 {{ $applicant->education_level }}</span>
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
                                                        <button type="submit" class="w-full px-3 py-2 rounded-lg text-xs font-bold transition-all cursor-pointer text-left flex items-center justify-between {{ $applicant->status === 'Interviewing' ? 'bg-amber-100 text-amber-900 shadow-sm border border-amber-300' : 'text-gray-500 hover:text-gray-900 border border-transparent' }}">
                                                            Interviewing
                                                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
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

                                            <!-- Private Notes Card -->
                                            <div class="pt-4 border-t border-gray-100">
                                                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block mb-2">Private Notes (Company Only)</span>
                                                <form method="POST" action="{{ route('applicants.notes', $applicant->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <textarea 
                                                        name="applicant_notes" 
                                                        rows="3" 
                                                        placeholder="Write private ratings, interview feedback, or applicant notes here..." 
                                                        class="w-full px-3 py-2 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all text-xs resize-none bg-gray-50/50 hover:bg-white focus:bg-white"
                                                    >{{ old('applicant_notes', $applicant->applicant_notes) }}</textarea>
                                                    <div class="mt-2 flex justify-end">
                                                        <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-1.5 px-3 rounded-lg text-xs transition-all shadow-sm flex items-center gap-1 cursor-pointer">
                                                            <i class="fas fa-save text-[10px]"></i> Save Notes
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- Detail Footer -->
                                        <div class="border-t border-gray-150 px-6 py-4 bg-gray-50 flex items-center justify-between mt-auto" @click.stop>
                                            <div class="flex items-center gap-2">
                                                <a href="{{ asset('storage/' . $applicant->resume_path) }}" target="_blank" class="px-3 py-2 bg-amber-50 hover:bg-amber-100 text-amber-700 rounded-lg text-xs font-bold flex items-center gap-1.5 transition-all">
                                                    <i class="fas fa-eye"></i> View Resume
                                                </a>
                                                <a href="{{ asset('storage/' . $applicant->resume_path) }}" target="_blank" class="px-3 py-2 border border-gray-200 hover:bg-gray-50 text-gray-700 rounded-lg text-xs font-bold flex items-center gap-1.5 transition-all" download>
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
                                        <div class="w-16 h-16 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center mb-4 shadow-sm border border-amber-100">
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
                                        <a href="{{ route('jobs.show', $application->job->id) }}" class="hover:underline text-amber-700">
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
                                        {{ $application->status === 'Interviewing' ? 'bg-amber-100 text-amber-800'    : '' }}
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