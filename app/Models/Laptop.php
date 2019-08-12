<?php

namespace App\Models;

use Corcel\Model\Post as Corcel;

class Laptop extends Corcel
{
    protected $postType = 'laptop';

    /**
     * Full URL to a post object
     * @return string
     */
    public function getUrlAttribute()
    {
        $url = route('laptop.details', ['slug' => $this->slug]);

        return $url;
    }
}

