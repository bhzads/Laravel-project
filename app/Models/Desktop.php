<?php

namespace App\Models;

use Corcel\Model\Post as Corcel;

class Desktop extends Corcel
{
    protected $postType = 'desktop';

    /**
     * Full URL to a post object
     * @return string
     */
    public function getUrlAttribute()
    {
        $url = route('desktop.details', ['slug' => $this->slug]);

        return $url;
    }

}
