@props(['job'])

@php
    // Detect logo path correctly (seeded vs uploaded)
    $logoUrl = '';
    if ($job->company_logo) {
        if (str_starts_with($job->company_logo, 'logos/logo-')) {
            $logoUrl = asset($job->company_logo);
        } else {
            $logoUrl = asset('storage/' . $job->company_logo);
        }
    }

    // Colors & icon based on job status
    $statusConfig = match($job->status) {
        'active'  => ['class' => 'bg-green-50 text-green-700 border border-green-200', 'icon' => 'fa-circle-check', 'label' => 'Active'],
        'draft'   => ['class' => 'bg-yellow-50 text-yellow-700 border border-yellow-200', 'icon' => 'fa-pen-to-square', 'label' => 'Opening Soon'],
        'closed'  => ['class' => 'bg-red-50 text-red-700 border border-red-200', 'icon' => 'fa-ban', 'label' => 'Closed'],
        default   => ['class' => 'bg-gray-50 text-gray-700 border border-gray-200', 'icon' => 'fa-circle', 'label' => ucfirst($job->status)],
    };
@endphp

<div class="group relative bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md hover:border-blue-150 transition-all duration-300 flex flex-col justify-between overflow-hidden">
    
    {{-- Card Body --}}
    <div class="p-6">
        {{-- Header: Logo + Title/Company --}}
        <div class="flex items-start gap-4 mb-4">
            @if($logoUrl)
                <img src="{{ $logoUrl }}" alt="{{ $job->company_name }}"
                    class="w-14 h-14 rounded-xl object-contain bg-gray-50 p-1 border border-gray-100 flex-shrink-0 transition-transform duration-300 group-hover:scale-105">
            @else
                <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0 border border-blue-100">
                    <i class="fas fa-building text-blue-500 text-xl"></i>
                </div>
            @endif
            <div class="min-w-0">
                <h3 class="text-lg font-bold text-gray-900 leading-snug group-hover:text-blue-600 transition-colors truncate">
                    <a href="{{ route('jobs.show', $job->id) }}">
                        {{ $job->title }}
                    </a>
                </h3>
                <p class="text-sm font-semibold text-gray-500 truncate">{{ $job->company_name }}</p>
                <p class="text-xs text-gray-400 mt-0.5"><i class="fas fa-map-pin mr-1"></i>{{ $job->city }}, {{ $job->state }}</p>
            </div>
        </div>

        {{-- Tags/Pills --}}
        <div class="flex flex-wrap gap-1.5 mb-4">
            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold {{ $statusConfig['class'] }}">
                <i class="fas {{ $statusConfig['icon'] }} text-[10px]"></i> {{ $statusConfig['label'] }}
            </span>
            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                <i class="fas fa-briefcase text-[10px]"></i> {{ $job->job_type }}
            </span>
            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100">
                <i class="fas fa-{{ $job->remote ? 'laptop-house' : 'building' }} text-[10px]"></i> {{ $job->remote ? 'Remote' : 'On-site' }}
            </span>
            @if($job->experience_level)
            <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-50 text-purple-700 border border-purple-100">
                <i class="fas fa-chart-line text-[10px]"></i> {{ $job->experience_level }}
            </span>
            @endif
        </div>

        {{-- Description --}}
        <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
            {{ $job->description }}
        </p>

        {{-- Additional Info Grid --}}
        <div class="bg-gray-50 rounded-xl p-3.5 space-y-2 text-xs border border-gray-100">
            <div class="flex justify-between">
                <span class="text-gray-400 font-medium">Compensation:</span>
                <span class="font-bold text-green-700">
                    ${{ number_format($job->salary) }}
                    @if($job->salary_max) – ${{ number_format($job->salary_max) }} @endif
                    <span class="font-normal text-gray-400">/yr</span>
                </span>
            </div>
            @if($job->vacancies && $job->vacancies > 1)
            <div class="flex justify-between">
                <span class="text-gray-400 font-medium">Positions:</span>
                <span class="font-semibold text-gray-700">{{ $job->vacancies }} open roles</span>
            </div>
            @endif
            @if($job->tags)
            <div class="pt-1.5 border-t border-gray-200/60 flex items-start gap-1.5">
                <span class="text-gray-400 font-medium flex-shrink-0">Tags:</span>
                <span class="text-gray-500 font-semibold truncate">{{ implode(', ', array_map('trim', explode(',', $job->tags))) }}</span>
            </div>
            @endif
        </div>
    </div>

    {{-- Card Footer CTA --}}
    <div class="px-6 pb-6 pt-0">
        <a href="{{ route('jobs.show', $job->id) }}"
            class="block w-full text-center py-2.5 bg-blue-50 border border-blue-200 hover:bg-blue-600 hover:text-white hover:border-transparent text-blue-700 font-bold rounded-xl text-sm transition-all shadow-sm">
            Job Details
        </a>
    </div>
</div>