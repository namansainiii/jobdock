{{-- @extends('layout')
@section('content') --}}
<x-layout>
  <div class="bg-blue-900 h-24 mb-4 flex justify-center items-center"><x-search></x-search></div>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    @forelse($jobs as $job)
      <x-job-card :job="$job"></x-job-card>
      {{-- <div style="text:bold"><a href="{{ route( 'jobs.show' , $job->id) }}">{{$job->title}}</a></div> --}}
      {{-- <li>{{$job->description}}</li> --}}
    @empty
      <p1>No job present</p1>
    @endforelse
  </div>
  {{$jobs->links();}}
</x-layout>
{{-- @endsection --}}