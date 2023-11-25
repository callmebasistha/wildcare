<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use App\Rules\FileValidation;
use Illuminate\Http\Request;
use Throwable;
use Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::with('page', 'parentSection')->paginate(10);
        return view('backend.pages.section.index', compact('sections'));
    }


    public function createForm()
    {
        $pages = Page::where('status', 1)->get();
        $sections = Section::where('status', 1)->where('section_id', null)->get();
        return view('backend.pages.section.createForm', compact('pages', 'sections'));
    }


    public function store(Request $request)
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
            'title' => ['required'],
            'detailed_description' => ['required'],
            'pages' => ['required'],
            'file' => [array_key_exists('file', $data) ? new FileValidation([$data['file']], $validExtensions, $size) : '']
        ]);

        try {

            DB::transaction(function () use ($data) {
                $data['slug'] = Str::slug($data['title'], '-');
                $section = Section::create($data);
                if (array_key_exists('pages', $data)) {
                    foreach ($data['pages'] as $page) {
                        if ($section['section_id'] == null) {
                            $sectionId = $section['id'];
                        } else {
                            $sectionId = $section['section_id'];
                        }
                        DB::table('page_section')->insert(
                            [
                                'page_id' => $page,
                                'section_id' => $sectionId,
                                'hierarchy' => getLatestHierarchy($sectionId, $page)
                            ]
                        );
                    }
                }
                if (array_key_exists('file', $data)) {
                    $section->addMedia($data['file'])->toMediaCollection('file');
                }
            });
            Alert::toast('Section Added', 'success');
            return back();
        } catch (Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return back();
        }
    }


    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        if ($section) {
            try {
                DB::transaction(function () use ($section) {
                    DB::table('page_section')->where('section_id', $section->id)->delete();
                    Section::where('section_id', $section->id)->update(['section_id' => null]);
                    $section->delete();
                });
                Alert::toast('Section Deleted', 'success');
                return back();
            } catch (Throwable $e) {
                Alert::toast($e->getMessage(), 'error');
                return back();
            }
        }
        abort(404);
    }
}
