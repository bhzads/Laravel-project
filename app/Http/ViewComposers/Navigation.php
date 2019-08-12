<?php

namespace App\Http\ViewComposers;

use Corcel\Model\Menu;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use WP4Laravel\Facades\MenuBuilder;

class Navigation
{
    public function compose(View $view)
    {
        $currentUrl = $_SERVER['REQUEST_URI'];

        // get primary menu
        $menuPrimary = MenuBuilder::itemsIn(Menu::slug('menu-primary')->first());
        foreach ($menuPrimary as &$item) {                  //add & for $item now we can edit item in the array
            $item->active = false;
            // check if currentUrl is home (/) and menu item url is home(/) then Home active class is true
            if ($currentUrl === "/" && $item->url === "/") {
                $item->active = true;
            } else {
                // check if currentURL is not Home (/) and menu item url is not Home (/) and find itemURL in CurrentURL
                // is true then this menu item Active class is true
                if ($currentUrl !== '/' && $item->url !== "/" && strpos($currentUrl, $item->url) !== false) {
                    $item->active = true;
                }
            }
        }
        $menu = [
            'primary' => $menuPrimary
        ];

        $view->with('menu', $menu);
    }

}
