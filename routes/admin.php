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

    #######################################  Admin Routes  #######################################
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
        #######################################  End Admin Routes  #######################################


        #######################################  Categories Routes  #######################################
        Route::get('categories', 'CategoryController@show_all_categories')->name('admin.categories');
        Route::get('create/category/page', 'CategoryController@get_create_category_page')->name('admin.category.page');
        Route::post('create/category', 'CategoryController@create_category')->name('admin.create.category');
        Route::get('update/category/page/{id}', 'CategoryController@get_update_category_page')->name('admin.update.category.page');
        Route::post('update/category/{id}', 'CategoryController@update_category')->name('admin.update.category');
        Route::get('delete/category/{id}', 'CategoryController@delete_category')->name('admin.delete.category');

        #######################################  End Categories Routes  ###################################

        #######################################  Subcategories Routes  #######################################
        Route::group(['prefix'=>'subcategory'], function (){
            Route::get('subcategories', 'SubCategoryController@show_all_subcategories')->name('admin.subcategories');
            Route::get('create/subcategory/page', 'SubCategoryController@get_create_subcategory_page')->name('admin.subcategory.page');
            Route::post('create/subcategory', 'SubCategoryController@create_subcategory')->name('admin.create.subcategory');
            Route::get('update/subcategory/page/{id}', 'SubCategoryController@get_update_subcategory_page')->name('admin.update.subcategory.page');
            Route::post('update/subcategory/{id}', 'SubCategoryController@update_subcategory')->name('admin.update.subcategory');
            Route::get('delete/subcategory/{id}', 'SubCategoryController@delete_subcategory')->name('admin.delete.subcategory');
        });

        #######################################  End subcategories Routes  ###################################
    });
});



