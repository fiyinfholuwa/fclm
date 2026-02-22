<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\Publication;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $sliders  = HomeSlider::where('status',  'active')->get();
        return view('welcome', compact('sliders'));
    }
    public function about(){
        return view('about');
    }
    public function programmes(){
        return view('programmes');
    }
    public function publications(){
        $publications= Publication::where('status', 'active')->get();
        return view('publications', compact('publications'));
    }
    public function donation(){
        return view('donation');
    }
    public function gallery(){
        return view('gallery');
    }
    public function contact(){
        return view('contact');
    }
}
