<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Support\Facades\Cache;

class TwitterController extends Controller
{
    /**
     * show all
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $tweets = Cache::remember('tweets', 60, function () {

            $tweets = [];
            $tweetsRaw = Tweet::published()->orderBy('post_date', 'DESC')->limit(10)->get();

            foreach ($tweetsRaw as $tweet) {
                $tweets[] = \App\Models\Tweet::getTweet($tweet);
            }

            return $tweets;
        });

        return view('tweet', compact('tweets'));
    }

}
