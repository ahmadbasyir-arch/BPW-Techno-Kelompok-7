@extends('layouts.app')

@section('title', 'Testimoni - Creamy Mood')

@section('content')
<div class="container" style="padding: 5rem 0; min-height: calc(100vh - 80px);">
    <div class="text-center" style="max-width: 600px; margin: 0 auto; margin-bottom: 3rem;">
        <h1 class="hero-title" style="font-size: 2.5rem;">Apa Kata Pelanggan Kami</h1>
        <p>Kebahagiaan Anda adalah kesuksesan kami. Lihat apa kata mereka tentang Creamy Mood.</p>
    </div>

    <div class="testimonial-grid">
        <div class="testimonial-card">
            <img src="{{ asset('images/default_avatar.png') }}" alt="Pengguna" class="testimonial-avatar">
            <div class="stars">★★★★★</div>
            <h3>Sarah J.</h3>
            <p>"Matcha Creamy adalah yang terbaik yang pernah saya rasakan! Keseimbangan sempurna antara rasa teh yang earthy dan tekstur yang creamy."</p>
        </div>

        <div class="testimonial-card">
            <img src="{{ asset('images/default_avatar.png') }}" alt="Pengguna" class="testimonial-avatar">
            <div class="stars">★★★★★</div>
            <h3>Ahmad R.</h3>
            <p>"Coklat Klasik selalu mengembalikan mood saya setelah hari yang panjang di tempat kerja. Sangat kaya dan nyoklat banget!"</p>
        </div>

        <div class="testimonial-card">
            <img src="{{ asset('images/default_avatar.png') }}" alt="Pengguna" class="testimonial-avatar">
            <div class="stars">★★★★★</div>
            <h3>Linda K.</h3>
            <p>"Suka dengan mereknya dan minumannya sungguh luar biasa. Sangat merekomendasikan Creamy Mood untuk siapa saja yang suka yang manis-manis."</p>
        </div>
    </div>
</div>
@endsection
