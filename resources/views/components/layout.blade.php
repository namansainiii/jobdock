
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- @vite('resources/css/app.css') --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💼</text></svg>">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{$title ?? 'JobDock | Find and list jobs'}}</title>
</head>
<body class="bg-gray-100">

    <x-header/>

    @if(request()->is('/'))
        <x-hero/>
    @elseif(request()->is('jobs') || request()->is('jobs/search'))
        {{-- Show a combined search hero header on the search/index list page --}}
        <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-zinc-950 py-8 px-4 text-center text-white mb-6">
            <h1 class="text-3xl font-extrabold tracking-tight mb-2">Find Your Next Role</h1>
            <p class="text-slate-300 text-sm mb-6">Explore the best job opportunities curated just for you.</p>
            <div class="max-w-4xl mx-auto">
                <x-search/>
            </div>
        </div>
    @elseif(request()->is('bookmarks'))
        <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-zinc-950 py-10 px-4 text-center text-white mb-6">
            <h1 class="text-3xl font-extrabold tracking-tight mb-2">Saved Jobs</h1>
            <p class="text-slate-300 text-sm">Keep track of the opportunities you're interested in.</p>
        </div>
    @else
        <x-top-banner :title="$bannerTitle ?? 'Your Next Chapter Starts Here'" :subtitle="$bannerSubtitle ?? 'Connect with leading employers and find your dream career.'" />
    @endif


    {{-- <h1 class="text-red-500 text-4xl font-bold">Test</h1> --}}
    <main class="conatiner mx-autop-4 mt-4">
        @if(session('success'))
        <x-alert type="success" message="{{session('success')}}" timeout="2000"/>
        @endif
        @if(session('error'))
        <x-alert type="error" message="{{session('error')}}"/>
        @endif
        <div class="mb-2">{{$slot}}</div>
    </main>
    <script>
        // Fallback initMap to prevent "initMap is not a function" errors on pages without maps
        window.initMap = window.initMap || function() {};
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>
</body>
</html>




{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'JobDock | Find and list jobs')</title>
</head>
<body class="bg-gray-100">
     <h1>Welcome to JobDock</h1> 
     @include('partials.navbar')
    <x-header/>
    <main class="conatiner mx-autop-4 mt-4">
        @yield('content')
    </main>
</body>
</html> --}}