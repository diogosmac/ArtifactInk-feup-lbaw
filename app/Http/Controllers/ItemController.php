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
            $item = Item::findOrFail($id_item);
            //$pictures = $item->images()->get();
            //$reviews = $item->reviews->orderBy('date', 'DESC')->get();
            if ($item != null) {
                //return $pictures;
                return view('pages.product', ['item' => $item/*, 'pictures' => $pictures, 'reviews' => $reviews*/]);
            } else {
                return response(json_encode("This product does not exist"), 404);
            }
        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }
}
