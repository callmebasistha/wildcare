<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Section extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title', 'sub_title', 'short_description', 'detailed_description', 'section_id', 'status', 'slug'
    ];


    public function page()
    {
        return $this->belongsToMany(Page::class);
    }

    public function parentSection()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function childSections()
    {
        return $this->hasMany(Section::class)->with('childSections', 'media');
    }
}
