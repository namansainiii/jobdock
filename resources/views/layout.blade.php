
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{$title ?? 'JobDock | Find and list jobs'}}</title>
</head>
<body class="bg-gray-100">
    <x-header/>
    @if(request()->is('/'))
    {{-- <x-hero title="find your dream job"/> --}}
    <x-hero/>
    {{-- <x-top-banner/> --}}

    @endif
    {{-- <x-top-banner title="unlock your career potential"/> --}}
    <x-top-banner/>


    {{-- <h1 class="text-red-500 text-4xl font-bold">Test</h1> --}}
    <main class="conatiner mx-autop-4 mt-4">
        @if(session('success'))
        <x-alert type="success" message="{{session('success')}}" timeout="2000"/>
        @endif
        @if(session('error'))
        <x-alert type="error" message="{{session('error')}}"/>
        @endif
        {{$slot}}
    </main>
    <script src="{{ asset('script/script.js') }}"></script>
</body>
</html>