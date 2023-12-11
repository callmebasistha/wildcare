<?php

use App\Models\Page;
use Illuminate\Support\Facades\DB;

function getExtension($file)
{
    $fileInfo = $file->getClientOriginalName();
    $explode = explode('.', $fileInfo);
    return end($explode);
}


function getLatestHierarchy($sectionId, $pageId)
{
    $latestHierarchy = DB::table('page_section')->where('page_id', $pageId)->where('section_id')->orderBy('hierarchy', 'DESC')->first();
    if ($latestHierarchy) {
        return $latestHierarchy->hierarchy + 1;
    } else {
        return 1;
    }
}
function pages()
{
    return Page::where('slug', '!=', 'home')->with('parentPage', 'childPages')->get();
}
