<x-layout>
    <h1 class="text-center text-3xl border p-3 bg-blue-900 text-white" style="margin-top: -15px;">Bookmarked Jobs</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
        @forelse($bookmarks as $bookmark)
        <x-job-card :job="$bookmark"/>
        @empty
        <!-- <p class="text-gray-500 text-center">You Have No Bookmarked Jobs</p> -->
         <h2 class="text-center text-3xl p-30 text-blue-900">You Have No Bookmarked Jobs</h2>

        @endforelse
    </div>
</x-layout>