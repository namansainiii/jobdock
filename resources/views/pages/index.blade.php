{{-- @extends('layout')
@section('content') --}}
<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
       @forelse($jobs as $job)
           <x-job-card :job="$job"></x-job-card>
       @empty
           <p1>No job present</p1>
       @endforelse
    </div>
    <div class="flex justify-center">
        <a href="{{ route('jobs.index') }}" class="inline-flex items-center px-6 py-4 bg-blue-700 hover:bg-blue-500 text-white text-sm font-semibold rounded-xl shadow-md transition-all duration-200">
            <i class="fa fa-list"></i>
            Show All Jobs
        </a>
    </div>
    {{-- <x-bottom-banner title="looking to hire?" heading="testing heading"/> --}}
    {{-- <x-bottom-banner /> --}}

</x-layout>

    
{{-- @endsection --}}