@props(['title' => 'Looking to hire?', 
'heading' => 'Post your job listing now and find the perfect candidate.'])

<section class="w-full">
    <div class="bg-blue-800 text-white pl-4 pr-4 pt-2 pb-2 flex items-center justify-between flex-col md:flex-row gap-4 mt-4 mb-2">
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