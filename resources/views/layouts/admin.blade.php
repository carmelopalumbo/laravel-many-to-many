<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ Vite::asset('resources/image/faviconadmin.png') }}" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.css'
        integrity='sha512-FA9cIbtlP61W0PRtX36P6CGRy0vZs0C2Uw26Q1cMmj3xwhftftymr0sj8/YeezDnRwL9wtWw8ZwtCiTDXlXGjQ=='
        crossorigin='anonymous' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CKEditor -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/ckeditor5/35.4.0/ckeditor.js'
        integrity='sha512-nDvxc83NJ6VUAazr1a7tEjkVvP3XR900IgSk0ItAdMnPdSjsMkYdNBCSDm069Xg9K9JzvUZR3d++esL7yBA4oQ=='
        crossorigin='anonymous'></script>

    <title>My Portfolio | @yield('title')</title>

    <!-- Vite -->
    @vite(['resources/js/app.js'])
</head>

<body onload="startTime()">
    <div id="app" class="admin">
        @include('admin.partials.header')
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
