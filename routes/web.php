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

// test
Route::get('test', function () {
    return view('pages.test');
});

//Route::get('/', 'Auth\LoginController@home');
// Cards
Route::get('cards', 'CardController@list');
Route::get('cards/{id}', 'CardController@show');

// API
// Authentication

Route::get('sign_in', 'Auth\LoginController@showLoginForm')->name('sign_in');
Route::post('sign_in', 'Auth\LoginController@login');
Route::get('sign_out', 'Auth\LoginController@logout')->name('sign_out');
Route::get('sign_up', 'Auth\RegisterController@showRegistrationForm')->name('sign_up');
Route::post('sign_up', 'Auth\RegisterController@register');

//profile

Route::get('profile_nav','UserController@showUserNavbar');


Route::get('recover_password', function () {
    return view('auth.recover_password');
});

//routes for debugging pages - remove later 
Route::get('/', function () {
    return view('pages.home');
});

Route::get('home', function () {
    return view('pages.home');
});

Route::get('search', function () {
    return view('pages.search');
});

Route::get('product/{id}', 'ItemController@show');

//profile pages and stuff related 
Route::get('profile', function () {
    return view('pages.profile.profile');
});

Route::get('review', function () {
    return view('pages.profile.review');
});

Route::get('profile/wishlist', function () {
    return view('pages.profile.wishlist');
});

Route::get('profile/purchased_history', function () {
    return view('pages.profile.purchased_history');
});

// admin routes
Route::prefix('admin')->group(function () {
    // auth
    Route::get('/', function () {
        return view('pages.admin.sign_in');
    });

    // auth
    Route::get('sign_in', function () {
        return view('pages.admin.sign_in');
    });

    // home
    Route::get('home', function () {
        return view('pages.admin.home');
    });

    // products routes
    Route::prefix('products')->group(function () {
        // view products
        Route::get('/', function () {
            return view('pages.admin.products.products');
        });
        // create product
        Route::get('add', function () {
            return view('pages.admin.products.add_product');
        });
        // edit product
        Route::get('{id}/edit', function ($id) {
            // TODO SEND OBJECT ARRAY WITH ID = $ID
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
        })->where('id', '[0-9]+');
    });

    // categories
    Route::get('categories', function () {
        return view('pages.admin.categories');
    });

    // orders
    Route::get('orders', function () {
        return view('pages.admin.orders');
    });

    // reviews
    Route::get('reviews', function () {
        return view('pages.admin.reviews');
    });

    // users
    Route::get('users', function () {
        return view('pages.admin.users');
    });

    // sales
    Route::prefix('sales')->group(function () {
        // view sales
        Route::get('/', function () {
            return view('pages.admin.sales.sales');
        });
        // create sale
        Route::get('add', function () {
            return view('pages.admin.sales.add_sale');
        });
        // edit sale
        Route::get('{id}/edit', function ($id) {
            // TODO SEND OBJECT ARRAY WITH ID = $ID
            $sale = (object) array(
                "id" => $id,
                "name" => "Inktober Fest",
                "startDate" => "2020-03-01",
                "endDate" => "2020-04-01"
            );
            return view('pages.admin.sales.edit_sale', ['sale' => $sale]);
        })->where('id', '[0-9]+');
    });

    // newsletter
    Route::get('newsletter', function () {
        return view('pages.admin.newsletter');
    });

    // faqs
    Route::get('faqs', function () {
        return view('pages.admin.faqs');
    });

    // info
    Route::get('info', function () {
        return view('pages.admin.info');
    });

    // support message
    Route::get('support_chat', function () {
        return view('pages.admin.support_chat');
    });
});


//shopping cart and checkout 
/*Route::get('cart', function () {
    return view('pages.cart');
});*/
Route::get('cart', 'CartController@list');

Route::get('cart/add', 'CartController@add_to_cart');
Route::get('cart/delete', 'CartController@delete_from_cart');
Route::get('cart/update', 'CartController@update_item_quantity');


Route::get('checkout/shipping', function () {
    return view('pages.checkout.shipping');
});

Route::get('checkout/payment', function () {
    return view('pages.checkout.payment');
});

Route::get('checkout/confirm', function () {
    return view('pages.checkout.confirm');
});

//static pages 
Route::get('about_us', function () {
    return view('pages.info.about_us');
});

Route::get('faq', function () {
    return view('pages.info.faq');
});

Route::get('payments_and_shipment', function () {
    return view('pages.info.payments_and_shipment');
});

Route::get('returns_and_replacements', function () {
    return view('pages.info.returns_and_replacements');
});

Route::get('warranty', function () {
    return view('pages.info.warranty');
});
