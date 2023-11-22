<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Rules\FileValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $validExtensions = ['jpg', 'png', 'jpeg', 'mp4', 'webp', 'ogg', 'gif'];
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
        if ($slider) {
            $slider->delete();
            Alert::toast('Slider Deleted', 'success');
            return back();
        }
        abort(404);
    }

    function update(Request $request, $id)
    {
        $data = $request->all();
        if (array_key_exists('file', $data)) {
            $validExtensions = ['jpg', 'png', 'jpeg', 'mp4', 'webp', 'ogg'];
            $size = 4; //file size in MB
            $extension = getExtension($data['file']);
            if ($extension == 'mp4' || $extension == 'ogg') {
                $size = 150;
            }
            $commonControlle = new CommonController();
            $validationResponse = $commonControlle->customValidation($data, [
                'file' => new FileValidation([$data['file']], $validExtensions, $size)
            ]);
            if (!$validationResponse['status']) {
                Alert::error('Validation Error', $validationResponse['message'], 'error');
                return back();
            }
        }

        try {
            $param = Arr::except($data, ['_token', 'file']);
            $slider = Slider::where('id', $id)->first();
            $slider->update($param);
            if (array_key_exists('file', $data)) {
                if ($slider->hasMedia('slider')) {
                    $slider->getMedia('slider')[0]->delete();
                    $slider->addMedia($data['file'])->toMediaCollection('slider');
                }
            }
            Alert::toast('Slider Updated!', 'success');
            return back();
        } catch (Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return back();
        }
    }
}
