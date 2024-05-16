<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full m-0">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    @yield('styles')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full m-0 d-flex flex-col" style="display: flex">
    @include('admin.partials.navbar')
    @include('admin.partials.sidebar')
    <section class="flex-1 p-4 ml-64 mt-20 bg-[#f4f4f7]">
        @yield('content')
    </section>
    @include('admin.partials.footer')
    @yield('scripts')
</body>

</html>
