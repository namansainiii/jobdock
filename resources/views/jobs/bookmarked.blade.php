<x-layout>
    <x-slot name="title">My Saved Jobs | JobDock</x-slot>

    @php
        $countAll    = $bookmarks->count();
        $countActive = $bookmarks->where('status', 'active')->count();
        $countDraft  = $bookmarks->where('status', 'draft')->count();
        $countClosed = $bookmarks->where('status', 'closed')->count();
    @endphp

    <div class="max-w-7xl mx-auto px-4 py-8">
        
        @if($bookmarks->count() > 0)
        {{-- Initialize Alpine filter state with all saved jobs --}}
        <div x-data="{
            selectedTypes: [],
            minSalary: '',
            bookmarkFilter: 'all',
            
            // Helper function to check if a job matches selected filters
            matches(jobType, salary, status) {
                // Status Filter Tab check
                if (this.bookmarkFilter !== 'all' && status !== this.bookmarkFilter) {
                    return false;
                }

                // Job Type Filter Sidebar check
                if (this.selectedTypes.length > 0) {
                    const matched = this.selectedTypes.some(t => t.toLowerCase() === jobType.toLowerCase());
                    if (!matched) return false;
                }
                
                // Min Salary Filter Sidebar check
                if (this.minSalary && salary < parseInt(this.minSalary)) {
                    return false;
                }
                
                return true;
            },

            // Get count of filtered items currently visible
            getFilteredCount() {
                let count = 0;
                @foreach($bookmarks as $bookmark)
                    if (this.matches('{{ $bookmark->job_type }}', {{ $bookmark->salary }}, '{{ $bookmark->status }}')) {
                        count++;
                    }
                @endforeach
                return count;
            },

            clearFilters() {
                this.selectedTypes = [];
                this.minSalary = '';
                this.bookmarkFilter = 'all';
            }
        }">
            
            <div class="flex flex-col md:flex-row gap-6">
                
                {{-- ===== FILTER SIDEBAR (Same as All Jobs page) ===== --}}
                <aside class="w-full md:w-64 flex-shrink-0">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 sticky top-4">
                        
                        {{-- Header --}}
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-base font-bold text-gray-800 flex items-center gap-2">
                                <i class="fas fa-sliders-h text-amber-500"></i>
                                Filters
                            </h3>
                            <span x-show="selectedTypes.length > 0 || minSalary !== '' || bookmarkFilter !== 'all'" 
                                  @click="clearFilters()" 
                                  class="text-xs text-gray-400 hover:text-red-500 cursor-pointer font-semibold transition-all">
                                Clear
                            </span>
                        </div>

                        {{-- Job Type Checkboxes --}}
                        <div class="mb-5">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wide mb-2.5">Job Type</p>
                            <div class="space-y-2">
                                @foreach(['Full-Time', 'Part-Time', 'Contract', 'Internship', 'Freelance'] as $type)
                                    <label class="flex items-center gap-2.5 cursor-pointer group">
                                        <input type="checkbox" value="{{ $type }}" x-model="selectedTypes"
                                            class="rounded border-gray-300 text-amber-600 focus:ring-amber-500 w-4 h-4 flex-shrink-0">
                                        <span class="text-sm text-gray-600 group-hover:text-amber-600 transition-colors"
                                              :class="selectedTypes.includes('{{ $type }}') ? 'font-semibold text-amber-700' : ''">
                                            {{ $type }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="border-t border-gray-100 my-4"></div>

                        {{-- Min Salary --}}
                        <div class="mb-2">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wide mb-2.5">Minimum Salary ($/yr)</p>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 text-sm">$</span>
                                <input type="number" x-model="minSalary" placeholder="e.g. 50000" min="0" step="5000"
                                    class="w-full pl-7 pr-3 py-2 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition-all"
                                    :class="minSalary ? 'border-amber-400 bg-amber-50/20' : ''">
                            </div>
                        </div>

                    </div>
                </aside>

                {{-- ===== JOB CARDS GRID ===== --}}
                <div class="flex-1 min-w-0">
                    
                    {{-- Status Quick Filter Tab Bar --}}
                    <div class="flex items-center gap-2 flex-wrap justify-start mb-6 border-b border-gray-100 pb-5">
                        <button @click="bookmarkFilter = 'all'"
                            :class="bookmarkFilter === 'all' ? 'bg-gray-800 text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                            class="flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold transition-all">
                            All Saved
                            <span class="bg-white/20 px-1.5 py-0.5 rounded-full text-[10px]">{{ $countAll }}</span>
                        </button>
                        <button @click="bookmarkFilter = 'active'"
                            :class="bookmarkFilter === 'active' ? 'bg-green-600 text-white' : 'bg-green-55 text-green-700 border border-green-200 hover:bg-green-100'"
                            class="flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold transition-all">
                            🟢 Active Roles
                            <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-white/20">{{ $countActive }}</span>
                        </button>
                        <button @click="bookmarkFilter = 'draft'"
                            :class="bookmarkFilter === 'draft' ? 'bg-yellow-500 text-white' : 'bg-yellow-50 text-yellow-700 border border-yellow-200 hover:bg-yellow-100'"
                            class="flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold transition-all">
                            🟡 Opening Soon
                            <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-white/20">{{ $countDraft }}</span>
                        </button>
                        <button @click="bookmarkFilter = 'closed'"
                            :class="bookmarkFilter === 'closed' ? 'bg-red-600 text-white' : 'bg-red-50 text-red-700 border border-red-200 hover:bg-red-100'"
                            class="flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-bold transition-all">
                            🔴 Closed Roles
                            <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-white/20">{{ $countClosed }}</span>
                        </button>
                    </div>

                    <div class="mb-4">
                        <p class="text-sm text-gray-500">
                            Showing <span class="font-bold text-gray-800" x-text="getFilteredCount()"></span> of {{ $bookmarks->count() }} saved jobs
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach($bookmarks as $bookmark)
                            <div x-show="matches('{{ $bookmark->job_type }}', {{ $bookmark->salary }}, '{{ $bookmark->status }}')"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 translate-y-1"
                                 x-transition:enter-end="opacity-100 translate-y-0">
                                <x-job-card :job="$bookmark"/>
                            </div>
                        @endforeach
                    </div>

                    {{-- No-results message for empty filtered state --}}
                    <div x-show="getFilteredCount() === 0" 
                         class="text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm mt-4" 
                         style="display:none;">
                        <div class="text-5xl mb-4">🔍</div>
                        <h3 class="text-xl font-bold text-gray-700 mb-2">No Saved Jobs Found</h3>
                        <p class="text-gray-400 text-sm mb-4 max-w-xs mx-auto">No saved jobs match your current filter selections. Try clearing or relaxing the filters.</p>
                        <button @click="clearFilters()" 
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-sm transition-all shadow-sm cursor-pointer">
                            Clear Filters
                        </button>
                    </div>

                </div>

            </div>

        </div>
        @else
            {{-- Default empty state when they have 0 total bookmarks --}}
            <div class="text-center py-20 bg-white rounded-2xl border border-gray-100 shadow-sm max-w-xl mx-auto">
                <div class="text-5xl mb-4">🔖</div>
                <h2 class="text-xl font-bold text-gray-700 mb-2">No Saved Jobs</h2>
                <p class="text-gray-400 text-sm mb-6 max-w-sm mx-auto">You haven't saved any jobs yet. Save jobs to access them here for quick retrieval later.</p>
                <a href="{{ route('jobs.index') }}" 
                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-bold rounded-xl text-sm transition-all shadow-sm cursor-pointer">
                    <i class="fa-solid fa-magnifying-glass"></i> Explore Jobs
                </a>
            </div>
        @endif

    </div>
</x-layout>