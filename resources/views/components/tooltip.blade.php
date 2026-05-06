@props(['text'])

<div class="relative group" x-data="{ show: false }" x-on:mouseenter="show = true" x-on:mouseleave="show = false">
    {{ $slot }}

    <div x-cloak x-show="show" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1"
        class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-2 py-1 text-xs font-medium text-white bg-gray-900 dark:bg-gray-700 rounded-lg whitespace-nowrap z-50 pointer-events-none">
        {{ $text }}
        <div class="absolute top-full left-1/2 -translate-x-1/2 -mt-1">
            <div class="border-4 border-transparent border-t-gray-900 dark:border-t-gray-700"></div>
        </div>
    </div>
</div>
