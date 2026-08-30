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
        <p class="hero-tagline">✨ Segarnya Matcha, Lezatnya Coklat ✨</p>
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
            <p style="font-weight: bold; font-size: 1.5rem; color: var(--matcha);">Rp 12.000</p>
            <p>Minuman matcha manis dengan tekstur yang super creamy dan lembut. Menghadirkan keseimbangan rasa manis nan lezat untuk memeriahkan hari Anda.</p>
        </div>
        
        <div class="product-card coklat">
            <div class="product-icon" style="width: 100%; max-width: 250px; height: auto; border-radius: 12px; background: transparent; box-shadow: none;">
                <img src="{{ asset('images/coklat.png') }}" alt="Minuman Coklat" style="width: 100%; height: auto; border-radius: 12px; object-fit: contain;">
            </div>
            <h3>Coklat Klasik</h3>
            <p style="font-weight: bold; font-size: 1.5rem; color: var(--matcha);">Rp 12.000</p>
            <p>Coklat lezat yang kaya lumer menjadi minuman es yang lembut. Minuman kenyamanan paling utama untuk memuaskan rasa manis Anda.</p>
        </div>
    </div>
</section>

{{-- Jam Operasional --}}
<section style="background: var(--cream); padding: 3rem 1rem;">
    <div class="container text-center">
        <h2 style="margin-bottom: 0.5rem;">🕐 Jam Operasional</h2>
        <p style="font-size: 1rem; color: #64748b; margin-bottom: 1.5rem;">Kami hadir khusus untuk Anda</p>
        <div style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 1rem; background: white; padding: 1.25rem 1.5rem; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.07); max-width: 360px; margin: 0 auto; flex-wrap: nowrap;">
            <div style="text-align: center; flex: 1;">
                <p style="margin: 0; font-size: 0.75rem; color: #64748b; text-transform: uppercase; letter-spacing: 1px;">Buka</p>
                <p style="margin: 0.25rem 0; font-size: 1.75rem; font-weight: 800; color: var(--matcha);">08.00</p>
                <p style="margin: 0; font-size: 0.75rem; color: #64748b;">Pagi</p>
            </div>
            <div style="font-size: 1.5rem; color: #cbd5e1; flex-shrink: 0;">—</div>
            <div style="text-align: center; flex: 1;">
                <p style="margin: 0; font-size: 0.75rem; color: #64748b; text-transform: uppercase; letter-spacing: 1px;">Tutup</p>
                <p style="margin: 0.25rem 0; font-size: 1.75rem; font-weight: 800; color: var(--chocolate);">18.00</p>
                <p style="margin: 0; font-size: 0.75rem; color: #64748b;">Sore</p>
            </div>
        </div>
        <p style="margin-top: 1.25rem; color: #64748b; font-size: 0.9rem; line-height: 1.6;">📅 1 – 2 September 2026 &nbsp;|&nbsp; 📍 Politeknik Negeri Tanah Laut</p>
    </div>
</section>

{{-- Testimoni Terbaik --}}
@if($topTestimonials->count() > 0)
<section class="products-section container" style="padding-top: 3rem; padding-bottom: 3rem;">
    <div class="text-center" style="max-width: 600px; margin: 0 auto;">
        <h2>⭐ Kata Pelanggan Kami</h2>
        <p>Inilah yang dikatakan pelanggan setia kami tentang minuman Creamy Mood.</p>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-top: 2.5rem;">
        @foreach($topTestimonials as $testi)
        <div class="card" style="padding: 1.5rem;">
            <div style="color: #f59e0b; font-size: 1.2rem; margin-bottom: 0.75rem;">⭐⭐⭐⭐⭐</div>
            <p style="font-style: italic; color: #475569; line-height: 1.7; margin-bottom: 1rem;">"{{ $testi->comment }}"</p>
            <p style="margin: 0; font-weight: 700; color: var(--chocolate);">— {{ $testi->name }}</p>
        </div>
        @endforeach
    </div>
    <div class="text-center" style="margin-top: 2.5rem;">
        <a href="{{ route('testimonials') }}" class="btn btn-matcha">Lihat Lebih Banyak Ulasan</a>
    </div>
</section>
@endif
@endsection
