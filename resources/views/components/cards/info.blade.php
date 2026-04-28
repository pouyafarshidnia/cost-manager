    @props(['route' => '', 'title' => '', 'number' => '', 'subtitle' => ''])

    <a href="{{ $route }}"
        class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-500 p-6 shadow-lg ">
        <!-- Decorative Shapes -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute left-4 top-4 h-2 w-2 rounded-full bg-white"></div>
            <div class="absolute left-10 top-12 h-1.5 w-1.5 rounded-full bg-white"></div>
            <div class="absolute left-6 top-20 h-2 w-2 rounded-full bg-white"></div>
            <div class="absolute right-12 top-6 h-1.5 w-1.5 rounded-full bg-white"></div>
            <div class="absolute right-6 top-16 h-2 w-2 rounded-full bg-white"></div>
            <div class="absolute right-20 bottom-8 h-1.5 w-1.5 rounded-full bg-white"></div>
            <div class="absolute left-16 bottom-12 h-2 w-2 rounded-full bg-white"></div>
        </div>
        <div class="absolute -bottom-10 -right-10 h-40 w-40 rounded-full border-4 border-white/10"></div>

        <div class="relative z-10">
            <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-white/20 backdrop-blur-sm">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>
            </div>
            <p class="text-sm font-medium text-white/80">{{ $title }}</p>
            <p class="mt-1 text-2xl font-bold text-white">{{ $number }}</p>
            <p class="mt-2 text-xs text-white/70">{{ $subtitle }}</p>
        </div>
    </a>
