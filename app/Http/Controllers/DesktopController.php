<?php

namespace App\Http\Controllers;

use App\Models\Desktop;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;


class DesktopController extends Controller
{
    /**
     * show all
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $page = Cache::remember('desktop-page', 60, function () {
            $page = Page::published()->slug('desktop')->first();

            return $page;
        });


        $desktop = Cache::remember('desktop', 60, function () {

            $desktop = Desktop::published()->orderBy('post_date', 'DESC')->get();

            return $desktop ;
        });

        return view('desktop', compact('desktop','page'));
    }

    /**
     * show all items for specific brand (taxonomy->merk)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function brand($brand)
    {
        $desktop = Cache::remember('desktop-'.$brand , 60, function () use ($brand) {

            $desktop = Desktop::published()->taxonomy('merk', $brand)->get();

            return $desktop ;
        });


        return view('desktop', compact('desktop'));
    }

    /**
     * show detail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $desktop = Cache::remember('desktop-' . $slug, 60, function () use ($slug) {

            $desktop = Desktop::published()->slug($slug)->firstorfail();

            return $desktop ;
        });


        return view('details-desktop', compact('desktop'));
    }
}
