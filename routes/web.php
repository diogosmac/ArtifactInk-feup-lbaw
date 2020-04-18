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

Route::get('/', 'Auth\LoginController@home');
// Cards
Route::get('cards', 'CardController@list');
Route::get('cards/{id}', 'CardController@show');

// API
Route::put('api/cards', 'CardController@create');
Route::delete('api/cards/{card_id}', 'CardController@delete');
Route::put('api/cards/{card_id}/', 'ItemController@create');
Route::post('api/item/{id}', 'ItemController@update');
Route::delete('api/item/{id}', 'ItemController@delete');

// Authentication

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');



Route::get('recover_password', function () {
    return view('auth.recover_password');
});

//routes for debugging pages - remove later 
Route::get('home', function () {
    return view('pages.home');
});

//profile pages and stuff related 
Route::get('profile', function () {
    return view('pages.profile');
});

Route::get('review', function () {
    return view('pages.review');
});

Route::get('profile/wishlist', function () {
    return view('pages.wishlist');
});

Route::get('profile/purchased_history', function () {
    return view('pages.purchased_history');
});


//shopping cart and checkout 
Route::get('cart', function () {
    return view('pages.cart');
});

Route::get('checkout/shipping', function () {
    return view('pages.checkout.shipping');
});

Route::get('checkout/payment', function () {
    return view('pages.checkout.payment');
});

Route::get('checkout/confirm', function () {
    return view('pages.checkout.confirm');
});

<<<<<<< HEAD
//static pages 
Route::get('about_us', function () {
    return view('pages.about_us');
});

Route::get('faq', function () {
    return view('pages.faq');
});

Route::get('payments_and_shipment', function () {
    return view('pages.payments_and_shipment');
});

Route::get('returns_and_replacements', function () {
    return view('pages.returns_and_replacements');
});

Route::get('warranty', function () {
    return view('pages.warranty');
});
=======

// admin routes
// auth
Route::get('admin/sign_in', function () {
    return view('pages.admin.sign_in');
});

// home
Route::get('admin/home', function () {
    return view('pages.admin.home');
});

// products
Route::get('admin/products', function () {
    return view('pages.admin.products');
});
// create product
Route::get('admin/products/add', function () {
    return view('pages.admin.add_product');
});
// edit product
Route::get('admin/products/{id}/edit', function ($id) {
    // TODO SEND OBJECT ARRAY WITH ID = $ID
    $product = (object) array(
        'id' => $id,
        'img' => "https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg",
        'name' => "Dynamic Black Ink 100ml",
        'price' => 17.99,
        'category' => "Ink",
        'subcategory' => "Black",
        'stock' => 34
    );
    return view('pages.admin.edit_product', ['product' => $product]);
})->where('id', '[0-9]+');



>>>>>>> Started working on admin pages
