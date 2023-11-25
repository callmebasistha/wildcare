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
        'status'
    ];


    public function parentPage()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
