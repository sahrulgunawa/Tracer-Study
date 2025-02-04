<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User</title>

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
                <h1 class="text-lg font-bold text-gray-700">{{ config('User') }}User</h1>
            </div>
            <nav class="mt-6">
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                <li class="mb-4">
                    <a href="{{ route('tracer_kuliah.questionnaire') }}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-university"></i> Kuesioner Tracer Kuliah
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('tracer_kerja.questionnaire')}}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
                        <i class="fas fa-briefcase"></i> Kuesioner Tracer Kerja
                    </a>
                </li>
                </li>
                <li class="mb-4">
                    <a href="{{ route('testimoni.indexuser')}}" class="block py-2.5 px-4 rounded hover:bg-gray-200">
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
