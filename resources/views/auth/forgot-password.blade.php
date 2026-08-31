@extends('layouts.app')

@section('title', 'Lupa Kata Sandi - Creamy Mood')

@section('content')
<div class="auth-page">
    <div class="auth-box">
        <div class="auth-header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Creamy Mood" class="auth-logo">
            <h2 style="font-size: 1.8rem; margin-bottom: 0.5rem;">Lupa Kata Sandi?</h2>
            <p style="color: #64748b;">Masukkan alamat email Anda untuk menerima tautan reset kata sandi.</p>
        </div>

        @if (session('status'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; text-align: center; border: 1px solid #10b981; font-weight: 500;">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-matcha" style="width: 100%; margin-top: 1rem;">
                KIRIM TAUTAN RESET
            </button>
            
            <div class="text-center" style="margin-top: 1.5rem;">
                <a href="{{ route('login') }}" style="font-weight: 600;">Kembali ke Halaman Masuk</a>
            </div>
        </form>
    </div>
</div>
@endsection
