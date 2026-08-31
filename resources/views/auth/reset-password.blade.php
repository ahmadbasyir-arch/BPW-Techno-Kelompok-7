@extends('layouts.app')

@section('title', 'Buat Kata Sandi Baru - Creamy Mood')

@section('content')
<div class="auth-page">
    <div class="auth-box">
        <div class="auth-header">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Creamy Mood" class="auth-logo">
            <h2 style="font-size: 1.8rem; margin-bottom: 0.5rem;">Buat Sandi Baru</h2>
            <p style="color: #64748b;">Silakan masukkan kata sandi baru Anda.</p>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $request->email) }}" required readonly>
                @error('email')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">Kata Sandi Baru</label>
                <div class="password-wrapper">
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                @error('password')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Kata Sandi Baru</label>
                <div class="password-wrapper">
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
            </div>
            
            <button type="submit" class="btn btn-matcha" style="width: 100%; margin-top: 1rem;">
                SIMPAN KATA SANDI
            </button>
        </form>
    </div>
</div>
@endsection
