@extends('layouts.app')

@section('title', 'Pesan Minuman - Creamy Mood')

@section('content')
<section class="container" style="padding-top: 6rem; padding-bottom: 4rem;">
    <div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 20px; padding: 3rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
        <h1 style="font-size: 2.5rem; margin-bottom: 1rem; color: var(--color-dark); text-align: center;">Pesan Minuman</h1>
        <p style="color: var(--color-gray); text-align: center; margin-bottom: 2rem;">Silakan isi formulir di bawah ini untuk memesan.</p>

        @if($errors->any())
            <div style="background-color: #fee2e2; color: #b91c1c; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            
            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label for="name" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Nama Lengkap</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', auth()->user()->name ?? '') }}" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; transition: border-color 0.2s;">
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label for="phone" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Nomor WhatsApp</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required placeholder="Contoh: 081234567890" style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; transition: border-color 0.2s;">
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label for="product" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Pilih Minuman</label>
                <select id="product" name="product" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; background-color: white; transition: border-color 0.2s;">
                    <option value="" disabled {{ !old('product', $selectedProduct) ? 'selected' : '' }}>Pilih Varian</option>
                    <option value="Matcha Creamy" {{ old('product', $selectedProduct) == 'Matcha Creamy' ? 'selected' : '' }}>Matcha Creamy</option>
                    <option value="Coklat Klasik" {{ old('product', $selectedProduct) == 'Coklat Klasik' ? 'selected' : '' }}>Coklat Klasik</option>
                </select>
            </div>

            <div class="form-group" style="margin-bottom: 1.5rem;">
                <label for="quantity" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Jumlah</label>
                <input type="number" id="quantity" name="quantity" min="1" value="{{ old('quantity', 1) }}" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; transition: border-color 0.2s;">
            </div>

            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="address" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Alamat Pengiriman</label>
                <textarea id="address" name="address" rows="3" required style="width: 100%; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; outline: none; transition: border-color 0.2s; resize: vertical;">{{ old('address') }}</textarea>
            </div>

            <button type="submit" class="btn btn-matcha" style="width: 100%; justify-content: center; font-size: 1.1rem; padding: 1rem;">Kirim Pesanan</button>
        </form>
    </div>
</section>
@endsection
