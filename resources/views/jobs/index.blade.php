{{-- @extends('layout')
@section('content') --}}
<x-layout>
  {{-- Search bar banner --}}
  <div style="margin-top: -15px;" class="bg-blue-900 h-24 mb-4 flex justify-center items-center">
    <x-search></x-search>
  </div>

  {{-- Back button --}}
  @php
    $hasFilters = request()->hasAny(['keywords', 'location', 'job_type', 'min_salary']);
    $activeJobTypes = request()->input('job_type', []);
    $activeMinSalary = request()->input('min_salary', '');
    $activeFilterCount = count($activeJobTypes) + ($activeMinSalary !== '' ? 1 : 0);
  @endphp

  @if($hasFilters)
    <a href="{{ route('jobs.index') }}" style="background: gray;" class="hover:bg-gray-600 text-white px-4 py-2 rounded mb-4 inline-block ml-4">
      <i class="fa fa-arrow-left mr-1"></i> Clear All Filters
    </a>
  @endif

  {{-- Main layout: sidebar + job grid --}}
  <div class="flex flex-col md:flex-row gap-6 px-2">

    {{-- ===== FILTER SIDEBAR ===== --}}
    <aside class="w-full md:w-64 flex-shrink-0">
      <form method="GET" action="{{ route('jobs.index') }}" id="filter-form">
        {{-- Preserve existing search params --}}
        @if(request('keywords'))
          <input type="hidden" name="keywords" value="{{ request('keywords') }}">
        @endif
        @if(request('location'))
          <input type="hidden" name="location" value="{{ request('location') }}">
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
          {{-- Header --}}
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-base font-bold text-gray-800 flex items-center gap-2">
              <i class="fas fa-sliders-h text-blue-500"></i>
              Filters
            </h3>
            @if($activeFilterCount > 0)
              <span class="bg-blue-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">{{ $activeFilterCount }}</span>
            @endif
          </div>

          {{-- Job Type Filter --}}
          <div class="mb-5">
            <p class="text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">Job Type</p>
            @foreach(['Full-time', 'Part-time', 'Contract', 'Internship', 'Remote'] as $type)
              <label class="flex items-center gap-2.5 py-1 cursor-pointer group">
                <input
                  type="checkbox"
                  name="job_type[]"
                  value="{{ $type }}"
                  {{ in_array($type, $activeJobTypes) ? 'checked' : '' }}
                  onchange="document.getElementById('filter-form').submit()"
                  class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 w-4 h-4 flex-shrink-0">
                <span class="text-sm text-gray-700 group-hover:text-blue-600 transition-colors {{ in_array($type, $activeJobTypes) ? 'font-semibold text-blue-700' : '' }}">
                  {{ $type }}
                </span>
              </label>
            @endforeach
          </div>

          {{-- Divider --}}
          <div class="border-t border-gray-100 my-4"></div>

          {{-- Minimum Salary Filter --}}
          <div class="mb-5">
            <p class="text-sm font-semibold text-gray-700 mb-2 uppercase tracking-wide">Minimum Salary ($)</p>
            <div class="relative">
              <span class="absolute inset-y-0 left-3 flex items-center text-gray-400 text-sm">$</span>
              <input
                type="number"
                name="min_salary"
                id="min_salary"
                value="{{ $activeMinSalary }}"
                placeholder="e.g. 50000"
                min="0"
                step="5000"
                class="w-full pl-7 pr-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all {{ $activeMinSalary ? 'border-blue-400 bg-blue-50' : '' }}">
            </div>
          </div>

          {{-- Apply button --}}
          <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-sm transition-all flex items-center justify-center gap-2">
            <i class="fas fa-search text-xs"></i>
            Apply Filters
          </button>

          @if($activeFilterCount > 0)
            @php
              $clearFiltersParams = [];
              if(request('keywords')) $clearFiltersParams['keywords'] = request('keywords');
              if(request('location')) $clearFiltersParams['location'] = request('location');
              $clearFiltersUrl = route('jobs.index') . ($clearFiltersParams ? '?' . http_build_query($clearFiltersParams) : '');
            @endphp
            <a href="{{ $clearFiltersUrl }}"
              class="mt-2 w-full inline-flex items-center justify-center gap-2 text-sm text-gray-500 hover:text-red-600 py-1.5 transition-colors">
              <i class="fas fa-times-circle text-xs"></i>
              Clear filters
            </a>
          @endif
        </div>
      </form>
    </aside>

    {{-- ===== JOB CARDS GRID ===== --}}
    <div class="flex-1 min-w-0">
      {{-- Results count --}}
      <div class="flex items-center justify-between mb-3">
        <p class="text-sm text-gray-500">
          @if($hasFilters)
            <span class="font-semibold text-gray-800">{{ $jobs->total() }}</span> job{{ $jobs->total() !== 1 ? 's' : '' }} found
          @else
            Showing all available jobs
          @endif
        </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        @forelse($jobs as $job)
          <x-job-card :job="$job"></x-job-card>
        @empty
          <div class="col-span-3 text-center py-16">
            <div class="text-5xl mb-4">🔍</div>
            <h3 class="text-xl font-bold text-gray-700 mb-2">No jobs found</h3>
            <p class="text-gray-500 mb-4">Try adjusting your filters or search terms.</p>
            <a href="{{ route('jobs.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-semibold text-sm transition-all">
              View all jobs
            </a>
          </div>
        @endforelse
      </div>

      <div class="mt-6">
        {{ $jobs->links() }}
      </div>
    </div>

  </div>
</x-layout>
{{-- @endsection --}}