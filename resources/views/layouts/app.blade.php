<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Custom Styles -->
    @stack('custom-styles')

    <style>
        /* Main Menu Style */
        .menu {
            display: flex;
            list-style: none;
            padding: 0;
            background-color: #1F2937;
            /* Change the background color as desired */
        }

        .menu-link {
            position: relative;
            padding: 10px 20px;
            color: #E5E7EB;
            /* Change text color */
            text-decoration: none;
            font-weight: bold;
            /* Add font weight */
        }

        .menu-link:hover {
            background-color: #374151;
            /* Change hover background color */
            color: #ecf0f1;
            /* Change hover text color */
        }

        /* Sub-Menu Style */
        .sub-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: auto;
            /* Adjust the width as needed */
            background-color: #ecf0f1;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .sub-menu .menu-link {
            padding: 10px 20px;
            color: #ecf0f1;
            /* Change sub-menu text color */
            font-weight: normal;
            /* Remove font weight */
        }

        .sub-menu .menu-link:hover {
            background-color: #bdc3c7;
            /* Change hover background color */
            color: #2c3e50;
            /* Change hover text color */
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <!-- Custom Scripts -->
    @stack('custom-scripts')
</body>

</html>
