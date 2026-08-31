<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class PasswordResetController extends Controller
{
    /**
     * Tampilkan formulir permintaan link reset password
     */
    public function create()
    {
        return view('auth.forgot-password');
    }

    /**
     * Kirim email berisi link reset password
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', 'Kami telah mengirimkan email yang berisi tautan untuk mereset kata sandi Anda!');
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => 'Email tidak ditemukan.']);
    }

    /**
     * Tampilkan formulir pembuatan password baru
     */
    public function edit(Request $request, $token)
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle proses reset password
     */
    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ], [
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'password.min' => 'Kata sandi minimal 8 karakter.'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', 'Kata sandi Anda telah berhasil direset. Silakan masuk.');
        }

        throw ValidationException::withMessages([
            'email' => ['Terjadi kesalahan, pastikan email benar atau minta tautan baru.'],
        ]);
    }
}
