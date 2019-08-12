<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Support\Facades\Cache;

class LaptopController extends Controller
{
    /**
     * show all
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $laptop = Cache::remember('laptop', 60, function () {

            $laptop= Laptop::published()->orderBy('post_date', 'DESC')->get();

            return $laptop ;
        });

        return view('laptop', compact('laptop'));
    }

    /**
     * show all items for specific brand (taxonomy->merk)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function brand($brand)
    {

        $laptop = Cache::remember('laptop-'.$brand , 60, function () use ($brand) {

            $laptop= Laptop::published()->taxonomy('merk', $brand)->get();

            return $laptop ;
        });

        return view('laptop', compact('laptop'));
    }

    /**
     * show detail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $laptop = Cache::remember('laptop-'. $slug, 60, function () use ($slug) {

            $laptop= Laptop::published()->slug($slug)->firstorfail();

            return $laptop ;
        });


        return view('details-laptop', compact('laptop'));
    }
}
