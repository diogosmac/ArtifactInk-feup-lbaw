<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;

class CartController extends Controller
{
    //

    /**
     * Shows all items in the cart.
     *
     * @return Response
     */
    public function list()
    {
      if (!Auth::check()) return redirect('/login');

      //$this->authorize('list', Card::class);
			
			$items = array();
      $items = Auth::user()->cart_items()->orderBy('date_added')->get();
			
			$pictures = array();
			foreach ($items as $item) {
				array_push($pictures, $item->images()->get()->first());
			}
			//return  ['items' => $items, 'pictures' => $pictures];
			//return $items;	
	

			return view('pages.cart', ['items' => $items, 'pictures' => $pictures]);
			
		}

		/**
     * Add an item to the cart.
     *
     * @return Response
     */
		public function add_to_cart()
    {
      			
		}
}
