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



// Route::get('/contact', function () {
//     return view('frontend.contact');
// });

// use Illuminate\Routing\Route;

Auth::routes();


//routes for admin
Route::get('/home', 'AdminController@home')->name('admin.home')->middleware('auth');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin',], function () {
    Route::get('/admin', 'AdminController@home');
    Route::get('/contact', 'ContactusController@index');
    Route::post('contact_info/update/{id}', 'ContactusController@update');
    // about page content 
    Route::get('/about', 'AboutController@index');
    Route::post('/update/about_content/{id}', 'AboutController@update_about_content');
    // team update 
    Route::post('update/team/{id}', 'AboutController@update_team');
    Route::post('add/funfact/', 'AboutController@addFact');
    Route::get('funfact/delete/{id}', 'AboutController@deleteFact');

    // home page 

    Route::get('/home', 'HomeController@homeSetting');
    Route::post('/home/update/{id}', 'HomeController@updatehomeSetting');

    //=============product option ============//
    Route::get('/products' , 'ProductController@index');
    Route::get('products/create' , 'ProductController@create');
    Route::post('products/store' , 'ProductController@store');
    Route::get('product/edit/{id}' , 'ProductController@edit');
    Route::post('products/update/{id}' , 'ProductController@update');
    Route::get('product/delete/{id}' , 'ProductController@destroy');


    //=============collection option ============//
    Route::get('/collection' , 'CollectionController@index');
    Route::post('collection/store/', 'CollectionController@store');
    Route::get('collection/delete/{id}', 'CollectionController@destroy');


    Route::get('orders', 'OrderManageController@index');
    Route::get('orders/view/{id}', 'OrderManageController@view');
    Route::get('orders/delete/{id}', 'OrderManageController@destroy');

});

Route::get('/', 'HomeController@index');
Route::get('/contact', 'HomeController@contact');
Route::get('/about', 'HomeController@about');
Route::get('product/{slug}', 'HomeController@single_product');
Route::get('shop/{shop}', 'HomeController@single_collection');

  //============= Order option ============//
Route::get('order/{id}', 'OrderController@index');
Route::post('order/store', 'OrderController@store')->name('order.save');

Route::get('pay-with-paypal', 'PayPalController@payment')->name('payple.payment');
Route::get('payple/cancel', 'PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'PayPalController@success')->name('payment.success');
// Route::get('order/{order}/thanks', 'PayPalController@thanks')->name('order.thanks.page');


route::post('contact/me' , 'ContactController@store')->name('contact.me');





Route::get('/clear-cache', function () {
  Artisan::call('cache:clear');
  Artisan::call('view:clear');
  Artisan::call('config:cache');
  return 'cache cleared';
});

Route::get('storage_link', function(){
  Artisan::call('storage:link');
});
