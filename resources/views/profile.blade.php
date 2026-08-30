@extends('layouts.app')

@section('title', 'Profil Saya - Creamy Mood')

@section('content')
<div class="container" style="padding: 5rem 0; min-height: calc(100vh - 80px);">
    <div class="card text-center" style="max-width: 600px; margin: 0 auto;">
        
        <img src="{{ asset('images/default_avatar.png') }}" alt="Avatar Profil" class="profile-avatar" style="margin-bottom: 2rem;">
        
        <h2>{{ $user->name }}</h2>
        <p class="text-chocolate">{{ $user->email }}</p>
        
        <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--gray-light);">
            <h3>Pengaturan Akun</h3>
            <p>Selamat datang di profil Creamy Mood Anda! Kelola pesanan minuman manis dan preferensi Anda di sini.</p>

            @if(auth()->user()->role === 'admin')
                <div style="margin-top: 1.5rem; background: #f8fafc; padding: 1.5rem; border-radius: 12px; text-align: center;">
                    <p style="margin-bottom: 1rem; color: var(--matcha-dark); font-weight: 600;">👋 Mode Administrator Aktif</p>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-matcha" style="width: 100%;">
                        Masuk Ke Panel Dasbor Admin
                    </a>
                </div>
            @endif
            
            <form action="{{ route('logout') }}" method="POST" style="margin-top: 2rem;">
                @csrf
                <button type="submit" class="btn btn-outline" style="width: 100%;">
                    Keluar dari Akun
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
