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
    <style>
        /* Transisi Halaman */
        body {
            opacity: 0;
            transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out;
            transform: translateY(10px);
        }
        body.page-loaded {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid d-flex justify-between align-center">
            <a href="{{ route('home') }}" class="nav-brand">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Creamy Mood">
                Creamy Mood
            </a>
            
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="nav-links" id="navLinks">
                <a href="{{ route('home') }}" class="nav-link">Beranda</a>
                <a href="{{ route('about') }}" class="nav-link">Tentang Kami</a>
                <a href="{{ route('testimonials') }}" class="nav-link">Testimoni</a>
                
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="nav-link" style="color: var(--matcha-dark);">Panel Admin</a>
                    @endif
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

    <footer class="footer">
        <div class="container footer-content">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="footer-logo d-flex align-center gap-1">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Creamy Mood">
                    <span>Creamy Mood</span>
                </a>
                <p class="footer-desc">Tingkatkan mood Anda dengan setiap tegukan minuman matcha dan coklat premium kami. Kebahagiaan dalam satu gelas.</p>
            </div>
            
            <div class="footer-links">
                <h3>Tautan Cepat</h3>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('testimonials') }}">Testimoni</a></li>
                </ul>
            </div>
            
            <div class="footer-social">
                <h3>Hubungi Kami</h3>
                <p>Ikuti perjalanan kami dan dapatkan penawaran spesial di media sosial.</p>
                <a href="https://instagram.com/creamy._mood" target="_blank" class="social-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                    @creamy._mood
                </a>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container text-center">
                <p>&copy; {{ date('Y') }} Creamy Mood. Hak cipta dilindungi undang-undang.</p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('navLinks').classList.toggle('active');
            this.classList.toggle('active');
        });

        // Transisi Halaman
        document.addEventListener("DOMContentLoaded", function() {
            document.body.classList.add('page-loaded');
        });

        document.addEventListener('click', function(e) {
            let target = e.target.closest('a');
            if (target && target.href && !target.target && target.host === window.location.host && !target.href.includes('#')) {
                if(target.hasAttribute('onclick')) return;
                
                e.preventDefault();
                document.body.classList.remove('page-loaded');
                setTimeout(function() {
                    window.location.href = target.href;
                }, 400); // Wait for transition
            }
        });

        // Fix back button cache (BFCache)
        window.addEventListener("pageshow", function(event) {
            if (event.persisted) {
                document.body.classList.add('page-loaded');
            }
        });
    </script>
</body>
</html>
