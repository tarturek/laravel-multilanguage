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
use Illuminate\Support\Facades\App;

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/yeni','YeniController@index')->name('yeni');
Route::post('ulkekayit','YeniController@store')->name('ulke.store');

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
        ],
        function()
                    {
                        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

                        Route::get('/', function () {
                            return view('welcome');
                        });


                        Route::get('/home', 'HomeController@index')->name('home');

                        Route::get(LaravelLocalization::transRoute('routes.yeni').'/', 'YeniController@index')->name('yeni');


                        Route::get(LaravelLocalization::transRoute('routes.diller') . '/', 'YeniController@diller')->name('diller');
                        //lang/(dil)/routes.php içerisinde url dil yapısı için çeviriler
                    });





