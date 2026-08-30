<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usersCount = \App\Models\User::count();
        $testimonials = \App\Models\Testimonial::latest()->get();
        return view('admin.dashboard', compact('usersCount', 'testimonials'));
    }

    public function deleteTestimonial($id)
    {
        $testimonial = \App\Models\Testimonial::findOrFail($id);
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimoni berhasil dihapus.');
    }
}
