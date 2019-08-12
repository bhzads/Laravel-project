Configuring cronjob :auto run commands with timer to fetch tweets data .from API :

for more Info : https://www.ostechnix.com/a-beginners-guide-to-cron-jobs/

```crontab -e```

```
m h dom m dow command
5 14 * * * php /home/vagrant/code/my-wp-pre-project/artisan tweet:get >> /dev/null 2&>1
```

============= of beter can use this way ================

Configuring Cron Schedules: Artisan command to be run every minute of (time):
- defined in your App\Console\Kernel class to determine which jobs should be run: 

exp
```
         protected function schedule(Schedule $schedule)
             {
                  $schedule->command('tweet:get')
                           ->everyFiveMinutes();
             }
```
- In homestead.yaml : you may set the  schedule option to true when defining the site , 
 
 exp:
  
```
        -map: my-wp-pre-project.test
          to: /home/vagrant/code/my-wp-pre-project/public
          schedule: true
```
          
For more Info :
 
 https://laravel.com/docs/5.7/homestead#configuring-cron-schedules
 
 https://stackoverflow.com/questions/32141289/cronjob-homestead-not-working

** Schedule Frequency Options**

->cron('* * * * *');

->everyMinute();

->dailyAt('13:00');	Run the task every day at 13:00

https://laravel.com/docs/5.7/scheduling

=========

*** Beheer block maken in wp (header , Info block , Contact , Service .. :

1- wordpress : Comstom Fields -> add New (expo : Contact),

2- Field type -> ( Text , group , wysiwyg , ….)

3-Location: post Type : is equal to : page  -> Update

5- Pages : add new page exp(Contact)

6-top right click (Screen option ) -> slug,

7- down op this page slug (home) “you can see page name in code routes -> web”

8- full what you want and  Publish

9- In the Code : 

10- check if page model is good ( protected $postType = 'page’;)

11- HomeController add ( $page = Page::published()->slug('home')->first(); )

12- view ->home.blade -> add what you want from ACF :

```
<div>
    {{$page->meta->header_title}}
    <img class="card-img-top" src="{{$page->acf->Image('header_image')->url}}" alt="Card image cap">
</div>
<div class="">
    <h5 class="">{!! nl2br($page->meta->contact)!!}</h5>
</div>
```
Beheer Special block maken in wp  for special page via Page Templat( Special block):

1-Add Templat :  in de code :public-> themes -> wp4laravel -> add folder (templates ) -> Specialpage.php :
	```
	
	<?php
	/*
	 * Template Name: Homepage
	 */

2-wordpress : Comstom Fields -> add New (expo : Special block),

2- Field type -> ( Text , group , wysiwyg , ….)

3-Location: post Template : is equal to : Specialpage

4-Update

5- Pages : add new page exp(Specialpage)

6-top right click (Screen option ) -> slug,

7- down op this page slug (desktop) “you can see page name in code routes -> web” 

8-Right column Tempalt -> Specialpage -> publish

9- In the Code : 

10- check if page model is good ( protected $postType = 'page’;)


11- DesktopController add ( $page = Page::published()->slug(‘desktop’)->first(); )

12- view ->desktop.blade -> add what you want from ACF :
```
<div>
    {{$page->meta->header_title}}
    <img class="card-img-top" src="{{$page->acf->Image('header_image')->url}}" alt="Card image cap">
</div>
<div class="">
    <h5 class="">{!! nl2br($page->meta->contact)!!}</h5>
</div>
```
=========================

*** Cashe:clear buton In Wordpress maken :

1- thems -> wp4laravel -> library -> admin -> cache.php :
```$xslt
<?php

add_action('admin_bar_menu', function ($wp_admin_bar) {
    $args = array(
        'id' => 'release-cache',
        'title' => 'Release cache',
        'href' => '#',
        'meta' => array(
            'class' => 'custom-button-class'
        )
    );
    $wp_admin_bar->add_node($args);
}, 50);

add_action('admin_head', function () {
    ?>
    <script>
        jQuery(document).ready(function() {
            jQuery('#wp-admin-bar-release-cache').on('click', function(e) {
                e.preventDefault();
                
                jQuery.get('/api/cache', function(data) {
                    alert(data);
                });
            });
        });
    </script>
<?php

});
```
2- Routes -> api.php :
```$xslt
//	Flush cache
Route::get('cache', 'Api\CacheController');
```
3- Http -> Controllers -> api -> CacheController.php :
```$xslt
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
```

========

*** Use Cache::remember with Function ****

Normal :
```angular2
 $desktop = Desktop::published()->orderBy('post_date', 'DESC')->get();
```
User Cache:
```angular2
        $desktop = Cache::remember('desktop', 60, function () {

            $desktop = Desktop::published()->orderBy('post_date', 'DESC')->get();

            return $desktop ;
        });
```
