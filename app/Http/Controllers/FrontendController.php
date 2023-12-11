<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome()
    {
        $sliders = Slider::with('media')->get();
        $pages = Page::with('parentPage', 'childPages')->get();
        $landingPageData = Page::where('slug', 'home')->with('sections', 'sections.childSections')->first();
        return view('frontend.pages.landing', compact("sliders", "pages", "landingPageData"));
    }


    public function pageDetail($slug)
    {
        $page = Page::where('slug', $slug)->with('sections', 'sections.childSections')->first();
        if ($page) {
            dd($page);
        } else {
            abort(404);
        }
    }
}
