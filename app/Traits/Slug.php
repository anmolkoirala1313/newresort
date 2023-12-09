<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait Slug {

    /**
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ],

        ];
    }

    public function changeTokey($title)
    {
        return Str::slug($title);
    }
}
