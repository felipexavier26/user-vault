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

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/script.js'])
</head>

<body class="font-sans antialiased" data-page="{{ Route::currentRouteName() }}"
    data-success-message="{{ session('success') }}" data-has-errors="{{ session('errors') ? 'true' : 'false' }}"
    data-password-updated="{{ session('status') === 'password-updated' ? 'true' : 'false' }}"
    data-update-password-errors='@json($errors->updatePassword ?? [])'>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('scripts')
</body>

</html>
