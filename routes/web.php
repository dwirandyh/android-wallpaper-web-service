<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->get('/v1/popular', 'WallpaperController@popularWallpaper');
$router->get('/v1/wallpaper', 'WallpaperController@wallpaperItems');

$router->post('/v1/wallpaper/{id}/view', 'WallpaperController@addWallpaperView');
$router->post('/v1/wallpaper/{id}/download', 'WallpaperController@addWallpaperDownload');

$router->get('/v1/category', 'CategoryController@categories');
$router->get('/v1/category/{id}', 'CategoryController@getCategoryById');
$router->get('/v1/category/{id}/wallpaper', 'CategoryController@wallpaperById');


$router->get('/v1/update', 'UpdateController@doUpdate');
