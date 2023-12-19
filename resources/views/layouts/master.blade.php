<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <!-- Tambahkan link CSS atau CDN sesuai kebutuhan Anda -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
</head>
<body>

    <div>
        @yield('content')
    </div>

    <!-- Tambahkan script JS atau CDN sesuai kebutuhan Anda -->
</body>
</html>
