<nav
    class="sticky top-0 z-50 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm transition-colors duration-200">
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">


            <!-- Mobile Menu Button --->
            <button @click="sidebarOpen = !sidebarOpen"
                class="lg:hidden p-2 -ml-2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl transition-colors duration-200"
                aria-label="Toggle menu">
                <x-icons.menu x-show="!sidebarOpen" class="w-6 h-6" />
                <x-icons.close x-show="sidebarOpen" class="w-6 h-6" />
            </button>

            <!-- Left Side --->
            <div class="flex items-center gap-4 flex-1">

                <!-- Logo --->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center">
                        <x-icons.chart class="w-5 h-5 text-white" />
                    </div>
                    <span
                        class="text-xl font-bold text-gray-900 dark:text-gray-100 hidden sm:block transition-colors duration-200">CostManager</span>
                </div>

                <!-- Search --->
                <div class="relative max-w-md w-full ml-4">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <x-icons.search class="w-5 h-5 text-gray-400" />
                    </div>
                    <input type="text" placeholder="Search customers, invoices, or reports..."
                        class="w-full pl-10 pr-4 py-2 bg-gray-100 dark:bg-gray-700 border-0 rounded-xl text-sm text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white dark:focus:bg-gray-600 transition-all duration-200">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <kbd
                            class="hidden sm:inline-flex items-center px-2 py-1 text-xs font-medium text-gray-500 dark:text-gray-400 bg-gray-200 dark:bg-gray-600 rounded transition-colors duration-200">⌘K</kbd>
                    </div>
                </div>
            </div>


            <!-- Right Side --->
            <div class="flex items-center gap-2 sm:gap-4 ml-4">

                <x-nav.notifications></x-nav.notifications>

                <x-nav.messages></x-nav.messages>


                <x-nav.profile :currentUser="$currentUser"></x-nav.profile>

            </div>

        </div>
    </div>
</nav>
