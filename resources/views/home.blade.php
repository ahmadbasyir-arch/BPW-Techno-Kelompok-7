@extends('layouts.app')

@section('title', 'Creamy Mood - Matcha & Coklat Lezat')

@section('content')
<section class="hero">
    <div class="hero-blob"></div>
    <div class="container hero-content">
        <h1 class="hero-title">Tingkatkan Mood Anda dengan Setiap Tegukan</h1>
        <p style="font-size: 1.25rem; margin-bottom: 2rem;">Nikmati kreasi khas Matcha dan Coklat kami. Dibuat dengan bahan-bahan premium untuk membawa kebahagiaan di hari Anda.</p>
        <div class="d-flex gap-1">
            <a href="#products" class="btn btn-matcha">Jelajahi Rasa</a>
            @guest
                <a href="{{ route('register') }}" class="btn btn-outline">Gabung Sekarang</a>
            @endguest
        </div>
    </div>
</section>

<section id="products" class="products-section container">
    <div class="text-center" style="max-width: 600px; margin: 0 auto;">
        <h2>Variasi Khas Kami</h2>
        <p>Temukan rasa kaya dan autentik dari dua profil rasa kesayangan kami.</p>
    </div>
    
    <div class="product-grid">
        <div class="product-card matcha">
            <div class="product-icon">
                <img src="{{ asset('images/logo.png') }}" alt="Minuman Matcha">
            </div>
            <h3>Matcha Creamy</h3>
            <p>Teh hijau Jepang asli yang dicampur dengan racikan creamy khas kami. Rasa earthy, sedikit manis, dan sangat menyegarkan.</p>
        </div>
        
        <div class="product-card coklat">
            <div class="product-icon">
                <img src="{{ asset('images/logo.png') }}" alt="Minuman Coklat">
            </div>
            <h3>Coklat Klasik</h3>
            <p>Coklat lezat yang kaya lumer menjadi minuman es yang lembut. Minuman kenyamanan paling utama untuk memuaskan rasa manis Anda.</p>
        </div>
    </div>
</section>
@endsection
