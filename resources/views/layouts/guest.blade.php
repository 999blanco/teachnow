<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ Storage::url('logos/logo.png') }}">

    <meta name="keywords"
        content="profesor particular, profesores particulares, clases particulares, profesor, alumno, teachnow">
    <meta name="robots" content="INDEX, FOLLOW, ALL">
    <meta name="googlebot" content="Index, Follow, All">

    <title>Teachnow - @yield('title')</title>
    <meta name="og:title" content="Teachnow - @yield('title')">

    <meta name="description"
        content="Descubre una red de profesores particulares en tu área listos para impulsar tu aprendizaje. Encuentra a tu mentor perfecto y alcanza tu máximo potencial académico con nuestra plataforma.">
    <meta name="og:description"
        content="Descubre una red de profesores particulares en tu área listos para impulsar tu aprendizaje. Encuentra a tu mentor perfecto y alcanza tu máximo potencial académico con nuestra plataforma.">

    <meta property="og:type" content="website">
    <meta name="theme-color" content="#0078b9">
    <meta property="og:site_name" content="teachnow.es">

    <meta name="og:image" content="{{ Storage::url('logos/signature.png') }}">
    <meta name="og:image:width" content="700">
    <meta name="og:image:height" content="200">
    <meta name="twitter:card" content="summary_large_image">

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <script src="https://kit.fontawesome.com/484893fcc1.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    @include('components.guest-header', ['subjects' => $subjects])

    @yield('content')

    @include('components.guest-footer')

    @livewire('modal.location')
    @stack('modals')
    @stack('scripts')

    @livewireScripts
</body>

</html>
