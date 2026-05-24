function analyticsChart() {
    return {
        chart: null,
        chartData: JSON.parse(document.getElementById('chartData').value),
        dateType: document.getElementById('dateType').value,
        year: parseInt(document.getElementById('year').value),
        month: parseInt(document.getElementById('month').value),
        showCosts: true,
        showIncome: true,
        availableYears: [2022, 2023, 2024, 2025, 2026],
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],

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
            const labels = this.chartData.labels;
            const datasets = [];

            if (this.showCosts) {
                datasets.push({
                    label: 'Costs',
                    data: this.chartData.costs,
                    backgroundColor: 'rgba(168, 85, 247, 0.8)',
                    borderColor: 'rgba(168, 85, 247, 1)',
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                });
            }

            if (this.showIncome && this.chartData.income.length > 0) {
                datasets.push({
                    label: 'Income',
                    data: this.chartData.income,
                    backgroundColor: 'rgba(34, 197, 94, 0.8)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                });
            }

            return { labels, datasets };
        },

        updateChart() {
            if (this.chart) {
                this.chart.data = this.getChartData();
                this.chart.update('active');
            }
        },

        updateUrl() {
            const params = new URLSearchParams();
            params.set('date', this.dateType);
            params.set('year', this.year);
            if (this.dateType === 'daily') {
                params.set('month', this.month);
            }
            window.location.href = '?' + params.toString();
        }
    }
}
