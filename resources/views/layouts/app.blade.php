<!doctype html>
<html lang="jp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
   {{-- ナビゲーション --}}
    @include('partials.chic-navbar')
    @include('partials.forms-chic')

    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
