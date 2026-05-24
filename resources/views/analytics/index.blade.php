@extends('layouts.app')

@section('content')
    <main class="lg:ml-64 ml-0 mt-16 transition-all duration-300 p-6">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">Analytics Dashboard</h1>
            <p class="text-gray-600 dark:text-gray-400">Track your costs and income over time</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div
                class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 transition-colors duration-200">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center">
                        <x-icons.cost class="w-5 h-5 text-purple-600 dark:text-purple-400" />
                    </div>
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Costs</span>
                </div>
                <p class="text-2xl font-bold text-gray-900 dark:text-white" x-data="{ value: {{ $totalCosts ?? 0 }} }"
                    x-text="'$' + value.toLocaleString()"></p>
            </div>

            <div
                class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 transition-colors duration-200">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-green-100 dark:bg-green-900/30 flex items-center justify-center">
                        <x-icons.dollar class="w-5 h-5 text-green-600 dark:text-green-400" />
                    </div>
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Income</span>
                </div>
                <p class="text-2xl font-bold text-gray-900 dark:text-white" x-data="{ value: {{ $totalIncome ?? 0 }} }"
                    x-text="'$' + value.toLocaleString()"></p>
            </div>

            <div
                class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 transition-colors duration-200">
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center">
                        <x-icons.chart class="w-5 h-5 text-blue-600 dark:text-blue-400" />
                    </div>
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Net Balance</span>
                </div>
                <p class="text-2xl font-bold" x-data="{ costs: {{ $totalCosts ?? 0 }}, income: {{ $totalIncome ?? 0 }} }" x-text="'$' + (income - costs).toLocaleString()"
                    :class="(income - costs) >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400'">
                </p>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 p-6 transition-colors duration-200"
            x-data="analyticsChart()" x-init="initChart()">

            <!-- Filters -->
            <div class="flex flex-wrap items-center gap-4 mb-8">

                <!-- View Type Toggle -->
                <div
                    class="flex items-center gap-2 bg-gray-100 dark:bg-gray-700 rounded-xl p-1 transition-colors duration-200">
                    <button x-on:click="viewType = 'monthly'; updateChart()"
                        :class="viewType === 'monthly' ?
                            'bg-white dark:bg-gray-600 text-purple-600 dark:text-purple-400 shadow-sm' :
                            'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200'"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                        Monthly
                    </button>
                    <button x-on:click="viewType = 'daily'; updateChart()"
                        :class="viewType === 'daily' ?
                            'bg-white dark:bg-gray-600 text-purple-600 dark:text-purple-400 shadow-sm' :
                            'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200'"
                        class="px-4 py-2 rounded-lg text-sm font-medium transition-all duration-200">
                        Daily
                    </button>
                </div>

                <!-- Year Selector -->
                <div class="relative">
                    <select x-model="selectedYear" x-on:change="updateChart()"
                        class="appearance-none bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-xl px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 cursor-pointer">
                        <template x-for="year in availableYears" :key="year">
                            <option :value="year" x-text="year"></option>
                        </template>
                    </select>
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                        <x-icons.chevron-down class="w-4 h-4 text-gray-500" />
                    </div>
                </div>

                <!-- Month Selector (for daily view) -->
                <div class="relative" x-show="viewType === 'daily'" x-transition>
                    <select x-model="selectedMonth" x-on:change="updateChart()"
                        class="appearance-none bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-xl px-4 py-2 pr-10 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-200 cursor-pointer">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                        <x-icons.chevron-down class="w-4 h-4 text-gray-500" />
                    </div>
                </div>

                <!-- Data Type Filter -->
                <div class="flex items-center gap-2 ml-auto">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Show:</span>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" x-model="showCosts" x-on:change="updateChart()"
                            class="w-4 h-4 rounded border-gray-300 text-purple-600 focus:ring-purple-500">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Costs</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" x-model="showIncome" x-on:change="updateChart()"
                            class="w-4 h-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <span class="text-sm text-gray-700 dark:text-gray-300">Income</span>
                    </label>
                </div>

            </div>

            <!-- Chart -->
            <div class="relative h-96">
                <canvas id="analyticsChart"></canvas>
            </div>

            <!-- Legend -->
            <div class="flex items-center justify-center gap-6 mt-6">
                <div class="flex items-center gap-2" x-show="showCosts">
                    <div class="w-4 h-4 rounded bg-purple-500"></div>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Costs</span>
                </div>
                <div class="flex items-center gap-2" x-show="showIncome">
                    <div class="w-4 h-4 rounded bg-green-500"></div>
                    <span class="text-sm text-gray-600 dark:text-gray-400">Income</span>
                </div>
            </div>

        </div>

    </main>

    <script>
        function analyticsChart() {
            return {
                chart: null,
                viewType: 'monthly',
                selectedYear: new Date().getFullYear(),
                selectedMonth: new Date().getMonth() + 1,
                showCosts: true,
                showIncome: true,
                availableYears: [2022, 2023, 2024, 2025, 2026],

                initChart() {
                    this.$nextTick(() => {
                        this.createChart();
                    });
                },

                createChart() {
                    const ctx = document.getElementById('analyticsChart').getContext('2d');
                    const isDark = document.documentElement.classList.contains('dark');
                    const gridColor = isDark ? 'rgba(75, 85, 99, 0.3)' : 'rgba(209, 213, 219, 0.5)';
                    const textColor = isDark ? '#9ca3af' : '#6b7280';

                    this.chart = new Chart(ctx, {
                        type: 'bar',
                        data: this.getChartData(),
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            interaction: {
                                mode: 'index',
                                intersect: false,
                            },
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    backgroundColor: isDark ? '#1f2937' : '#ffffff',
                                    titleColor: isDark ? '#f9fafb' : '#111827',
                                    bodyColor: isDark ? '#d1d5db' : '#374151',
                                    borderColor: isDark ? '#374151' : '#e5e7eb',
                                    borderWidth: 1,
                                    padding: 12,
                                    cornerRadius: 8,
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            label += '$' + context.parsed.y.toLocaleString();
                                            return label;
                                        }
                                    }
                                }
                            },
                            scales: {
                                x: {
                                    grid: {
                                        display: false
                                    },
                                    ticks: {
                                        color: textColor,
                                        font: {
                                            size: 12
                                        }
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: gridColor,
                                        drawBorder: false
                                    },
                                    ticks: {
                                        color: textColor,
                                        font: {
                                            size: 12
                                        },
                                        callback: function(value) {
                                            return '$' + value.toLocaleString();
                                        }
                                    }
                                }
                            }
                        }
                    });
                },

                getChartData() {
                    const labels = this.viewType === 'monthly' ? ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug',
                            'Sep', 'Oct', 'Nov', 'Dec'
                        ] :
                        Array.from({
                            length: 31
                        }, (_, i) => (i + 1).toString());

                    const datasets = [];

                    if (this.showCosts) {
                        datasets.push({
                            label: 'Costs',
                            data: this.viewType === 'monthly' ?
                                {{ json_encode($monthlyCosts ?? array_fill(0, 12, 0)) }} :
                                {{ json_encode($dailyCosts ?? array_fill(0, 31, 0)) }},
                            backgroundColor: 'rgba(168, 85, 247, 0.8)',
                            borderColor: 'rgba(168, 85, 247, 1)',
                            borderWidth: 0,
                            borderRadius: 4,
                            borderSkipped: false,
                        });
                    }

                    if (this.showIncome) {
                        datasets.push({
                            label: 'Income',
                            data: this.viewType === 'monthly' ?
                                {{ json_encode($monthlyIncome ?? array_fill(0, 12, 0)) }} :
                                {{ json_encode($dailyIncome ?? array_fill(0, 31, 0)) }},
                            backgroundColor: 'rgba(34, 197, 94, 0.8)',
                            borderColor: 'rgba(34, 197, 94, 1)',
                            borderWidth: 0,
                            borderRadius: 4,
                            borderSkipped: false,
                        });
                    }

                    return {
                        labels,
                        datasets
                    };
                },

                updateChart() {
                    if (this.chart) {
                        this.chart.data = this.getChartData();
                        this.chart.update('active');
                    }
                }
            }
        }
    </script>
@endsection
