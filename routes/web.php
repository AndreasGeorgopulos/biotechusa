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

        // Cache ürítés
        Route::match(['get'], '/clear_cache', 'AdminController@ClearCache')->name('admin_clear_cache');

        // Users
        Route::match(['get'], '/users', 'UserController@index')->name('admin_users_index');
        //Route::match(['get', 'post'], '/users/create', 'UserController@create')->name('admin_users_create');
        //Route::match(['get', 'post'], '/users/edit/{id}', 'UserController@edit')->name('admin_users_edit');

    });
});

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
