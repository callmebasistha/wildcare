<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::paginate(10);

        return view('backend.pages.page.index', compact('pages'));
    }


    public function createForm()
    {
        $pages = Page::where('status', '1')->get();
        $sections = [];

        return view('backend.pages.page.createForm', compact('pages', 'sections'));
    }
}
