@extends('layouts.app')
@section('content')
    <div class="lg:ml-64 min-h-[calc(100vh-4rem)] bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
        <div class="p-4 sm:p-6 lg:p-8">

            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 transition-colors duration-200">
                    Dashboard
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 transition-colors duration-200">
                    Overview of your financial activities
                </p>
            </div>

            <!-- Stats Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">


                <x-cards.primary :route="route('categories.index')" title="Total Categories" :number="$categoriesCount"></x-cards.primary>
                <x-cards.info :route="route('costs.index')" title="Total Costs" :number="$costsCount"></x-cards.info>
                <x-cards.success :route="route('costs.index')" title="Total Costs Price" :number="$totalCostPrice"></x-cards.success>

            </div>

        </div>
    </div>
@endsection
