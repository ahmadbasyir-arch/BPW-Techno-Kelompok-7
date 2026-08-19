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
