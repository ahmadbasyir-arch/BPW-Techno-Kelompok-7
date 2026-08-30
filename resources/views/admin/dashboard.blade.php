@extends('layouts.app')

@section('title', 'Admin Dashboard - Creamy Mood')

@section('content')
<style>
    .admin-table-wrap { display: block; }
    .admin-cards { display: none; }

    @media (max-width: 768px) {
        .admin-table-wrap { display: none; }
        .admin-cards { display: flex; flex-direction: column; gap: 1rem; }
    }
</style>

<div class="container" style="padding: 5rem 1rem; min-height: calc(100vh - 80px);">
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; font-weight: 800; color: var(--chocolate); margin: 0;">Panel Admin</h1>
        <p style="margin: 0.25rem 0 0; color: #64748b;">Selamat datang, Pemilik! Berikut rincian data website Anda.</p>
    </div>

    @if(session('success'))
        <div style="background-color: #d1fae5; color: #065f46; padding: 1rem 1.5rem; border-radius: 8px; font-weight: 600; border: 1px solid #10b981; margin-bottom: 2rem;">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Statistik --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
        <div class="card" style="text-align: center; border-bottom: 5px solid var(--matcha); padding: 1.5rem;">
            <h3 style="font-size: 2.5rem; margin-bottom: 0.25rem; color: var(--matcha);">{{ $usersCount }}</h3>
            <p style="font-weight: 600; color: var(--chocolate); margin: 0;">Total Pengguna</p>
        </div>
        <div class="card" style="text-align: center; border-bottom: 5px solid var(--chocolate); padding: 1.5rem;">
            <h3 style="font-size: 2.5rem; margin-bottom: 0.25rem; color: var(--chocolate);">{{ count($testimonials) }}</h3>
            <p style="font-weight: 600; color: var(--chocolate); margin: 0;">Total Testimoni</p>
        </div>
    </div>

    <div class="card" style="padding: 0; overflow: hidden;">
        <div style="padding: 1.25rem 1.5rem; background: var(--cream); border-bottom: 1px solid var(--gray-light);">
            <h2 style="margin: 0; font-size: 1.25rem;">Daftar Testimoni</h2>
        </div>

        {{-- DESKTOP: Table --}}
        <div class="admin-table-wrap" style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="background: #fafafa; border-bottom: 2px solid var(--gray-light);">
                        <th style="padding: 1rem 1.5rem; color: var(--chocolate);">No</th>
                        <th style="padding: 1rem 1.5rem; color: var(--chocolate);">Penulis</th>
                        <th style="padding: 1rem 1.5rem; color: var(--chocolate);">Rating</th>
                        <th style="padding: 1rem 1.5rem; color: var(--chocolate);">Komentar</th>
                        <th style="padding: 1rem 1.5rem; color: var(--chocolate);">Tanggal</th>
                        <th style="padding: 1rem 1.5rem; color: var(--chocolate); text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $index => $testi)
                    <tr style="border-bottom: 1px solid var(--gray-light);">
                        <td style="padding: 0.85rem 1.5rem;">{{ $index + 1 }}</td>
                        <td style="padding: 0.85rem 1.5rem; font-weight: 600;">{{ $testi->name }}</td>
                        <td style="padding: 0.85rem 1.5rem;">{{ $testi->rating }} ⭐</td>
                        <td style="padding: 0.85rem 1.5rem;">{{ Str::limit($testi->comment, 50) }}</td>
                        <td style="padding: 0.85rem 1.5rem;">{{ $testi->created_at->format('d M Y') }}</td>
                        <td style="padding: 0.85rem 1.5rem; text-align: center;">
                            <form action="{{ route('admin.testimonial.delete', $testi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: #ef4444; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer; font-weight: 600;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="padding: 2rem; text-align: center; color: #64748b;">Belum ada testimoni.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- MOBILE: Cards --}}
        <div class="admin-cards" style="padding: 1rem;">
            @forelse($testimonials as $index => $testi)
            <div style="background: white; border: 1px solid var(--gray-light); border-radius: 12px; padding: 1.25rem;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 0.75rem;">
                    <div>
                        <p style="margin: 0; font-weight: 700; font-size: 1rem;">{{ $testi->name }}</p>
                        <p style="margin: 0.2rem 0 0; font-size: 0.85rem; color: #64748b;">{{ $testi->created_at->format('d M Y') }}</p>
                    </div>
                    <span style="font-size: 1rem;">{{ $testi->rating }} ⭐</span>
                </div>
                <p style="margin: 0 0 1rem; color: #475569; font-size: 0.9rem; line-height: 1.5;">{{ Str::limit($testi->comment, 80) }}</p>
                <form action="{{ route('admin.testimonial.delete', $testi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="width: 100%; background: #ef4444; color: white; border: none; padding: 0.6rem; border-radius: 8px; cursor: pointer; font-weight: 600; font-size: 0.9rem;">🗑️ Hapus Testimoni</button>
                </form>
            </div>
            @empty
            <p style="text-align: center; color: #64748b; padding: 2rem 0;">Belum ada testimoni.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
