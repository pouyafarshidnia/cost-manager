@if ($errors->any())

    <div class="fixed top-4 left-1/2 -translate-x-1/2 z-50 flex flex-col gap-2 w-full max-w-sm px-4">

        @foreach ($errors->all() as $error)
            <div
                class="flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800 animate-fade-in-down">
                <div class="shrink-0">
                    <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <p class="text-sm font-medium flex-1 text-red-800 dark:text-red-300">{{ $error }}</p>
                <button onclick="this.parentElement.remove()"
                    class="shrink-0 p-1 rounded-lg text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/40 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
        @endforeach

    </div>
@endif


@if (session('success'))
    <div class="fixed top-4 left-1/2 -translate-x-1/2 z-50 flex flex-col gap-2 w-full max-w-sm px-4">
        <div
            class="flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border bg-green-50 dark:bg-green-900/20 border-green-200 dark:border-green-800 animate-fade-in-down">
            <div class="shrink-0">
                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <p class="text-sm font-medium flex-1 text-green-800 dark:text-green-300">{{ session('success') }}</p>
            <button onclick="this.parentElement.remove()"
                class="shrink-0 p-1 rounded-lg text-green-600 dark:text-green-400 hover:bg-green-100 dark:hover:bg-green-900/40 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="fixed top-4 left-1/2 -translate-x-1/2 z-50 flex flex-col gap-2 w-full max-w-sm px-4">
        <div
            class="flex items-center gap-3 px-4 py-3 rounded-xl shadow-lg border bg-red-50 dark:bg-red-900/20 border-red-200 dark:border-red-800 animate-fade-in-down">
            <div class="shrink-0">
                <svg class="w-5 h-5 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <p class="text-sm font-medium flex-1 text-red-800 dark:text-red-300">{{ session('error') }}</p>
            <button type='button' onclick="this.parentElement.remove()"
                class="shrink-0 p-1 rounded-lg text-red-600 dark:text-red-400 hover:bg-red-100 dark:hover:bg-red-900/40 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>
@endif
