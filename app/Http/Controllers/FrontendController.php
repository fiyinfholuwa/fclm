<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\GalleryImage;
use App\Models\OutreachProgramme;
use App\Models\Publication;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        $sliders  = HomeSlider::where('status', 'active')->orderBy('display_order')->get();
        return view('welcome', compact('sliders'));
    }
    public function about(){
        return view('about');
    }
    public function programmes(){
        return view('programmes', ['outreachProgrammes' => OutreachProgramme::where('status', 'active')->orderBy('display_order')->get()]);
    }
    public function publications(){
        $publications= Publication::where('status', 'active')->get();
        return view('publications', compact('publications'));
    }
    public function donation(){
        return view('donation');
    }
    public function gallery(){
        return view('gallery', ['galleryImages' => GalleryImage::where('status', 'active')->orderBy('display_order')->get()]);
    }
    public function contact(){
        return view('contact');
    }
}
