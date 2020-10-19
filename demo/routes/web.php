<?php

use Illuminate\Support\Facades\Auth;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::resource('product', 'ProductController',[
        'names' => [
            'index' => 'product',
        ]
    ]);
    Route::get('product/image-upload/{id}', 'ProductController@imageUpload')->name('product.image');
    Route::post('product/image-upload/{id}', 'ProductController@imageUploadPost')->name('product.image.post');

    Route::resource('filling', 'FillingController',[
        'names' => [
            'index' => 'filling',
        ]
    ]);
    Route::get('filling/image-upload/{id}', 'FillingController@imageUpload')->name('filling.image');
    Route::post('filling/image-upload/{id}', 'FillingController@imageUploadPost')->name('filling.image.post');

    Route::resource('shape', 'ShapeController',[
        'names' => [
            'index' => 'shape',
        ]
    ]);
    Route::get('shape/image-upload/{id}', 'ShapeController@imageUpload')->name('shape.image');
    Route::post('shape/image-upload/{id}', 'ShapeController@imageUploadPost')->name('shape.image.post');

    Route::resource('decoration', 'DecorationController',[
        'names' => [
            'index' => 'decoration',
        ]
    ]);
    Route::get('decoration/image-upload/{id}', 'DecorationController@imageUpload')->name('decoration.image');
    Route::post('decoration/image-upload/{id}', 'DecorationController@imageUploadPost')->name('decoration.image.post');
});
Route::get('/','SiteController@index');
Route::get('/login','LoginController@index')->name('login');
Route::post('/create','LoginController@create')->name('login.create');
Route::get('logout','LoginController@logout')->name('login.logout');
Route::get('/addnewuser','LoginController@addnewuser')->name('login.addnewuser');
Route::post('addnewuserstore','LoginController@addnewuserstore')->name('login.addnewuserstore');
Route::get('createcake','SiteController@createCake')->name('createCake');
Route::post('addCustomizeCake' , 'SiteController@addCustomizeCake')->name('addCustomizeCake');
Route::post('addToCartProduct','SiteController@addToCartProduct')->name('addToCartProduct');
Route::post('clearCart','SiteController@clearCart')->name('clearCart');
Route::get('test', 'SiteController@test');
Route::get('product','SiteController@product')->name('site.product');
Route::get('product/view/{id}','SiteController@viewProduct')->name('site.view');
Route::get('/cart','SiteController@cart')->name('cart');


