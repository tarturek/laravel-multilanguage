<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function() {

        Route::group([
                'prefix' => 'admin'
            ],

            function () {

                Route::get('/index', 'Admin\AdminController@index')->name('admin.index');

               //Route::get(LaravelLocalization::transRoute('routes.settings'), 'Admin\AdminController@show')->name('admin.index');

                Route::resource('settings', 'Admin\SettingController');
                Route::resource('mainpagesettings', 'Admin\MainpageSettingController');
                Route::resource('page', 'Admin\PageController');
            }

        );

    });





Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/home', 'HomeController@index')->name('home');

        Auth::routes();


        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/










        /*Route::get(LaravelLocalization::transRoute('routes.yeni').'/', 'YeniController@index')->name('yeni');*/
        //lang/(dil)/routes.php içerisinde url dil yapısı için çeviriler
    });