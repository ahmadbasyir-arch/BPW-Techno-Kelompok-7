<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $topTestimonials = \App\Models\Testimonial::where('rating', 5)->latest()->take(3)->get();
        return view('home', compact('topTestimonials'));
    }

    public function about()
    {
        return view('about');
    }

    public function testimonials()
    {
        $testimonials = \App\Models\Testimonial::latest()->paginate(6);
        return view('testimonials', compact('testimonials'));
    }

    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required'
        ]);

        $badWords = ['kasar', 'bodoh', 'jelek', 'anjing', 'bangsat', 'babi', 'goblok', 'tolol'];
        $comment = $request->comment;
        foreach ($badWords as $word) {
            $comment = str_ireplace($word, '***', $comment);
        }

        \App\Models\Testimonial::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'comment' => $comment
        ]);

        return redirect()->back()->with('success', 'Terima kasih, ' . $request->name . '! Testimoni Anda telah berhasil kami terima.');
    }

    public function profile()
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }
}
