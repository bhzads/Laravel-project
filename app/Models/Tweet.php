<?php

namespace App\Models;

/*
 * Model for WP pages
 */

use Corcel\Model\Post as Corcel;

class Tweet extends Corcel
{
    /**
     * What is the WP post type for this model?
     * @var string
     */
    protected $postType = 'tweet';

    /**
     * Returns the last post for a type
     *
     * @param $type
     * @return mixed
     */
    public static function getLastPost()
    {
        return self::published()->latest('post_date')->take(1)->get();
    }

    public static function getTweet($post)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,
            'https://publish.twitter.com/oembed?url=' . urlencode($post->meta->url) . '&omit_script=true&hide_thread=true');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Timeout in seconds
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);
        $html = json_decode($result)->html;
        return $html;
    }
}
