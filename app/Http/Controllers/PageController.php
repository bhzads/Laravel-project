<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

/**
 * Catch all routes which are not defined in the routes file
 * Next search for a page which has the same url structure as the route
 * If not found,
 */
class PageController extends Controller
{
    public function show($url)
    {
        abort(404);
        //  Get the post by url or abort
        $post = Page::url($url);

        //  Add post data to the site container
        app('site')->model($post);


        //  Show the template which is possibly chosen in WP
        return view($post->template);
    }
}
