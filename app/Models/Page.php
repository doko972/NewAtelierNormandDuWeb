<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title_fr',
        'title_en',
        'body_fr',
        'body_en',
        'meta_title_fr',
        'meta_title_en',
        'meta_description_fr',
        'meta_description_en',
        'is_published',
        'order',
    ];

    protected $casts = ['is_published' => 'boolean'];

    public function medias()
    {
        return $this->hasMany(Media::class);
    }
}
