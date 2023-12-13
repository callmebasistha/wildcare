<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'page_id',
        'status',
        'is_nav_page',
        'is_footer_link'
    ];


    public function parentPage()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
    public function childPages()
    {
        return $this->hasMany(Page::class);
    }
    public function sections()
    {
        return $this->belongsToMany(Section::class)->with('media');
    }
}
