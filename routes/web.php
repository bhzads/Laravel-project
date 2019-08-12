<?php

///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/

// Homepage
Route::get('/', ['as' => 'home', 'uses' => 'HomeController']);
// Desktop
Route::get('/desktop', ['as' => 'desktop', 'uses' => 'DesktopController@index']);
Route::get('/desktop/merk/{brand}', ['as' => 'desktop.brand', 'uses' => 'DesktopController@brand']);
Route::get('/desktop/{slug}', ['as' => 'desktop.details', 'uses' => 'DesktopController@show']);
// Laptop
Route::get('/laptop', ['as' => 'laptop', 'uses' => 'LaptopController@index']);
Route::get('/laptop/merk/{brand}', ['as' => 'laptop.brand', 'uses' => 'LaptopController@brand']);
Route::get('/laptop/{slug}', ['as' => 'laptop.details', 'uses' => 'LaptopController@show']);
// Telefoon
Route::get('/telefoon', ['as' => 'telefoon', 'uses' => 'TelefoonController@index']);
Route::get('/telefoon/merk/{brand}', ['as' => 'telefoon,brand', 'uses' => 'TelefoonController@brand']);
Route::get('/telefoon/{slug}', ['as' => 'telefoon.details', 'uses' => 'TelefoonController@show']);
// Tweet
Route::get('/tweet', ['as' => 'tweet', 'uses' => 'TwitterController@index']);

//
//Route::get('/tweet', function()  // only test data from api Calling
//{
//    $samsung = Twitter::getUserTimeline(['screen_name' => 'samsung', 'count' => 5, 'text' =>'mobile', 'format' => 'array']);
//    $iphone = Twitter::getUserTimeline(['screen_name' => 'iPhone_News', 'count' => 5, 'text' =>'mobile', 'format' => 'array']);
//    $tweets = array_merge($samsung, $iphone);
//    return  $tweets;
//
//});

Route::get('{url}', 'PageController@show')->where('url', '(.*)')->name('page.show');


