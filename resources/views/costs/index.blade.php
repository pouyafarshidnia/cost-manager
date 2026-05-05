@extends('layouts.app')
@section('content')
    <div x-data="{
        createOpen: false,
        filterOpen: false,
        editOpen: false,
        deleteOpen: false,
        selectedCost: null,
        openEdit(cost) {
            this.selectedCost = cost;
            this.editOpen = true;
        },
        openDelete(cost) {
            this.selectedCost = cost;
            this.deleteOpen = true;
        }
    }">

        <x-flash></x-flash>

        <!-- Main Content -->
        <div class="lg:ml-64 min-h-[calc(100vh-4rem)] bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
            <div class="p-4 sm:p-6 lg:p-8">

                <!-- Header Section -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                            Costs
                        </h1>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 transition-colors duration-200">
                            Manage your expenses and track spending
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-3">

                        <!-- Filter Button -->
                        <button x-on:click="filterOpen = true"
                            class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                            <x-icons.filter />
                            Filter
                        </button>

                        <!-- Create Button -->
                        <button x-on:click="createOpen = true"
                            class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-purple-600 rounded-xl hover:bg-purple-700 transition-colors duration-200">
                            <x-icons.plus />
                            New Cost
                        </button>



                    </div>
                </div>

                <!-- Search Bar & Page Size -->
                <div class="mb-6">
                    <form method="get" class="flex flex-wrap items-center gap-3">


                        <!-- Search Input -->
                        <div class="relative max-w-md flex-1 min-w-[200px]">
                            <button type='submit'
                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <x-icons.search class="w-5 h-5 text-gray-400" />
                            </button>
                            <input type="text" name='s' placeholder="Search costs..."
                                value="{{ request()->get('s') ?? '' }}"
                                class="w-full pl-10 pr-4 py-2.5 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl text-sm text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                        </div>

                        <!-- Per Page Dropdown -->
                        <select name="perPage" x-on:change="$el.form.submit()"
                            class="px-3 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 transition-colors duration-200 cursor-pointer">
                            <option value="10" {{ request()->get('perPage') == 10 ? 'selected' : '' }}>10 per page
                            </option>
                            <option value="25" {{ request()->get('perPage') == 25 ? 'selected' : '' }}>25 per page
                            </option>
                            <option value="50" {{ request()->get('perPage') == 50 ? 'selected' : '' }}>50 per page
                            </option>
                            <option value="100" {{ request()->get('perPage') == 100 ? 'selected' : '' }}>100 per page
                            </option>
                        </select>
                    </form>
                </div>

                <!-- Table -->
                @if (!$costs->isEmpty())
                    <div
                        class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden transition-colors duration-200">
                        <div class="overflow-x-auto">
                            <table class="w-full">

                                <thead class="bg-gray-50 dark:bg-gray-700/50 transition-colors duration-200">

                                    <tr>

                                        <th class="px-6 py-4 text-left text-purple-400">
                                            #
                                        </th>

                                        <th class="px-6 py-4 text-left">
                                            <button
                                                class="flex items-center gap-1 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                                                Title
                                                <x-icons.arrow-up class="text-gray-400" />
                                            </button>
                                        </th>

                                        <th class="px-6 py-4 text-left">
                                            <button
                                                class="flex items-center gap-1 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                                                Category
                                                <x-icons.chevron-down class="text-gray-400" />
                                            </button>
                                        </th>

                                        <th class="px-6 py-4 text-left">
                                            <button
                                                class="flex items-center gap-1 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                                                Price
                                                <x-icons.arrows-up-down class="text-gray-400" />
                                            </button>
                                        </th>

                                        <th class="px-6 py-4 text-left">
                                            <button
                                                class="flex items-center gap-1 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider hover:text-gray-700 dark:hover:text-gray-200 transition-colors duration-200">
                                                Spent At
                                                <x-icons.calendar class="text-gray-400" />
                                            </button>
                                        </th>

                                        <th
                                            class="px-6 py-4 text-right text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider transition-colors duration-200">
                                            Actions
                                        </th>

                                    </tr>

                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700 transition-colors duration-200">

                                    @foreach ($costs as $cost)
                                        <tr
                                            class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">

                                            <td class="px-6 py-4 text-purple-400">
                                                {{ $loop->iteration }}
                                            </td>

                                            <td class="px-6 py-4">
                                                <div class="flex items-center gap-3">
                                                    <div
                                                        class="w-8 h-8 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                                                        <x-icons.receipt class="text-purple-600 dark:text-purple-400" />
                                                    </div>
                                                    <span
                                                        class="text-sm font-medium text-gray-900 dark:text-gray-100 transition-colors duration-200">
                                                        {{ $cost->title }}
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4">
                                                @if ($cost->category)
                                                    <span
                                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 transition-colors duration-200">
                                                        <x-icons.tag />
                                                        {{ $cost->category->title }}
                                                    </span>
                                                @else
                                                    <span class="text-sm text-gray-400 dark:text-gray-500">-</span>
                                                @endif
                                            </td>

                                            <td class="px-6 py-4">
                                                <span
                                                    class="text-sm font-semibold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                                                    ${{ number_format($cost->price, 2) }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4">
                                                <span
                                                    class="text-sm text-gray-600 dark:text-gray-300 transition-colors duration-200">
                                                    {{ $cost->spent_at ? \Carbon\Carbon::parse($cost->spent_at)->format('j F, Y') : '-' }}
                                                </span>
                                            </td>

                                            <td class="px-6 py-4 text-right">
                                                <div class="flex items-center justify-end gap-2">

                                                    <button type='button'
                                                        x-on:click="openEdit({{ json_encode(['id' => $cost->id, 'title' => $cost->title, 'price' => $cost->price, 'category_id' => $cost->category_id ?? null, 'spent_at' => $cost->spent_at->format('Y-m-d')]) }})"
                                                        class="p-2 text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 hover:bg-purple-50 dark:hover:bg-purple-900/20 rounded-lg transition-colors duration-200">
                                                        <x-icons.pencil />
                                                    </button>

                                                    <button type='button'
                                                        x-on:click="openDelete({{ json_encode(['id' => $cost->id, 'title' => $cost->title]) }})"
                                                        class="p-2 text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors duration-200">
                                                        <x-icons.trash />
                                                    </button>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        {{ $costs->links() }}

                    </div>
                @else
                    <div class='flex flex-col items-center justify-center py-24'>
                        <svg class='w-48' viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M18.04 13.55C17.62 13.96 17.38 14.55 17.44 15.18C17.53 16.26 18.52 17.05 19.6 17.05H21.5V18.24C21.5 20.31 19.81 22 17.74 22H6.26C4.19 22 2.5 20.31 2.5 18.24V11.51C2.5 9.44001 4.19 7.75 6.26 7.75H17.74C19.81 7.75 21.5 9.44001 21.5 11.51V12.95H19.48C18.92 12.95 18.41 13.17 18.04 13.55Z"
                                fill="#292D32" />
                            <path
                                d="M14.85 3.95012V7.75011H6.26C4.19 7.75011 2.5 9.44012 2.5 11.5101V7.84014C2.5 6.65014 3.23 5.59009 4.34 5.17009L12.28 2.17009C13.52 1.71009 14.85 2.62012 14.85 3.95012Z"
                                fill="#292D32" />
                            <path
                                d="M22.5608 13.9702V16.0302C22.5608 16.5802 22.1208 17.0302 21.5608 17.0502H19.6008C18.5208 17.0502 17.5308 16.2602 17.4408 15.1802C17.3808 14.5502 17.6208 13.9602 18.0408 13.5502C18.4108 13.1702 18.9208 12.9502 19.4808 12.9502H21.5608C22.1208 12.9702 22.5608 13.4202 22.5608 13.9702Z"
                                fill="#292D32" />
                            <path
                                d="M14 12.75H7C6.59 12.75 6.25 12.41 6.25 12C6.25 11.59 6.59 11.25 7 11.25H14C14.41 11.25 14.75 11.59 14.75 12C14.75 12.41 14.41 12.75 14 12.75Z"
                                fill="#292D32" />
                        </svg>
                        <p class="mt-4 text-lg font-medium text-gray-900 dark:text-gray-100">No costs found</p>
                    </div>
                @endif

            </div>
        </div>

        <!-- Create Cost Modal -->
        <div x-cloak x-show="createOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
            role="dialog" aria-modal="true">

            <!-- Backdrop -->
            <div x-show="createOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" x-on:click="createOpen = false"
                class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm">
            </div>

            <!-- Modal Panel -->
            <div class="flex min-h-full items-center justify-center p-4">

                <form action="{{ route('costs.store') }}" x-show="createOpen" method="post"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative w-full max-w-md transform overflow-hidden rounded-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-left shadow-xl transition-all">
                    @csrf

                    <!-- Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100" id="modal-title">Create New
                                Cost</h3>
                            <button type='button' x-on:click="createOpen = false"
                                class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                                <x-icons.close class="w-5 h-5" />
                            </button>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-4 space-y-4">
                        <div>
                            <label for="cost-title"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cost Title</label>
                            <input type="text" id='cost-title' name='title' placeholder="Enter cost title..."
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                        </div>

                        <div>
                            <label for="cost-price"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price</label>
                            <input type="number" step="0.01" id='cost-price' name='price' placeholder="0.00"
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                        </div>

                        <div>
                            <label for="cost-category"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
                            <select id='cost-category' name='category_id'
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="cost-spent-at"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Spent At</label>
                            <input type="date" id='cost-spent-at' name='spent_at'
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                        </div>
                    </div>

                    <!-- Footer -->
                    <div
                        class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-end gap-3">
                        <button type='button' x-on:click="createOpen = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                            Cancel
                        </button>
                        <button type='submit'
                            class="px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors duration-200">
                            Create Cost
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Cost Modal -->
        <div x-cloak x-show="editOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="edit-modal-title"
            role="dialog" aria-modal="true">

            <!-- Backdrop -->
            <div x-show="editOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" x-on:click="editOpen = false"
                class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm">
            </div>

            <!-- Modal Panel -->
            <div class="flex min-h-full items-center justify-center p-4">

                <form x-bind:action="'/costs/' + selectedCost?.id" x-show="editOpen" method="post"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative w-full max-w-md transform overflow-hidden rounded-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-left shadow-xl transition-all">
                    @csrf
                    @method('PUT')

                    <!-- Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100" id="edit-modal-title">
                                Edit Cost
                            </h3>
                            <button type='button' x-on:click="editOpen = false"
                                class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                                <x-icons.close class="w-5 h-5" />
                            </button>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-4 space-y-4">
                        <div>
                            <label for="edit-cost-title"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Cost Title</label>
                            <input type="text" id='edit-cost-title' name='title' x-bind:value="selectedCost?.title"
                                placeholder="Enter cost title..."
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                        </div>

                        <div>
                            <label for="edit-cost-price"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Price</label>
                            <input type="number" step="0.01" id='edit-cost-price' name='price'
                                x-bind:value="selectedCost?.price" placeholder="0.00"
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                        </div>

                        <div>
                            <label for="edit-cost-category"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Category</label>
                            <select id='edit-cost-category' name='category_id' x-bind:value="selectedCost?.category_id"
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="edit-cost-spent-at"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Spent At</label>
                            <input type="date" id='edit-cost-spent-at' name='spent_at'
                                x-bind:value="selectedCost?.spent_at"
                                class="w-full px-4 py-2.5 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-xl text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200">
                        </div>
                    </div>

                    <!-- Footer -->
                    <div
                        class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-end gap-3">
                        <button type='button' x-on:click="editOpen = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                            Cancel
                        </button>
                        <button type='submit'
                            class="px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors duration-200">
                            Update Cost
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Cost Modal -->
        <div x-cloak x-show="deleteOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="delete-modal-title"
            role="dialog" aria-modal="true">

            <!-- Backdrop -->
            <div x-show="deleteOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" x-on:click="deleteOpen = false"
                class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm">
            </div>

            <!-- Modal Panel -->
            <div class="flex min-h-full items-center justify-center p-4">

                <div x-show="deleteOpen" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative w-full max-w-md transform overflow-hidden rounded-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-left shadow-xl transition-all">

                    <div class="px-6 py-6">
                        <div class="flex flex-col items-center text-center">
                            <!-- Danger Icon -->
                            <div
                                class="w-16 h-16 mb-4 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                                <x-icons.alert-triangle class="w-8 h-8 text-red-600 dark:text-red-400" />
                            </div>

                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2"
                                id="delete-modal-title">
                                Delete Cost
                            </h3>

                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">
                                You are going to delete <span x-text="selectedCost?.title"
                                    class="font-medium text-gray-900 dark:text-gray-100"></span> cost.<br>
                                This will be permanent.
                            </p>

                            <form x-bind:action="'/costs/' + selectedCost?.id" method="post"
                                class="flex items-center gap-3 w-full justify-center">
                                @csrf
                                @method('DELETE')

                                <button type='button' x-on:click="deleteOpen = false"
                                    class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                                    Cancel
                                </button>
                                <button type='submit'
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors duration-200">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Filter Modal -->
        <div x-cloak x-show="filterOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="filter-title"
            role="dialog" aria-modal="true">
            <!-- Backdrop -->
            <div x-show="filterOpen" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" x-on:click="filterOpen = false"
                class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm"></div>

            <!-- Modal Panel -->
            <div class="flex min-h-full items-center justify-center p-4">
                <form x-show="filterOpen" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative w-full max-w-sm transform overflow-hidden rounded-2xl bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-left shadow-xl transition-all">
                    <!-- Header -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100" id="filter-title">
                                Filter
                                Costs</h3>
                            <button x-on:click="filterOpen = false"
                                class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                                <x-icons.close class="w-5 h-5" />
                            </button>
                        </div>
                    </div>

                    <!-- Body -->
                    <div class="px-6 py-4 space-y-4">
                        <!-- Date Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Date
                                Range</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="date" name="date[]" value="{{ request()->date[0] ?? '' }}"
                                    class="px-3 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-lg text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <input type="date" name="date[]" value="{{ request()->date[1] ?? '' }}"
                                    class="px-3 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-lg text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Price
                                Range</label>
                            <div class="grid grid-cols-2 gap-2">
                                <div class="relative">
                                    <span
                                        class="absolute left-3 top-1/2 -translate-y-1/2 text-purple-600 font-medium">$</span>
                                    <input type="number" name="price[]" placeholder="Min"
                                        value="{{ request()->price[0] ?? '' }}"
                                        class="w-full pl-7 pr-3 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-lg text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200">
                                </div>
                                <div class="relative">
                                    <span
                                        class="absolute left-3 top-1/2 -translate-y-1/2 text-purple-600 font-medium">$</span>
                                    <input type="number" name="price[]" placeholder="Max"
                                        value="{{ request()->price[1] ?? '' }}"
                                        class="w-full pl-7 pr-3 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-lg text-sm text-gray-900 dark:text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-colors duration-200">
                                </div>
                            </div>
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category</label>
                            <select name="category"
                                class="w-full px-3 py-2 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-600 rounded-lg text-sm text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="">All Categories</option>
                                @foreach ($categories ?? [] as $category)
                                    <option @selected(request()->category == $category->id) value="{{ $category->id }}">
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between">
                        <a href="{{ route('costs.index') }}"
                            class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 transition-colors duration-200">
                            Reset Filters
                        </a>
                        <div class="flex items-center gap-3">
                            <button x-on:click="filterOpen = false"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors duration-200">
                                Cancel
                            </button>
                            <button type='submit'
                                class="px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors duration-200">
                                Apply Filters
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
