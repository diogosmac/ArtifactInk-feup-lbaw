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
Route::get('/', 'ItemController@showHomepage'); //todo reply function indide in all pages 

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
Route::prefix('admin')->group(function () {
    // auth
    Route::view('/', 'pages/admin/sign_in');

    // auth
    Route::view('sign_in', 'pages/admin/sign_in');

    // home
    Route::view('home', 'pages/admin/home');

    // products routes
    Route::prefix('products')->group(function () {
        // view products
        Route::view('/', 'pages/admin/products/products');

        // create product
        Route::view('add', 'pages.admin.products.add_product');

        // edit product
        /*
        Route::get('{id}/edit', function ($id) {

            $product = (object) array(
                'id' => $id,
                'img' => "https://media.killerinktattoo.pt/media/catalog/product/cache/12/image/2495a9b687712b856acb717d0b834074/d/y/dynamic-tattoo-ink-black.jpg",
                'name' => "Dynamic Black Ink 100ml",
                'price' => 17.99,
                'category' => "Ink",
                'subcategory' => "Black",
                'stock' => 34,
                'description' => "SUPER COOL DESCRIPTION"
            );
            return view('pages.admin.products.edit_product', ['product' => $product]);
        })->where('id', '[0-9]+');*/
    });

    // categories
    Route::view('categories', 'pages.admin.categories');

    // orders
    Route::view('orders', 'pages.admin.orders');

    // reviews
    Route::view('reviews', 'pages.admin.reviews');

    // users
    Route::view('users', 'pages.admin.users');

    // sales
    Route::prefix('sales')->group(function () {
        // view sales
        Route::view('/', 'pages.admin.sales.sales');

        // create sale
        Route::view('add', 'pages.admin.sales.add_sale');

        // edit sale
        /*
        Route::get('{id}/edit', function ($id) {
            // TODO SEND OBJECT ARRAY WITH ID = $ID
            $sale = (object) array(
                "id" => $id,
                "name" => "Inktober Fest",
                "startDate" => "2020-03-01",
                "endDate" => "2020-04-01"
            );
            return view('pages.admin.sales.edit_sale', ['sale' => $sale]);
        })->where('id', '[0-9]+'); */
    });

    // newsletter
    Route::view('newsletter', 'pages.admin.newsletter');

    // faqs
    Route::view('faqs', 'pages.admin.faqs');

    
    // info
    Route::view('info', 'pages.admin.info');

    
    // support message
    Route::view('support_chat', 'pages.admin.support_chat');
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
