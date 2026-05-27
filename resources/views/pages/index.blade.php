{{-- @extends('layout')
@section('content') --}}
<x-layout>
    <h2 class="text-center ext-3xl m-4 font-bold border border-gray-300 p-3">Welcome to JobDock</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
       @forelse($jobs as $job)
           <x-job-card :job="$job"></x-job-card>
       @empty
           <p1>No job present</p1>
       @endforelse
    </div>
    <a href="{{ route('jobs.index' , $job->id) }}" class="block text-xl text-center ">
        <i class="fa fa-arrow-alt-circle-right"></i>Show All Jobs</a>
    {{-- <x-bottom-banner title="looking to hire?" heading="testing heading"/> --}}
    <x-bottom-banner />

</x-layout>

    
{{-- @endsection --}}