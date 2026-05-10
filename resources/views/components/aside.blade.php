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


            <div
                :class="routeName === 'home' ? 'text-indigo-700 dark:text-indigo-400' :
                    'hover:bg-gray-50 dark:hover:bg-gray-700/50'">
                <x-icons.home />
            </div>

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

            <div
                :class="routeName === 'categories.index' ? 'text-indigo-700 dark:text-indigo-400' :
                    'hover:bg-gray-50 dark:hover:bg-gray-700/50'">
                <x-icons.category />
            </div>

            <span
                :class="routeName === 'categories.index' ? 'text-indigo-700 dark:text-indigo-400' :
                    'hover:bg-gray-50 dark:hover:bg-gray-700/50'">
                Categories</span>

        </a>


        <!-- Costs --->
        <a href="{{ route('costs.index') }}"
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors duration-200"
            :class="routeName === 'costs.index' ?
                'bg-indigo-50 dark:bg-indigo-900/30 text-indigo-700 dark:text-indigo-400' :
                ' hover:bg-gray-50 dark:hover:bg-gray-700/50'">

            <div
                :class="routeName === 'costs.index' ? 'text-indigo-700 dark:text-indigo-400' :
                    'hover:bg-gray-50 dark:hover:bg-gray-700/50'">
                <x-icons.cost />
            </div>

            <span
                :class="routeName === 'costs.index' ? 'text-indigo-700 dark:text-indigo-400' :
                    'hover:bg-gray-50 dark:hover:bg-gray-700/50'">
                Costs</span>
        </a>


        <!-- Sample menu --->
        <div x-data="{ open: routeName === 'analytics.index' }">
            <button x-on:click="open = !open"
                class="w-full flex items-center justify-between px-3 py-2.5 rounded-xl text-sm font-medium  transition-colors duration-200">
                <div class="flex items-center gap-3">
                    <x-icons.chart />
                    Analytics
                </div>

                <div :class="{ 'rotate-180': open }">
                    <x-icons.chevron-down class="w-4 h-4 text-gray-400 dark:text-gray-500 transition-transform" />
                </div>

            </button>
            <div x-cloak x-show="open" x-collapse
                class="mt-1 ml-4 pl-4 border-l border-gray-200 dark:border-gray-700 space-y-1 transition-colors duration-200">
                <a href="{{ route('analytics.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors duration-200"
                    :class="routeName === 'analytics.index' ? 'text-indigo-700 dark:text-indigo-400' :
                        'hover:bg-gray-50 dark:hover:bg-gray-700/50'">
                    Overview
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors duration-200">
                    Reports
                </a>
                <a href="#"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm  font-medium transition-colors duration-200">
                    Statistics
                </a>
            </div>
        </div>

    </nav>
</aside>
