<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display item
     */
    public function show($id_item)
    {
        try {
            $product = Item::findOrFail($id_item);
            //$reviews = Review::where('id_item', $id_item)->orderBy('date', 'DESC')->get();
            if ($product != null) {
                //return view('pages.product', ['item' => $item, 'reviews' => $reviews]);
            } else {
                return response(json_encode("This product does not exist"), 404);
            }
        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }
}
