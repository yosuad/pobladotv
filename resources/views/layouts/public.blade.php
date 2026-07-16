<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name')) | {{ config('app.name') }}</title>
    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    @vite(['resources/js/app.js'])
</head>

<body>

    @include('components.navbar')

    <main class="site-main">
        @yield('content')
    </main>

    @include('components.footer')

</body>

</html>