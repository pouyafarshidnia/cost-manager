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

        <div :class="'rotate-180': open">
            <x-icons.chevron-down class="hidden md:block transition-transform" />
        </div>

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
            <x-icons.user class="text-gray-500 dark:text-gray-400 transition-colors duration-200" />
            Profile
        </a>

        <!-- Theme Switcher --->
        <div x-data="themeSwitcher">
            <button x-on:click="change"
                class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">

                <x-icons.moon x-cloak x-show="!dark" class="text-gray-500 dark:text-gray-400" />

                <x-icons.sun x-cloak x-show="dark" class="text-gray-500 dark:text-gray-400" />

                <span x-text="dark ? 'Light Mode' : 'Dark Mode'"></span>

            </button>
        </div>

        <!-- Logout --->
        <div class="border-t border-gray-100 dark:border-gray-700 mt-2 pt-2 transition-colors duration-200">
            <a href="{{ route('logout') }}"
                class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors">
                <x-icons.logout class="text-red-500" />
                Log Out
            </a>
        </div>
    </div>
</div>
