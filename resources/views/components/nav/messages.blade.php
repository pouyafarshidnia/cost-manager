   <!-- Messages --->
   <div class="relative" x-data="{ open: false }" @click.outside="open = false">

       <!-- Button --->
       <button x-on:click="open = !open"
           class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition-colors duration-200 relative">
           <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                   d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
               </path>
           </svg>
           <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-green-500 rounded-full"></span>
       </button>

       <!-- Dropdown --->
       <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-200"
           x-transition:enter-start="transform opacity-0 scale-95"
           x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
           x-transition:leave-start="transform opacity-100 scale-100"
           x-transition:leave-end="transform opacity-0 scale-95"
           class="absolute -right-20 sm:right-0 top-14 w-[calc(100vw-1rem)] sm:w-96 max-w-sm bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 py-2 z-50 mx-2 sm:mx-0 transition-colors duration-200">
           <div
               class="px-4 py-3 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between transition-colors duration-200">
               <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                   Messages</p>
               <button class="text-xs text-indigo-600 hover:text-indigo-700 font-medium">Mark all
                   read</button>
           </div>

           <div class="max-h-96 overflow-y-auto">
               <div
                   class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors border-b border-gray-50 dark:border-gray-700/50 duration-200">
                   <img src="https://ui-avatars.com/api/?name=Sarah+Chen&background=f59e0b&color=fff&size=32"
                       alt="Sarah Chen" class="shrink-0 w-10 h-10 rounded-full">
                   <div class="flex-1 min-w-0">
                       <div class="flex items-center justify-between">
                           <p
                               class="text-sm font-semibold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                               Sarah Chen</p>
                           <p class="text-xs text-gray-400 dark:text-gray-500 transition-colors duration-200">
                               2 min ago</p>
                       </div>
                       <p class="text-sm text-gray-600 dark:text-gray-300 truncate transition-colors duration-200">
                           Hey, can we reschedule the meeting to 3
                           PM?</p>
                   </div>
               </div>

               <div
                   class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors border-b border-gray-50 dark:border-gray-700/50 duration-200">
                   <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=10b981&color=fff&size=32"
                       alt="Mike Johnson" class="shrink-0 w-10 h-10 rounded-full">
                   <div class="flex-1 min-w-0">
                       <div class="flex items-center justify-between">
                           <p
                               class="text-sm font-semibold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                               Mike Johnson</p>
                           <p class="text-xs text-gray-400 dark:text-gray-500 transition-colors duration-200">
                               15 min ago</p>
                       </div>
                       <p class="text-sm text-gray-600 dark:text-gray-300 truncate transition-colors duration-200">
                           The Q1 budget report is ready for review
                       </p>
                   </div>
               </div>

               <div
                   class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors border-b border-gray-50 dark:border-gray-700/50 duration-200">
                   <img src="https://ui-avatars.com/api/?name=Emily+Davis&background=6366f1&color=fff&size=32"
                       alt="Emily Davis" class="shrink-0 w-10 h-10 rounded-full">
                   <div class="flex-1 min-w-0">
                       <div class="flex items-center justify-between">
                           <p
                               class="text-sm font-semibold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                               Emily Davis</p>
                           <p class="text-xs text-gray-400 dark:text-gray-500 transition-colors duration-200">
                               1 hour ago</p>
                       </div>
                       <p class="text-sm text-gray-600 dark:text-gray-300 truncate transition-colors duration-200">
                           Thanks for the quick turnaround on the
                           invoice!</p>
                   </div>
               </div>

               <div
                   class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors border-b border-gray-50 dark:border-gray-700/50 duration-200">
                   <img src="https://ui-avatars.com/api/?name=David+Kim&background=ec4899&color=fff&size=32"
                       alt="David Kim" class="shrink-0 w-10 h-10 rounded-full">
                   <div class="flex-1 min-w-0">
                       <div class="flex items-center justify-between">
                           <p
                               class="text-sm font-semibold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                               David Kim</p>
                           <p class="text-xs text-gray-400 dark:text-gray-500 transition-colors duration-200">
                               3 hours ago</p>
                       </div>
                       <p class="text-sm text-gray-600 dark:text-gray-300 truncate transition-colors duration-200">
                           Can you share the updated contract
                           template?</p>
                   </div>
               </div>

               <div
                   class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                   <img src="https://ui-avatars.com/api/?name=Anna+Smith&background=8b5cf6&color=fff&size=32"
                       alt="Anna Smith" class="shrink-0 w-10 h-10 rounded-full">
                   <div class="flex-1 min-w-0">
                       <div class="flex items-center justify-between">
                           <p
                               class="text-sm font-semibold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                               Anna Smith</p>
                           <p class="text-xs text-gray-400 dark:text-gray-500 transition-colors duration-200">
                               Yesterday</p>
                       </div>
                       <p class="text-sm text-gray-600 dark:text-gray-300 truncate transition-colors duration-200">
                           Great job on the presentation yesterday!
                       </p>
                   </div>
               </div>
           </div>

           <div
               class="border-t border-gray-100 dark:border-gray-700 mt-2 pt-2 px-4 py-2 transition-colors duration-200">
               <a href="#"
                   class="block text-center text-sm text-indigo-600 hover:text-indigo-700 font-medium">View
                   all messages</a>
           </div>
       </div>
   </div>
