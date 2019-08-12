<?php

namespace App\Models;

use Corcel\Model\Post as Corcel;

class Telefoon extends Corcel
{
    protected $postType = 'telefoon';

    /**
     * Full URL to a post object
     * @return string
     */
    public function getUrlAttribute()
    {
        $url = route('telefoon.details', ['slug' => $this->slug]);

        return $url;
    }
}

