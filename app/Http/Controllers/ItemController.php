<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Controllers\CartController;
use App\ItemPicture;

class ItemController extends Controller
{
    /**
     * Display item
     */
    public function show($id_item)
    {
        try {
            $item = Item::findOrFail($id_item);
            $pictures = $item->images()->get();
            $reviews = $item->reviews()->orderBy('date', 'desc')->get();
            
            $cart_items = CartController::get_user_cart_items()['cart_items']; 
            $cart_pictures = CartController::get_user_cart_items()['cart_pictures']; 

            if ($item != null) {
                return view('pages.product', ['item' => $item, 'pictures' => $pictures, 'reviews' => $reviews, 'cart_items' => $cart_items, 'cart_pictures' => $cart_pictures ]);
            } else {
                return response(json_encode("This product does not exist"), 404);
            }
        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }

    public function showHomepage()
    {
        return view('pages.home',CartController::get_user_cart_items()); 
    }
}
