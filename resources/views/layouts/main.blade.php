<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru-RU&apikey=dbe92ebd-1c70-436b-a435-6457f76bf351" type="text/javascript"></script>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <header>
        @include('includes.header')
    </header>

    <main class="main-content-wrapper">
        @yield('content')
    </main>

    <footer>
        @include('includes.footer')
    </footer>

    @include('includes.modals')
</div>
</body>
</html>
