<div class="flex items-center gap-3 pl-2 border-l border-gray-200 dark:border-gray-700 transition-colors duration-200"
    x-data="{ open: false, darkMode: localStorage.getItem('theme') === 'dark' }" @click.outside="open = false">

    <!-- Button --->
    <button x-on:click="open = !open"
        class="flex items-center gap-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-xl p-1.5 transition-colors duration-200">
        <img src="{{ $currentUser->picture }}" alt="{{ $currentUser->name }}" class="w-8 h-8 rounded-lg">
        <div class="hidden md:block text-left">
            <p class="text-sm font-medium text-gray-900 dark:text-gray-50">{{ $currentUser->name }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-200">
                {{ $currentUser->email }}</p>
        </div>
        <svg class="w-4 h-4 text-gray-400 hidden md:block transition-transform" :class="{ 'rotate-180': open }"
            fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
            </path>
        </svg>
    </button>


    <!-- Dropdown --->
    <div x-cloak x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-4 top-14 w-56 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 py-2 z-50 transition-colors duration-200">
        <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700 transition-colors duration-200">
            <p class="text-sm font-medium text-gray-900 dark:text-gray-100 transition-colors duration-200">
                {{ $currentUser->name }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-400 transition-colors duration-200">
                {{ $currentUser->email }}m</p>
        </div>

        <!-- Link to Profile --->
        <a href="#"
            class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 transition-colors duration-200" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            Profile
        </a>

        <!-- Theme Switcher --->
        <div x-data="themeSwitcher">
            <button x-on:click="change"
                class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">

                <svg x-cloak x-show="!dark" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z">
                    </path>
                </svg>

                <svg x-cloak x-show="dark" class="w-4 h-4 text-gray-500 dark:text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>

                <span x-text="dark ? 'Light Mode' : 'Dark Mode'"></span>

            </button>
        </div>

        <!-- Logout --->
        <div class="border-t border-gray-100 dark:border-gray-700 mt-2 pt-2 transition-colors duration-200">
            <a href="{{ route('logout') }}"
                class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                Log Out
            </a>
        </div>
    </div>
</div>
