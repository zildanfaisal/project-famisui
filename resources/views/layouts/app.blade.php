<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'LactaCare' }}</title>

    <!-- CSS & Font -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- CSS Tambahan -->
    @stack('styles')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Sacramento&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar Komponen -->
    <x-navbar />

    <!-- Konten Halaman -->
    <main>
        {{ $slot }}
    </main>

    <!-- Script -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
