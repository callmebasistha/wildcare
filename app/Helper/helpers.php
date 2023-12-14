<?php

use App\Models\ContactInfo;
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
function navPages()
{
    return Page::where('slug', '!=', 'home')->where('status', true)->with('parentPage', 'childPages')->get();
}

function footerPages()
{
    return Page::where('slug', '!=', 'home')->where('status', true)->where('is_footer_link', true)->with('parentPage', 'childPages')->get();
}
function contactInfos()
{
    return ContactInfo::get();
}
