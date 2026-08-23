@extends('layouts.app')

@section('title', 'Creamy Mood - Matcha & Coklat Lezat')

@section('content')
<section class="hero">
    @if(session('success'))
        <div class="container" style="margin-bottom: 2rem;">
            <div style="background-color: #d1fae5; color: #065f46; padding: 1rem 1.5rem; border-radius: 8px; font-weight: 600; text-align: center; border: 1px solid #10b981;">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="hero-blob"></div>
    <div class="container hero-content">
        <h1 class="hero-title">Tingkatkan Mood Anda dengan Setiap Tegukan</h1>
        <p style="font-size: 1.25rem; margin-bottom: 2rem;">Nikmati kreasi khas Matcha dan Coklat kami. Dibuat dengan bahan-bahan premium untuk membawa kebahagiaan di hari Anda.</p>
        <div class="d-flex gap-1">
            @guest
                <a href="{{ route('register') }}" class="btn btn-matcha">Gabung Sekarang</a>
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
            <div class="product-icon" style="width: 100%; max-width: 250px; height: auto; border-radius: 12px; background: transparent; box-shadow: none;">
                <img src="{{ asset('images/matcha.png') }}" alt="Minuman Matcha" style="width: 100%; height: auto; border-radius: 12px; object-fit: contain;">
            </div>
            <h3>Matcha Creamy</h3>
            <p>Minuman matcha manis dengan tekstur yang super creamy dan lembut. Menghadirkan keseimbangan rasa manis nan lezat untuk memeriahkan hari Anda.</p>
        </div>
        
        <div class="product-card coklat">
            <div class="product-icon" style="width: 100%; max-width: 250px; height: auto; border-radius: 12px; background: transparent; box-shadow: none;">
                <img src="{{ asset('images/coklat.png') }}" alt="Minuman Coklat" style="width: 100%; height: auto; border-radius: 12px; object-fit: contain;">
            </div>
            <h3>Coklat Klasik</h3>
            <p>Coklat lezat yang kaya lumer menjadi minuman es yang lembut. Minuman kenyamanan paling utama untuk memuaskan rasa manis Anda.</p>
        </div>
    </div>
</section>
@endsection
