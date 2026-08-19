@extends('layouts.app')

@section('title', 'Daftar - Creamy Mood')

@section('content')
<div class="auth-page">
    <div class="auth-box text-center">
        <div class="auth-header">
            <img src="{{ asset('images/logo.png') }}" alt="Creamy Mood" class="auth-logo">
            <h2>Buat Akun Baru</h2>
            <p>Bergabunglah dengan klub Creamy Mood hari ini</p>
        </div>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="form-group" style="text-align: left;">
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="text-align: left;">
                <label for="email">Alamat Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group" style="text-align: left;">
                <label for="password">Kata Sandi</label>
                <div class="password-wrapper">
                    <input type="password" name="password" id="password" class="form-control" required>
                    <button type="button" class="password-toggle" id="togglePassword">
                        <!-- Eye icon SVG -->
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-chocolate" style="width: 100%; margin-top: 1rem;">Daftar</button>
        </form>

        <p style="margin-top: 2rem;">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
    </div>
</div>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.innerHTML = `
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                <line x1="1" y1="1" x2="23" y2="23"></line>
            `;
        } else {
            passwordInput.type = 'password';
            eyeIcon.innerHTML = `
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            `;
        }
    });
</script>
@endsection
