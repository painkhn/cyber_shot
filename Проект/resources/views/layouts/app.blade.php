<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.bunny.net">
{{--        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />--}}
    </head>

    <body class="bg-[#E5E3DD]">
        @include('components/header')
        <main class="py-24">
            @yield('content')
        </main>
        @include('components/footer')
    </body>
</html>
