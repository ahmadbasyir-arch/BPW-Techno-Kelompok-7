<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function testimonials()
    {
        return view('testimonials');
    }

    public function profile()
    {
        return view('profile', [
            'user' => auth()->user()
        ]);
    }
}
