   @props(['route' => '', 'title' => '', 'number' => '', 'subtitle' => ''])

   <a href="{{ $route }}"
       class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-orange-500 to-red-500 p-6 shadow-lg ">
       <!-- Decorative Shapes -->
       <div class="absolute -right-6 -bottom-6 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>
       <div class="absolute right-8 top-4 h-20 w-20 rotate-45 rounded-lg bg-white/10"></div>
       <div class="absolute left-4 top-8 h-8 w-8 rotate-12 rounded-lg bg-white/20"></div>
       <div class="absolute left-1/2 top-1/2 h-4 w-4 -translate-x-1/2 -translate-y-1/2 rounded-full bg-white/30">
       </div>

       <div class="relative z-10">
           <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-white/20 backdrop-blur-sm">
               <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                       d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                   </path>
               </svg>
           </div>
           <p class="text-sm font-medium text-white/80">{{ $title }}</p>
           <p class="mt-1 text-2xl font-bold text-white">{{ $number }}</p>
           <p class="mt-2 text-xs text-white/70">{{ $subtitle }}</p>
       </div>
   </a>
