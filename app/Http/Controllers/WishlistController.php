<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDOException;

class WishlistController extends Controller
{
	/**
	 * Shows all items in the wishlist.
	 *
	 * @return View
	 */
	public function list()	{
		if (!Auth::check()) return redirect('/sign_in');

		//$this->authorize('list', Card::class);

		$items = array();
		$items = Auth::user()->wishlist_items()->get();

		$pictures = array();
		foreach ($items as $item) {
			array_push($pictures, $item->images()->get()->first());
		}
	
		return view('pages.profile.wishlist', ['items' => $items, 'pictures' => $pictures]);
	}

	/**
	 * Add an item to the wishlist.
	 *
	 * @return Response
	 */
	public function add_to_wishlist(Request $request) {
		if (!Auth::check()) return redirect('/sign_in');

		$item = $request->input('id_item');

		$wishlist = Auth::user()->wishlist_items();
		
		try {
			$wishlist->attach(1, ['id_user' => Auth::user()->id, 'id_item' => $item]);
		} catch (PDOException $e) {
			return response('Added to wishlist');
		}

		return response('Added to wishlist');
	}

	/**
	 * Remove an item from the wishlist.
	 *
	 * @return Response
	 */
	public function delete_from_wishlist(Request $request)	{
		if (!Auth::check()) return redirect('/sign_in');

		$item = $request->input('id_item');

		$wishlist = Auth::user()->wishlist_items();

		try {
			$wishlist->detach(['id_user' => Auth::user()->id, 'id_item' => $item]);
		} catch (PDOException $e) {
			return response("Internal Server Error", 500);
		}

		return response()->json(['id_item' => $item]);
	}
}
