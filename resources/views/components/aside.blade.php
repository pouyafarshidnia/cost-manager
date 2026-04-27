<!-- Mobile Overlay Backdrop -->
<div x-cloak x-show="sidebarOpen" x-on:click="sidebarOpen = false"
    x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-40 lg:hidden" aria-hidden="true">
</div>

<aside x-data="{ routeName: '{{ request()->route()->getName() }}' }" :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 h-[calc(100vh-4rem)] fixed top-16 left-0 overflow-y-auto z-50 transition-all duration-300 ease-in-out transform lg:transform-none">
    <nav class="p-4 space-y-1">


        <!-- Dashboard (Home) --->
        <a href="{{ route('home') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors duration-200"
            :class="routeName === 'home' ? 'bg-indigo-50 dark:bg-indigo-900/30 ' : ''">
            <svg :class="routeName === 'home' ? 'text-indigo-700 dark:text-indigo-400' :
                'hover:bg-gray-50 dark:hover:bg-gray-700/50'"
                class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span
                :class="routeName === 'home' ? 'text-indigo-700 dark:text-indigo-400' :
                    'hover:bg-gray-50 dark:hover:bg-gray-700/50'">
                Dashboard</span>

        </a>


        <!-- Categories --->
        <a href="{{ route('categories.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors duration-200"
            :class="routeName === 'categories.index' ?
                'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400' :
                ' hover:bg-gray-50 dark:hover:bg-gray-700/50'">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                class="icon icon-tabler icons-tabler-outline icon-tabler-category w-5 h-5 text-gray-700 dark:text-gray-300">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 4h6v6h-6l0 -6" />
                <path d="M14 4h6v6h-6l0 -6" />
                <path d="M4 14h6v6h-6l0 -6" />
                <path d="M14 17a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
            </svg>
            <span class="text-gray-700 dark:text-gray-300"> Categories</span>

        </a>


        <!-- Sample menu --->
        <div x-data="{ open: false }">
            <button x-on:click="open = !open"
                class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                    Analytics
                </div>
                <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 transition-transform"
                    :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-cloak x-show="open" x-collapse
                class="mt-1 ml-4 pl-4 border-l border-gray-200 dark:border-gray-700 space-y-1 transition-colors duration-200">
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-gray-900 dark:hover:text-gray-200 transition-colors duration-200">
                    Overview
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-gray-900 dark:hover:text-gray-200 transition-colors duration-200">
                    Reports
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/30 font-medium transition-colors duration-200">
                    Statistics
                </a>
            </div>
        </div>

        {{-- <a href="#"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg>
            Customers
        </a>

        <div x-data="{ open: true }">
            <button @click="open = !open"
                class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Invoices
                </div>
                <svg class="w-4 h-4 text-gray-400 dark:text-gray-500 transition-transform" :class="{ 'rotate-180': open }" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div x-show="open" x-collapse class="mt-1 ml-4 pl-4 border-l border-gray-200 dark:border-gray-700 space-y-1 transition-colors duration-200">
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-gray-900 dark:hover:text-gray-200 transition-colors duration-200">
                    All Invoices
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-gray-900 dark:hover:text-gray-200 transition-colors duration-200">
                    Pending
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-gray-600 dark:text-gray-400 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-gray-900 dark:hover:text-gray-200 transition-colors duration-200">
                    Paid
                </a>
            </div>
        </div>

        <a href="#"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            Payments
        </a>

        <div class="pt-4 mt-4 border-t border-gray-200 dark:border-gray-700 transition-colors duration-200">
            <p class="px-3 text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase tracking-wider mb-2 transition-colors duration-200">Settings</p>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Settings
            </a>

            <a href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                Help & Support
            </a>
        </div> --}}
    </nav>
</aside>
