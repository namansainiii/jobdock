{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Job</title>
</head>
<body>
    <h1>Create New Job</h1>
    <form action="/jobs" method="POST">
        @csrf
        <input type="text" name="title" placeholder="title"/>
        <input type="text" name="description" placeholder="description"/>
        <button type="submit">Submit</button>


    </form>
    //<button><a href={{$url}}>Back to job search</a></button>
</body>
</html> --}}

{{-- @extends('layout')
@section('title')
Create Job
@endsection
@section('content') --}}
<x-layout>
    <x-slot name="title">Create Jobs</x-slot>
    <h1 class="m-5">Create New Job</h1>
    <form class="m-5" action="/jobs" method="POST">
        @csrf
        <div class="my-5">
            <input type="text" class="border-1 border-black" name="title" placeholder="TITLE" value={{old('title')}} >
            @error('title')
            <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
            @enderror
        </div>
        <div class="my-5">
            <input type="text" class="border-1 border-black" name="description" placeholder="DESCRIPTION" value={{old('description')}} >
            @error('description')
            <div class="text-red-500 mt-2 text-sm">{{$message}}</div>
            @enderror
        </div>

        <button class="border-1 border-black p-1" type="submit">Submit</button>
    </form>
</x-layout>
{{-- @endsection --}}