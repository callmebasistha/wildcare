<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome()
    {
        $sliders = Slider::with('media')->get();
        return view('frontend.pages.landing', compact("sliders"));
    }
}
