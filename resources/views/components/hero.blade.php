@props(['title' => 'Find Your Dream Job'])

<section class="hero relative bg-cover bg-center bg-no-repeat h-80 flex items-center overflow-hidden">
    <picture class="absolute inset-0 w-full h-full pointer-events-none">
        <source srcset="{{ asset('images/hero.webp') }}" type="image/webp">
        <img src="{{ asset('images/hero.jpg') }}" 
             alt="{{ $title }}"
             fetchpriority="high"
             loading="eager"
             decoding="async"
             class="w-full h-full object-cover"
             width="1920" height="320">
    </picture>
    <div class="overlay"></div>
    <div class="container mx-auto text-center z-10">
        <h2 class="text-4xl md:text-5xl text-white font-bold mb-8">
            {{$title}}
        </h2>
        <x-search/>
    </div>
</section>