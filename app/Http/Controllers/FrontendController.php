<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home(){
        return view('welcome');
    }
    public function about(){
        return view('about');
    }
    public function programmes(){
        return view('programmes');
    }
    public function publications(){
        return view('publications');
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
