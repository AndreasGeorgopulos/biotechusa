<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['web']], function () {
    Route::match(['get', 'post'], '/login', 'AdminController@Login')->name('admin_login');
    Route::match(['get'], '/logout', 'AdminController@Logout')->name('admin_logout');

    Route::group(['middleware' => ['web','admin']], function () {
        // Kezdőlap
        Route::match(['get'], '/', function () {
            return redirect(route('admin_dashboard'));
        });
        Route::match(['get'], '/dashboard', 'AdminController@Dashboard')->name('admin_dashboard');

        Route::resource('/campaigns', 'CampaignController');
        Route::resource('/products', 'ProductController');
        Route::resource('/posts', 'PostController');
        Route::resource('/coupons', 'CouponController');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
