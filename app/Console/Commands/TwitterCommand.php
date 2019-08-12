<?php

namespace App\Console\Commands;

use App\Models\Tweet;
use Illuminate\Console\Command;
use Thujohn\Twitter\Facades\Twitter;

class TwitterCommand extends Command
{
    /**
     * The name and signature of the console command.
     * run the command in server of local vagrant@homestead if you want get new tweet ,
     * for auto run command with timer see : https://www.ostechnix.com/a-beginners-guide-to-cron-jobs/
     * @var string
     */
    protected $signature = 'tweet:get';     //run the command in server of local vagrant@homestead

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'serch tweets with title (pc of laptop of mobile';

    /**
     * The type of social post we are importing
     */
    CONST TYPE = 'twitter';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // get tweets from tweets from Samsung ,,,
        $samsungTweet = Twitter::getUserTimeline([
            'screen_name' => 'samsung',
            'count' => 5,
            'text' => 'mobile',
            'format' => 'array'
        ]);
        // get tweets from tweets from iphone ,,,
        $iphoneTweet = Twitter::getUserTimeline([
            'screen_name' => 'iPhone_News',
            'count' => 5,
            'text' => 'mobile',
            'format' => 'array'
        ]);
        // merge twee array tweets
        $tweets = array_merge($samsungTweet, $iphoneTweet);


        $this->info('Found: ' . count($tweets) . ' Tweets');   // Count tweets 1 ,2 ,3 ,,,, form more Ifo

        $bar = $this->output->createProgressBar(count($tweets));

        //get Last saved tweet and get it's timestamp
        $lastPost = Tweet::getLastPost();
        if (!empty($lastPost[0])) {
            $lastImportedTweetTimestamp = strtotime($lastPost[0]->post_date);
        } else {
            $lastImportedTweetTimestamp = 0000;
        }
        //Counter to count how much we imported
        $importedCount = 0;
        foreach ($tweets as $tweet) {
            $timestamp = strtotime($tweet['created_at']);
            if ($timestamp > $lastImportedTweetTimestamp) {
                $this->saveSocialPost($tweet);
                $importedCount++;
            }
            $bar->advance();
        }
        $bar->finish();
        $this->output->newLine();
        $this->info('Imported: ' . $importedCount . ' Tweets');
    }

    /**
     * Saves the data to the database
     *
     * @param $data
     * @return bool
     */
    private function saveSocialPost($data)
    {
        $newSocial = new Tweet();
        $newSocial->post_title = trim(preg_replace('/\s\s+/', ' ', $data['text']));
        $newSocial->post_type = 'tweet';
        $newSocial->post_date = strtotime($data['created_at']);
        $newSocial->post_date_gmt = strtotime($data['created_at']);
        $newSocial->post_content = '';
        $newSocial->post_excerpt = '';
        $newSocial->to_ping = '';
        $newSocial->pinged = '';
        $newSocial->post_content_filtered = '';
        $state = $newSocial->save();
        $newSocial->createMeta([
            'url' => 'https://twitter.com/' . $data['user']['screen_name'] . '/status/' . $data['id']
        ]);

        return $state;
    }

}
