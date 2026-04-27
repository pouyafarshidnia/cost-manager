<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=''>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        [x-cloak] {
            display: none;
        }
    </style>


</head>

<body class="bg-gray-50 dark:bg-gray-900" x-data="{ sidebarOpen: false }" @keydown.escape.window="sidebarOpen = false">

    <x-nav></x-nav>
    <x-aside></x-aside>
