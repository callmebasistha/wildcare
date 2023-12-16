<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;

class ContactInfoController extends Controller
{
    function index()
    {

        return view('backend.pages.contactInfo.index');
    }
    function saveContactInfo(Request $request)
    {
        $data = $request->except("_token");
        try {
            DB::transaction(function () use ($data) {

                //code...
                ContactInfo::truncate();

                foreach ($data as $key => $datum) {
                    $insert['label'] = $key;
                    $insert['value'] = implode(",", array_filter($data[$key]));
                    ContactInfo::create($insert);
                }
                Alert::toast('success');
            });
        } catch (\Throwable $th) {
            dd($th);
            Alert::toast($th->getMessage(), 'error');
        }
        return back();
    }
}
