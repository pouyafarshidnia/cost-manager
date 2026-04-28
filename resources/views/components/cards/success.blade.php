     @props(['route' => '', 'title' => '', 'number' => '', 'subtitle' => ''])

     <a href="{{ $route }}"
         class="group relative overflow-hidden rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 p-6 shadow-lg">
         <!-- Decorative Shapes -->
         <div class="absolute -right-4 top-1/2 h-40 w-40 -translate-y-1/2 rounded-full border-2 border-white/20">
         </div>
         <div class="absolute -right-2 top-1/2 h-32 w-32 -translate-y-1/2 rounded-full border border-white/10">
         </div>
         <div class="absolute left-4 bottom-4 h-6 w-6 rounded-full bg-white/30"></div>
         <div class="absolute left-12 top-4 h-4 w-4 rounded-full bg-white/20"></div>

         <div class="relative z-10">
             <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-xl bg-white/20 backdrop-blur-sm">
                 <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M7 11l5-5m0 0l5 5m-5-5v12">
                     </path>
                 </svg>
             </div>
             <p class="text-sm font-medium text-white/80">{{ $title }}</p>
             <p class="mt-1 text-2xl font-bold text-white">{{ $number }}</p>
             <p class="mt-2 text-xs text-white/70">{{ $subtitle }}</p>
         </div>
     </a>
