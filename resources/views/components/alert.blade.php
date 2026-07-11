@props([
    'type' => 'success',
    'message' => '',
    'timeout' => 5000
])

@php
    $config = match($type) {
        'success' => [
            'bg' => 'bg-white',
            'border' => 'border-emerald-500',
            'icon' => 'fa-circle-check',
            'iconColor' => 'text-emerald-500',
            'textColor' => 'text-slate-800',
            'subColor' => 'text-slate-500',
            'progressBg' => 'bg-emerald-500',
            'label' => 'Success'
        ],
        'error' => [
            'bg' => 'bg-white',
            'border' => 'border-rose-500',
            'icon' => 'fa-circle-exclamation',
            'iconColor' => 'text-rose-500',
            'textColor' => 'text-slate-800',
            'subColor' => 'text-slate-500',
            'progressBg' => 'bg-rose-500',
            'label' => 'Error'
        ],
        'warning' => [
            'bg' => 'bg-white',
            'border' => 'border-amber-500',
            'icon' => 'fa-triangle-exclamation',
            'iconColor' => 'text-amber-500',
            'textColor' => 'text-slate-800',
            'subColor' => 'text-slate-500',
            'progressBg' => 'bg-amber-500',
            'label' => 'Warning'
        ],
        default => [
            'bg' => 'bg-white',
            'border' => 'border-blue-500',
            'icon' => 'fa-circle-info',
            'iconColor' => 'text-blue-500',
            'textColor' => 'text-slate-800',
            'subColor' => 'text-slate-500',
            'progressBg' => 'bg-blue-500',
            'label' => 'Info'
        ]
    };
@endphp

<div
    x-data="{ show: false, progress: 100 }"
    x-init="
        $nextTick(() => show = true);
        const interval = 50;
        const step = (interval / {{ $timeout }}) * 100;
        const timer = setInterval(() => {
            if (progress > 0) {
                progress -= step;
            } else {
                clearInterval(timer);
                show = false;
            }
        }, interval);
    "
    x-show="show"
    x-transition:enter="transition ease-out duration-300 transform"
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-5 right-5 z-[9999] max-w-sm w-full bg-white shadow-xl rounded-2xl border-l-4 {{ $config['border'] }} overflow-hidden pointer-events-auto"
    role="alert"
>
    <div class="p-4 flex items-start gap-3">
        {{-- Icon --}}
        <div class="flex-shrink-0 mt-0.5">
            <i class="fa-solid {{ $config['icon'] }} {{ $config['iconColor'] }} text-xl"></i>
        </div>
        
        {{-- Content --}}
        <div class="flex-1">
            <p class="text-sm font-bold {{ $config['textColor'] }}">
                {{ $config['label'] }}
            </p>
            <p class="text-xs {{ $config['subColor'] }} mt-0.5">
                {{ $message }}
            </p>
        </div>

        {{-- Close Button --}}
        <button 
            @click="show = false" 
            class="flex-shrink-0 text-slate-400 hover:text-slate-600 transition-colors p-0.5 rounded-lg hover:bg-slate-50"
        >
            <i class="fa-solid fa-xmark text-sm"></i>
        </button>
    </div>

    {{-- Progress Bar --}}
    <div class="w-full h-1 bg-slate-100">
        <div 
            class="h-full {{ $config['progressBg'] }} transition-all duration-75 ease-linear" 
            x-bind:style="'width: ' + progress + '%'"
        ></div>
    </div>
</div>