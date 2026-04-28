@props([
    'paginator' => null,
    'showFirstLast' => true,
    'showPrevNext' => true,
    'showNumbers' => true,
    'maxPages' => 5,
    'prevText' => 'Previous',
    'nextText' => 'Next',
    'firstText' => 'First',
    'lastText' => 'Last',
])


@if ($paginator && $paginator->hasPages())
    <div
        class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-between transition-colors duration-200">

        <!-- Page Counts --->
        <div class="flex items-center gap-2">
            <span class="text-sm text-gray-500 dark:text-gray-400 transition-colors duration-200">Showing
                {{ $paginator->firstItem() }}
                to
                {{ $paginator->lastItem() }} of {{ $paginator->total() }} results</span>
        </div>

        <!-- Links --->
        <div class="flex items-center gap-2">

            <!-- Prev Button --->
            @if ($paginator->onFirstPage())
                <button
                    class="px-3 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200"
                    disabled>
                    Previous
                </button>
            @else
                <a href='{{ $paginator->previousPageUrl() }}'
                    class="px-3 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200">
                    Previous
                </a>
            @endif

            <!-- Page Numbers --->
            @php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $window = 1;

                $start = max(2, $currentPage - $window);
                $end = min($lastPage - 1, $currentPage + $window);

                if ($currentPage <= $window + 1) {
                    $end = min($lastPage - 1, 3);
                }

                if ($currentPage >= $lastPage - $window) {
                    $start = max(2, $lastPage - 2);
                }

            @endphp

            <div class="flex items-center gap-1">

                <!-- First Page --->
                @if ($lastPage >= 1)
                    @if ($currentPage == 1)
                        <button
                            class="px-3 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg transition-colors duration-200">1</button>
                    @else
                        <a href="{{ $paginator->url(1) }}"
                            class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">1</a>
                    @endif
                @endif

                <!-- Left Ellipsis --->
                @if ($start > 2)
                    <span class="px-2 text-gray-400 dark:text-gray-500">...</span>
                @endif

                <!-- Middle Pages --->
                @for ($page = $start; $page <= $end; $page++)
                    @if ($page == $currentPage)
                        <button
                            class="px-3 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg transition-colors duration-200">{{ $page }}</button>
                    @else
                        <a href="{{ $paginator->url($page) }}"
                            class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">{{ $page }}</a>
                    @endif
                @endfor

                <!-- Right Ellipsis --->
                @if ($end < $lastPage - 1)
                    <span class="px-2 text-gray-400 dark:text-gray-500">...</span>
                @endif

                <!-- Last Page --->
                @if ($lastPage > 1)
                    @if ($currentPage == $lastPage)
                        <button
                            class="px-3 py-2 text-sm font-medium text-white bg-purple-600 rounded-lg transition-colors duration-200">{{ $lastPage }}</button>
                    @else
                        <a href="{{ $paginator->url($lastPage) }}"
                            class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">{{ $lastPage }}</a>
                    @endif
                @endif
            </div>


            <!-- Next Button --->
            @if ($paginator->hasMorePages())
                <a href='{{ $paginator->nextPageUrl() }}'
                    class="px-3 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    Next
                </a>
            @else
                <button
                    class="px-3 py-2 text-sm font-medium text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors duration-200"
                    disabled>
                    Next
                </button>
            @endif

        </div>
    </div>
@endif
