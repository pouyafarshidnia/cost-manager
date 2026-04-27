 <!-- Notifications --->
 <div class="relative" x-data="{ open: false }" @click.outside="open = false">

     <!-- Button --->
     <button x-on:click="open = !open"
         class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition-colors duration-200 relative">
         <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                 d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
             </path>
         </svg>
         <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
     </button>


     <!-- Dropdown --->
     <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="absolute -right-32 sm:right-0 top-14 w-[calc(100vw-1rem)] sm:w-96 max-w-sm bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 py-2 z-50 mx-2 sm:mx-0 transition-colors duration-200">
         <div
             class="px-4 py-3 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between transition-colors duration-200">
             <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                 Notifications</p>
             <button class="text-xs text-indigo-600 hover:text-indigo-700 font-medium">Mark all
                 read</button>
         </div>

         <div class="max-h-96 overflow-y-auto">
             <div
                 class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors border-b border-gray-50 dark:border-gray-700/50 duration-200">
                 <div class="shrink-0 w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                     <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                         </path>
                     </svg>
                 </div>
                 <div class="flex-1 min-w-0">
                     <p class="text-sm font-medium text-gray-900 dark:text-gray-100 transition-colors duration-200">
                         Payment Failed</p>
                     <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 transition-colors duration-200">
                         Invoice #INV-2024-001 payment was declined
                     </p>
                     <p class="text-xs text-gray-400 dark:text-gray-500 mt-1 transition-colors duration-200">
                         2 minutes ago</p>
                 </div>
             </div>

             <div
                 class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors border-b border-gray-50 dark:border-gray-700/50 duration-200">
                 <div class="shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                     <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                     </svg>
                 </div>
                 <div class="flex-1 min-w-0">
                     <p class="text-sm font-medium text-gray-900 dark:text-gray-100 transition-colors duration-200">
                         Project Completed</p>
                     <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 transition-colors duration-200">
                         Website redesign project marked as complete
                     </p>
                     <p class="text-xs text-gray-400 dark:text-gray-500 mt-1 transition-colors duration-200">
                         1 hour ago</p>
                 </div>
             </div>

             <div
                 class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors border-b border-gray-50 dark:border-gray-700/50 duration-200">
                 <div class="shrink-0 w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center">
                     <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                     </svg>
                 </div>
                 <div class="flex-1 min-w-0">
                     <p class="text-sm font-medium text-gray-900 dark:text-gray-100 transition-colors duration-200">
                         Deadline Approaching</p>
                     <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 transition-colors duration-200">
                         Q1 Financial report due in 2 days</p>
                     <p class="text-xs text-gray-400 dark:text-gray-500 mt-1 transition-colors duration-200">
                         3 hours ago</p>
                 </div>
             </div>

             <div
                 class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors border-b border-gray-50 dark:border-gray-700/50 duration-200">
                 <div class="shrink-0 w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                     <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                         </path>
                     </svg>
                 </div>
                 <div class="flex-1 min-w-0">
                     <p class="text-sm font-medium text-gray-900 dark:text-gray-100 transition-colors duration-200">
                         Connection Error</p>
                     <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 transition-colors duration-200">
                         API integration with Stripe failed</p>
                     <p class="text-xs text-gray-400 dark:text-gray-500 mt-1 transition-colors duration-200">
                         5 hours ago</p>
                 </div>
             </div>

             <div
                 class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                 <div class="shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                     <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                         </path>
                     </svg>
                 </div>
                 <div class="flex-1 min-w-0">
                     <p class="text-sm font-medium text-gray-900 dark:text-gray-100 transition-colors duration-200">
                         Payment Received</p>
                     <p class="text-xs text-gray-500 dark:text-gray-400 mt-0.5 transition-colors duration-200">
                         $2,450.00 received from Acme Corp</p>
                     <p class="text-xs text-gray-400 dark:text-gray-500 mt-1 transition-colors duration-200">
                         Yesterday</p>
                 </div>
             </div>
         </div>

         <div class="border-t border-gray-100 mt-2 pt-2 px-4 py-2">
             <a href="#" class="block text-center text-sm text-indigo-600 hover:text-indigo-700 font-medium">View
                 all notifications</a>
         </div>
     </div>
 </div>
