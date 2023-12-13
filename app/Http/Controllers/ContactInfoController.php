<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    function index()
    {
        return view('backend.pages.contactInfo.index');
    }
    function saveContactInfo(Request $request)
    {
        $data = $request->all();
    }
}
