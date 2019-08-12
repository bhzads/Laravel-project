<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

/**
 * Api for fetching Wordpress Categories
 */
class CacheController extends Controller
{
    /**
     * All request come into the invoke method and returns all categories
     * @return Response
     */

    public function __invoke()
    {
        Cache::flush();

        return 'The cache is released';
    }
}
