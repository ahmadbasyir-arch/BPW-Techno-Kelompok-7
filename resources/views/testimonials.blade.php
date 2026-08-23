@extends('layouts.app')

@section('title', 'Testimoni - Creamy Mood')

@section('content')
<div class="container" style="padding: 5rem 0; min-height: calc(100vh - 80px);">
    <div class="text-center" style="max-width: 600px; margin: 0 auto; margin-bottom: 3rem;">
        <h1 class="hero-title" style="font-size: 2.5rem;">Berikan Testimoni Anda</h1>
        <p>Bagikan pengalaman Anda menikmati produk Creamy Mood bersama kami.</p>
    </div>

    <div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 20px; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
        @if(session('success'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 1rem 1.5rem; border-radius: 8px; font-weight: 600; text-align: center; border: 1px solid #10b981; margin-bottom: 1.5rem;">
                {{ session('success') }}
            </div>
        @endif

        <form action="#" method="POST">
            @csrf
            
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama Anda" value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; transition: border-color 0.2s;">
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label for="rating" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Penilaian (1 - 5 Bintang)</label>
                <select id="rating" name="rating" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; background-color: white; transition: border-color 0.2s;">
                    <option value="" disabled selected>Pilih Penilaian</option>
                    <option value="5">⭐⭐⭐⭐⭐ (5) - Sangat Bagus</option>
                    <option value="4">⭐⭐⭐⭐ (4) - Bagus</option>
                    <option value="3">⭐⭐⭐ (3) - Cukup</option>
                    <option value="2">⭐⭐ (2) - Kurang</option>
                    <option value="1">⭐ (1) - Sangat Kurang</option>
                </select>
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="comment" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Komentar</label>
                <textarea id="comment" name="comment" rows="4" placeholder="Ceritakan pengalaman Anda..." required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; transition: border-color 0.2s; resize: vertical;"></textarea>
            </div>

            <button type="submit" class="btn btn-matcha" style="width: 100%; justify-content: center; font-size: 1.1rem; padding: 1rem;">Kirim Testimoni</button>
        </form>
    </div>
</div>
@endsection
