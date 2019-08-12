<?php

namespace App\Models;

use Corcel\Model\Post as Corcel;
use WP4Laravel\Corcel\Pageurl;

/*
 * Model for WP pages
 */
class Page extends Corcel
{
    //  The Pageurl trait has a method to find a page based on the full url.
    use Pageurl;


    /**
     * What is the WP post type for this model?
     * @var string
     */
    protected $postType = 'page';
}
