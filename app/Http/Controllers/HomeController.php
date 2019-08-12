<?php

namespace App\Http\Controllers;

use App\Models\Desktop;
use App\Models\Laptop;
use App\Models\Page;
use App\Models\Telefoon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller {

    public function __invoke()
    {
        /*
         * The Pageurl trait includes a homepage method wich get the ID of the page from the WP_options table
         */
        $page = Cache::remember('home-page', 60, function () {
            $page = Page::published()->slug('home')->first();

            return $page;
        });

        $all = Cache::remember('all', 60, function () {
            $laptop = Laptop::published()->orderBy('post_date', 'DESC')->get();
            $telefoon = Telefoon::published()->orderBy('post_date', 'DESC')->get();
            $desktop = Desktop::published()->orderBy('post_date', 'DESC')->get();

            $all = $desktop->merge($telefoon)->merge($laptop);
            return $all;
        });

        return view('home', compact('page','all'));
    }

}
