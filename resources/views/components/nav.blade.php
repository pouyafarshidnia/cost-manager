<nav class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">


            <!-- Left Side --->
            <div class="flex items-center gap-4 flex-1">

                <!-- Logo --->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                            </path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-900 hidden sm:block">CostManager</span>
                </div>

                <!-- Search --->
                <div class="relative max-w-md w-full ml-4">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" placeholder="Search customers, invoices, or reports..."
                        class="w-full pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-xl text-sm text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <kbd
                            class="hidden sm:inline-flex items-center px-2 py-1 text-xs font-medium text-gray-500 bg-gray-200 rounded">⌘K</kbd>
                    </div>
                </div>
            </div>


            <!-- Right Side --->
            <div class="flex items-center gap-2 sm:gap-4 ml-4">

                <!-- Notifications --->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open"
                        class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-xl transition-colors relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute -right-32 sm:right-0 top-14 w-[calc(100vw-1rem)] sm:w-96 max-w-sm bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50 mx-2 sm:mx-0">
                        <div class="px-4 py-3 border-b border-gray-100 flex items-center justify-between">
                            <p class="text-sm font-semibold text-gray-900">Notifications</p>
                            <button class="text-xs text-indigo-600 hover:text-indigo-700 font-medium">Mark all
                                read</button>
                        </div>

                        <div class="max-h-96 overflow-y-auto">
                            <div
                                class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                <div class="shrink-0 w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Payment Failed</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Invoice #INV-2024-001 payment was declined
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                                </div>
                            </div>

                            <div
                                class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                <div
                                    class="shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Project Completed</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Website redesign project marked as complete
                                    </p>
                                    <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                                </div>
                            </div>

                            <div
                                class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                <div
                                    class="shrink-0 w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-yellow-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Deadline Approaching</p>
                                    <p class="text-xs text-gray-500 mt-0.5">Q1 Financial report due in 2 days</p>
                                    <p class="text-xs text-gray-400 mt-1">3 hours ago</p>
                                </div>
                            </div>

                            <div
                                class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                <div class="shrink-0 w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Connection Error</p>
                                    <p class="text-xs text-gray-500 mt-0.5">API integration with Stripe failed</p>
                                    <p class="text-xs text-gray-400 mt-1">5 hours ago</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors">
                                <div
                                    class="shrink-0 w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">Payment Received</p>
                                    <p class="text-xs text-gray-500 mt-0.5">$2,450.00 received from Acme Corp</p>
                                    <p class="text-xs text-gray-400 mt-1">Yesterday</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 mt-2 pt-2 px-4 py-2">
                            <a href="#"
                                class="block text-center text-sm text-indigo-600 hover:text-indigo-700 font-medium">View
                                all notifications</a>
                        </div>
                    </div>
                </div>

                <!-- Messages --->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open"
                        class="p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-xl transition-colors relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-green-500 rounded-full"></span>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute -right-20 sm:right-0 top-14 w-[calc(100vw-1rem)] sm:w-96 max-w-sm bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50 mx-2 sm:mx-0">
                        <div class="px-4 py-3 border-b border-gray-100 flex items-center justify-between">
                            <p class="text-sm font-semibold text-gray-900">Messages</p>
                            <button class="text-xs text-indigo-600 hover:text-indigo-700 font-medium">Mark all
                                read</button>
                        </div>

                        <div class="max-h-96 overflow-y-auto">
                            <div
                                class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                <img src="https://ui-avatars.com/api/?name=Sarah+Chen&background=f59e0b&color=fff&size=32"
                                    alt="Sarah Chen" class="shrink-0 w-10 h-10 rounded-full">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-gray-900">Sarah Chen</p>
                                        <p class="text-xs text-gray-400">2 min ago</p>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">Hey, can we reschedule the meeting to 3
                                        PM?</p>
                                </div>
                            </div>

                            <div
                                class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                <img src="https://ui-avatars.com/api/?name=Mike+Johnson&background=10b981&color=fff&size=32"
                                    alt="Mike Johnson" class="shrink-0 w-10 h-10 rounded-full">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-gray-900">Mike Johnson</p>
                                        <p class="text-xs text-gray-400">15 min ago</p>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">The Q1 budget report is ready for review
                                    </p>
                                </div>
                            </div>

                            <div
                                class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                <img src="https://ui-avatars.com/api/?name=Emily+Davis&background=6366f1&color=fff&size=32"
                                    alt="Emily Davis" class="shrink-0 w-10 h-10 rounded-full">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-gray-900">Emily Davis</p>
                                        <p class="text-xs text-gray-400">1 hour ago</p>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">Thanks for the quick turnaround on the
                                        invoice!</p>
                                </div>
                            </div>

                            <div
                                class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors border-b border-gray-50">
                                <img src="https://ui-avatars.com/api/?name=David+Kim&background=ec4899&color=fff&size=32"
                                    alt="David Kim" class="shrink-0 w-10 h-10 rounded-full">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-gray-900">David Kim</p>
                                        <p class="text-xs text-gray-400">3 hours ago</p>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">Can you share the updated contract
                                        template?</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 px-4 py-3 hover:bg-gray-50 transition-colors">
                                <img src="https://ui-avatars.com/api/?name=Anna+Smith&background=8b5cf6&color=fff&size=32"
                                    alt="Anna Smith" class="shrink-0 w-10 h-10 rounded-full">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm font-semibold text-gray-900">Anna Smith</p>
                                        <p class="text-xs text-gray-400">Yesterday</p>
                                    </div>
                                    <p class="text-sm text-gray-600 truncate">Great job on the presentation yesterday!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 mt-2 pt-2 px-4 py-2">
                            <a href="#"
                                class="block text-center text-sm text-indigo-600 hover:text-indigo-700 font-medium">View
                                all messages</a>
                        </div>
                    </div>
                </div>


                <!-- Profile --->
                <div class="flex items-center gap-3 pl-2 border-l border-gray-200" x-data="{ open: false, darkMode: localStorage.getItem('theme') === 'dark' }"
                    @click.outside="open = false">
                    <button @click="open = !open"
                        class="flex items-center gap-2 hover:bg-gray-100 rounded-xl p-1.5 transition-colors">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=6366f1&color=fff&size=32"
                            alt="User" class="w-8 h-8 rounded-lg">
                        <div class="hidden md:block text-left">
                            <p class="text-sm font-medium text-gray-900">Admin User</p>
                            <p class="text-xs text-gray-500">admin@costmanager.com</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-400 hidden md:block transition-transform"
                            :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="transform opacity-0 scale-95"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-95"
                        class="absolute right-4 top-14 w-56 bg-white rounded-2xl shadow-xl border border-gray-100 py-2 z-50">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <p class="text-sm font-medium text-gray-900">Admin User</p>
                            <p class="text-xs text-gray-500">admin@costmanager.com</p>
                        </div>

                        <a href="#"
                            class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Profile
                        </a>

                        <button
                            @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light'); document.documentElement.classList.toggle('dark', darkMode)"
                            class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                            <svg x-show="!darkMode" class="w-4 h-4 text-gray-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                                </path>
                            </svg>
                            <svg x-show="darkMode" class="w-4 h-4 text-gray-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                            <span x-text="darkMode ? 'Light Mode' : 'Dark Mode'"></span>
                        </button>

                        <div class="border-t border-gray-100 mt-2 pt-2">
                            <a href="#"
                                class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</nav>
