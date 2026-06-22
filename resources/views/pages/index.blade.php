{{-- @extends('layout')
@section('content') --}}
<x-layout>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
       @forelse($jobs as $job)
           <x-job-card :job="$job"></x-job-card>
       @empty
           <p1>No job present</p1>
       @endforelse
    </div>
    <a href="{{ route('jobs.index') }}" class="block text-xl text-center">
        <i class="fa fa-arrow-alt-circle-right"></i>Show All Jobs</a>
    {{-- <x-bottom-banner title="looking to hire?" heading="testing heading"/> --}}
    {{-- <x-bottom-banner /> --}}

</x-layout>

    
{{-- @endsection --}}