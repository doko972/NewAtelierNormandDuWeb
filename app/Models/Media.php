<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['filename', 'path', 'alt_fr', 'alt_en', 'type', 'page_id'];
    protected $table = 'medias';

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
