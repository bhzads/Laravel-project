<?php

namespace App\Http\Controllers;

use App\Models\Telefoon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TelefoonController extends Controller
{
    /**
     * show all
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $telefoon = Cache::remember('telefoon', 60, function () {

            $telefoon= Telefoon::published()->orderBy('post_date', 'DESC')->get();

            return $telefoon ;
        });


        return view('telefoon', compact('telefoon'));
    }

    /**
     * show all items for specific brand (taxonomy->merk)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function brand($brand)
    {
        $telefoon = Cache::remember('telefoon-'.$brand , 60, function () use ($brand) {

            $telefoon= Telefoon::published()->taxonomy('merk', $brand)->get();

            return $telefoon ;
        });

        return view('telefoon', compact('telefoon'));
    }

    /**
     * show detail
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($slug)
    {
        $telefoon = Cache::remember('telefoon-'. $slug, 60, function () use ($slug) {

            $telefoon= Telefoon::published()->slug($slug)->firstorfail();

            return $telefoon ;
        });

        return view('details-telefoon', compact('telefoon'));
    }
}
