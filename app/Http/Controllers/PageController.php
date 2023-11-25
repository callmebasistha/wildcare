<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Support\Str;
use Alert;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::with('parentPage')->paginate(10);
        return view('backend.pages.page.index', compact('pages'));
    }


    public function createForm()
    {
        $pages = Page::where('status', '1')->get();
        $sections = Section::where('status', 1)->where('section_id', null)->get();
        return view('backend.pages.page.createForm', compact('pages', 'sections'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'title' => ['required'],
        ]);

        try {
            DB::transaction(function () use ($data) {
                $data['slug'] = Str::slug($data['title'], '-');
                $page = Page::create($data);
                if (array_key_exists('sections', $data)) {
                    foreach ($data['sections'] as $section) {

                        DB::table('page_section')->insert([
                            'page_id' => $page['id'],
                            'section_id' => $section,
                            'hierarchy' => getLatestHierarchy($section, $page['id'])
                        ]);
                    }
                }
            });
            Alert::toast('Page Added', 'success');
            return back();
        } catch (Throwable $e) {
            Alert::toast($e->getMessage(), 'error');
            return back();
        }
    }


    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        if ($page) {
            try {
                DB::transaction(function () use ($page) {
                    DB::table('page_section')->where('page_id', $page->id)->delete();
                    Page::where('page_id', $page->id)->update(['page_id' => null]);
                    $page->delete();
                });
                Alert::toast('Page Deleted', 'success');
                return back();
            } catch (Throwable $e) {
                Alert::toast($e->getMessage(), 'error');
                return back();
            }
        }
        abort(404);
    }
}
