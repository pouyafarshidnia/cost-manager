 <!-- Notifications --->
 <div class="relative" x-data="{ open: false }" @click.outside="open = false">

     <!-- Button --->
     <button x-on:click="open = !open"
         class="p-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition-colors duration-200 relative">
         <x-icons.bell />
         <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
     </button>


     <!-- Dropdown --->
     <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
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
                     <x-icons.alert-triangle class="text-red-600" />
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
                     <x-icons.check-circle class="text-green-600" />
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
                     <x-icons.clock class="text-yellow-600" />
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
                     <x-icons.ban class="text-red-600" />
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
                     <x-icons.dollar class="text-green-600" />
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
