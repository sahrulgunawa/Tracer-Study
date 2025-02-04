<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md">
        <div class="py-4 px-6">
            <h1 class="text-lg font-bold text-gray-700">Admin</h1>
        </div>
        <nav class="mt-6">
            <ul>
                <li class="mb-4">
                    <a href="{{ route('sekolah.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-school"></i> Sekolah
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('bidang_keahlian.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-cogs"></i> Bidang Keahlian
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('tahun_lulus.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-calendar-alt"></i> Tahun Lulus
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('program_keahlian.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-graduation-cap"></i> Program Keahlian
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('konsentrasi_keahlian.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-th-large"></i> Konsentrasi Keahlian
                    </a>
                </li>
                 <li class="mb-4">
                    <a href="{{ route('status_alumni.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-users"></i> Status Alumni
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('alumni.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-user-graduate"></i> Alumni
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('tracer_kuliah.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-university"></i> Tracer Kuliah
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('tracer_kerja.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-briefcase"></i> Tracer Kerja
                    </a>
                </li>
               
                <li class="mb-4">
                    <a href="{{ route('testimoni.index') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-comment-alt"></i> Testimoni
                    </a>
                </li>
            </ul>
        </nav>
        <div class="mt-auto py-4 px-6">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full py-2.5 bg-red-600 text-white font-bold rounded hover:bg-red-700">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="mt-6">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
