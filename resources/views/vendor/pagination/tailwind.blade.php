@if ($paginator->hasPages())

<div class="mt-12 mb-12 flex flex-col items-center">

    {{-- Results Count --}}
    {{-- <div class="mb-5 text-gray-600 font-medium text-center">
        Showing
        <span class="font-bold">{{ $paginator->firstItem() }}</span>
        -
        <span class="font-bold">{{ $paginator->lastItem() }}</span>
        of
        <span class="font-bold">{{ $paginator->total() }}</span>
        jobs
    </div> --}}

    {{-- Pagination --}}
    <nav role="navigation" aria-label="Pagination Navigation">

        <div class="flex items-center justify-center gap-3 flex-wrap">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())

                <span
                    class="px-5 py-3 rounded-xl bg-gray-200 text-gray-400 cursor-not-allowed shadow">
                    ← Previous
                </span>

            @else

                <a href="{{ $paginator->previousPageUrl() }}"
                    rel="prev"
                    class="px-5 py-3 rounded-xl bg-blue-700 text-white shadow hover:bg-blue-800 transition duration-200">
                    ← Previous
                </a>

            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)

                {{-- Dots --}}
                @if (is_string($element))

                    <span class="px-3 text-gray-500">
                        {{ $element }}
                    </span>

                @endif

                {{-- Links --}}
                @if (is_array($element))

                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())

                            <span
                                class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-700 text-white font-bold shadow-lg">
                                {{ $page }}
                            </span>

                        @else

                            <a href="{{ $url }}"
                                class="w-12 h-12 flex items-center justify-center rounded-full bg-white border-2 border-blue-700 text-blue-700 font-medium hover:bg-blue-700 hover:text-white transition duration-200">
                                {{ $page }}
                            </a>

                        @endif

                    @endforeach

                @endif

            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())

                <a href="{{ $paginator->nextPageUrl() }}"
                    rel="next"
                    class="px-5 py-3 rounded-xl bg-blue-700 text-white shadow hover:bg-blue-800 transition duration-200">
                    Next →
                </a>

            @else

                <span
                    class="px-5 py-3 rounded-xl bg-gray-200 text-gray-400 cursor-not-allowed shadow">
                    Next →
                </span>

            @endif

        </div>

    </nav>

</div>

@endif