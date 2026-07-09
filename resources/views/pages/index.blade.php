<x-layout>
    <x-slot name="title">JobDock | Find Your Dream Job</x-slot>

    <div class="max-w-7xl mx-auto px-4 py-12">
        
        {{-- Section: Featured Jobs --}}
        <div class="text-center mb-10">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl tracking-tight">
                Featured Opportunities
            </h2>
            <p class="mt-3 max-w-2xl mx-auto text-sm text-gray-500">
                Explore top job roles from leading companies. Find the position that matches your skills and ambitions.
            </p>
        </div>

        {{-- Jobs Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
           @forelse($jobs as $job)
               <x-job-card :job="$job"></x-job-card>
           @empty
               <div class="col-span-full text-center py-12">
                   <div class="text-4xl mb-2">💼</div>
                   <p class="text-gray-400 font-medium">No featured jobs available right now.</p>
               </div>
           @endforelse
        </div>

        {{-- Show All Jobs CTA --}}
        <div class="flex justify-center">
            <a href="{{ route('jobs.index') }}" 
                class="inline-flex items-center gap-2 px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-md hover:shadow-lg transition-all duration-250 text-sm">
                <i class="fa-solid fa-list-check"></i>
                Browse All Open Roles
            </a>
        </div>

    </div>
</x-layout>