        @props(['route' => '', 'title' => '', 'number' => '', 'subtitle' => ''])

        <a href="{{ $route }}"
            class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-purple-600 to-blue-600 p-6 shadow-lg ">
            <!-- Decorative Shapes -->
            <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full bg-white/10 blur-xl"></div>
            <div class="absolute -bottom-8 -left-8 h-32 w-32 rounded-full bg-white/10 blur-xl"></div>
            <div class="absolute right-4 top-4 h-16 w-16 rounded-full border-2 border-white/20"></div>
            <div class="absolute bottom-4 right-12 h-8 w-8 rounded-full bg-white/20"></div>

            <div class="relative z-10">
                <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-white/20 backdrop-blur-sm">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                </div>
                <p class="text-sm font-medium text-white/80">{{ $title }}</p>
                <p class="mt-1 text-2xl font-bold text-white">{{ $number }}</p>
                <p class="mt-2 text-xs text-white/70">{{ $subtitle }}</p>
            </div>
        </a>
