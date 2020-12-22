<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {


    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
        Route::get('login', 'AdminController@get_login_page')->name('admin.login');
        Route::post('admin/login', 'AdminController@admin_login_info')->name('admin.info');
    });

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('dashboard', 'AdminController@get_dashboard')->name('dashboard');
        Route::get('profile/{id}', 'AdminController@get_admin_profile')->name('admin.profile');
        Route::post('edit/{id}', 'AdminController@edit_admin_profile')->name('admin.edit');
        Route::get('changepassword', 'AdminController@edit_admin_password_page')->name('edit.password.page');
        Route::post('changepassword', 'AdminController@edit_admin_password')->name('edit.password');


        Route::group(['prefix' => 'settings'], function () {
            Route::get('shippings/{type}', 'AdminController@shipping_method')->name('shippings.methods');
            Route::post('shippings/{id}', 'AdminController@shipping_edit_method')->name('shippings.edit');
        });

        Route::get('logout', 'AdminController@admin_logout')->name('logout');
    });
});



