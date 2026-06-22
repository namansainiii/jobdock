{{-- @extends('layout')
@section('content') --}}
<x-layout>
  <div style="margin-top: -15px;" class="bg-blue-900 h-24 mb-4 flex justify-center items-center"><x-search></x-search></div>
  {{-- Back button --}}
  @if(request()->has('keywords') || request()->has('location'))
      <a href="{{ route('jobs.index') }}" style="background: gray;" class="hover:bg-gray-600 text-white px-4 py-2 rounded mb-4 inline-block ml-4">
          <i class="fa fa-arrow-left mr-1"></i> Back
      </a>
  @endif
  <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
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