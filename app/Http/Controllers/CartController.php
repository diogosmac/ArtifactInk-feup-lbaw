<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    /**
     * Shows all cards.
     *
     * @return Response
     */
    public function list()
    {
      if (!Auth::check()) return redirect('/login');

      //$this->authorize('list', Card::class);

      $items = Auth::user()->cart_items()->orderBy('date_added')->get();

      print_r($items);
      
      return view('pages.cart', ['items' => $items]);
    }
}
