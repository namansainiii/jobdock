@props([
    'title' => 'Your Next Chapter Starts Here',
    'subtitle' => 'Connect with leading employers and find your dream career.'
])

<section class="bg-gradient-to-r from-slate-900 to-zinc-900 text-white py-6 text-center">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-semibold">
            {{$title}}
        </h2>
        @if($subtitle)
            <p class="text-lg mt-2 text-slate-300">
                {{$subtitle}}
            </p>
        @endif
    </div>
</section>