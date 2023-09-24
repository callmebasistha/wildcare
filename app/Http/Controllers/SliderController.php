<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Rules\FileValidation;
use Illuminate\Http\Request;
use Throwable;
use Alert;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->with('media')->cursorPaginate(10);

        return view('backend.pages.sliders.index', compact('sliders'));
    }

    function store(Request $request)
    {
        $data = $request->all();
        $validExtensions = ['jpg', 'png', 'jpeg', 'mp4', 'webp', 'ogg'];
        $size = 4; //file size in MB
        if (array_key_exists('file', $data)) {
            $extension = getExtension($data['file']);
            if ($extension == 'mp4' || $extension == 'ogg') {
                $size = 150;
            }
        }
        $request->validate([
            'file' => ['required', array_key_exists('file', $data) ? new FileValidation([$data['file']], $validExtensions, $size) : '']
        ]);
        try {
            $slider = Slider::create($data);
            if (array_key_exists('file', $data)) {
                $slider->addMedia($data['file'])->toMediaCollection('slider');
            }
            Alert::toast('Slider Added', 'success');
            return back();
        } catch (Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return back();
        }
    }


    function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        if($slider){
            $slider->delete();
            Alert::toast('Slider Deleted','success');
            return back();
        }
        abort(404);

    }
}
