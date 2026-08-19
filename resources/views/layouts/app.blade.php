<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Creamy Mood')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    @vite(['resources/css/app.css'])
</head>
<body>
    <nav class="navbar">
        <div class="container d-flex justify-between align-center">
            <a href="{{ route('home') }}" class="nav-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Creamy Mood">
                Creamy Mood
            </a>
            <div class="nav-links">
                <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                <a href="{{ route('testimonials') }}" class="nav-link">Testimoni</a>
                
                @auth
                    <a href="{{ route('profile') }}" class="nav-link">Profil</a>
                    <a href="{{ route('logout') }}" class="btn btn-outline" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-matcha">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2026 Creamy Mood. Hak cipta dilindungi undang-undang.</p>
        </div>
    </footer>
</body>
</html>
