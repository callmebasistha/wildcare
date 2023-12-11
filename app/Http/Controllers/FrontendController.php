<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome()
    {
        $sliders = Slider::with('media')->get();
        $landingPageData = Page::where('slug', 'home')->with('sections', 'sections.childSections')->first();
        return view('frontend.pages.landing', compact("sliders", "landingPageData"));
    }


    public function pageDetail($slug)
    {
        $page = Page::where('slug', $slug)->with('sections', 'sections.childSections')->first();
        if ($page) {
            return view('frontend.pages.pageDetail', compact('page'));
        } else {
            abort(404);
        }
    }
    public function sectionDetail($slug)
    {
        $section = Section::where('slug', $slug)->with('childSections')->first();
        if ($section) {
            return view('frontend.pages.sectionDetail', compact('section'));
        } else {
            abort(404);
        }
    }
}
