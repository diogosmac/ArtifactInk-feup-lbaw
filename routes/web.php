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

// API
// Authentication

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

Route::get('sign_in', 'Auth\LoginController@showLoginForm')->name('sign_in');
Route::post('sign_in', 'Auth\LoginController@login');
Route::get('sign_out', 'Auth\LoginController@logout')->name('sign_out');
Route::get('sign_up', 'Auth\RegisterController@showRegistrationForm')->name('sign_up');
Route::post('sign_up', 'Auth\RegisterController@register');

//profile
Route::view('recover_password', 'auth/recover_password');

//routes for debugging pages - remove later
Route::get('/', 'ItemController@showHomepage')->name('home'); //todo reply function indide in all pages 

Route::view('search','pages/search');

Route::get('product/{id}', 'ItemController@show');

//profile pages and stuff related 
Route::prefix('profile')->group(function() {
    
    Route::view('/', 'pages/profile/profile');
    
    Route::view('review', 'pages/profile/review');
    
    //Route::view('wishlist', 'pages/profile/wishlist');

    Route::get('wishlist', 'WishlistController@list');

    Route::post('wishlist', 'WishlistController@add_to_wishlist');

    Route::delete('wishlist', 'WishlistController@delete_from_wishlist');

    Route::view('purchased_history', 'pages/profile/purchased_history');
});

// admin routes
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function () {
    // auth
    Route::namespace('Auth')->group(function() {
        Route::get('sign_in', 'LoginController@showLoginForm')->name('sign_in');
        Route::post('sign_in', 'LoginController@login');
        Route::post('sign_out', 'LoginController@logout')->name('sign_out');
    });

    // home
    Route::get('/', 'AdminController@index')->name('home');

    // products routes
    Route::prefix('products')->name('products.')->group(function () {
        // view products
        Route::get('/', 'AdminController@showProducts')->name('home');

        // create product form
        Route::get('add', 'AdminController@showAddProductForm')->name('add');

        // edit product
        // $url = route('profile', ['id' => 1]);
        Route::get('{id}/edit', 'AdminController@showEditProductForm')->where('id', '[0-9]+')->name('edit');
    });

    // categories
    Route::get('categories', 'AdminController@showCategories')->name('categories');

    // orders
    Route::get('orders', 'AdminController@showOrders')->name('orders');

    // reviews
    Route::get('reviews', 'AdminController@showReviews')->name('reviews');

    // users
    Route::get('users', 'AdminController@showUsers')->name('users');

    // sales
    Route::prefix('sales')->name('sales.')->group(function () {
        // view sales
        Route::get('/', 'AdminController@showSales')->name('home');

        // create sale
        Route::get('add', 'AdminController@showAddSaleForm')->name('add');

        // edit sale
        Route::get('{id}/edit', 'AdminController@showEditSaleForm')->where('id', '[0-9]+')->name('edit');
    });

    // newsletter
    Route::get('newsletter', 'AdminController@showNewsletter')->name('newsletter');

    // faqs
    Route::get('faqs', 'AdminController@showFaqs')->name('faqs');

    
    // info
    Route::get('info', 'AdminController@showInfo')->name('info');

    
    // support message
    Route::get('support_chat', 'AdminController@showSupportChat')->name('support_chat');
});


//shopping cart and checkout 
/*Route::get('cart', function () {
    return view('pages.cart');
});*/
Route::get('cart', 'CartController@list');
Route::post('cart', 'CartController@add_to_cart');
Route::delete('cart', 'CartController@delete_from_cart');
Route::put('cart', 'CartController@update_item_quantity');

Route::view('checkout/shipping', 'pages.checkout.shipping');

Route::view('checkout/payment', 'pages.checkout.payment');

Route::view('checkout/confirm', 'pages.checkout.confirm');

//static pages 
Route::view('about_us', 'pages.info.about_us');

Route::view('faq', 'pages.info.faq');

Route::view('payments_and_shipment', 'pages.info.payments_and_shipment');

Route::view('returns_and_replacements', 'pages.info.returns_and_replacements');

Route::view('warranty', 'pages.info.warranty');
