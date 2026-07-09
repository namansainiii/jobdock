@props(['title' => 'Looking to hire?', 
'heading' => 'Post your job listing now and find the perfect candidate.'])

<section class="w-full">
    <div class="bg-slate-800 border border-slate-700 text-white pl-6 pr-6 pt-6 pb-6 flex items-center justify-between flex-col md:flex-row gap-4 mt-6 rounded-2xl shadow-sm">
        <div>
            <h2 class="text-xl font-semibold">{{$title}}</h2>
            <p class="text-gray-200 text-lg mt-2">
                {{$heading}}
            </p>
        </div>

        @auth

        <x-button-link icon="edit" url="/jobs/create">Create Job</x-button-link>

        @else

        <x-navlink url="/login" :active="request()->is('login')" icon="user">
            Login
        </x-navlink>

        @endauth

    </div>
</section>