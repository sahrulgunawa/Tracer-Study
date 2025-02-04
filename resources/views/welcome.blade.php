<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            object-fit: cover;
        }

        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: #ffffff;
            padding-top: 30vh;
        }

        .content h1 {
            font-size: 4rem;
            font-weight: bold;
        }

        .content p {
            font-size: 1.5rem;
        }

        .btn-primary, .btn-secondary {
            margin: 10px;
        }

        footer {
            text-align: center;
            color: #ffffff;
            margin-top: 30px;
            position: relative;
            z-index: 2;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Add a dark overlay */
            z-index: 1;
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <video autoplay muted loop class="video-background">
        <source src="{{ asset('videos/tcvid.webm') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Content -->
    <div class="content">
        <h1>Selamat Datang Di Web Tracer Study</h1>
        <p>A simple tracer study alumni website</p>
        <div>
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">Register</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Tracer Study. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
