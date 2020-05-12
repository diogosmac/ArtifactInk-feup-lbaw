<?php

namespace App\Http\Controllers;

use App\User;
use App\ProfilePicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  //


  /**
   * Show orders page
   */

  public function showOrders() {
    if (!Auth::check()) return redirect('/sign_in');

    $orders = Auth::user()->orders()->orderBy('date', 'desc')->get();
    $addresses = array();
    $items = array();
    $pictures = array();
    foreach ($orders as $order) {
      array_push($addresses, $order->address()->get()->toJson());
      
      $auxItems = $order->items()->get();
      $auxPictures = array();
      foreach ($auxItems as $item) {
				array_push($auxPictures, $item->images()->get()->first()->toJson());
      }
      array_push($items, $auxItems->toJson());
      array_push($pictures, $auxPictures);
    }

    /*print_r((array) $orders->toJson());
    print_r($addresses);
    print_r($items);
    print_r($pictures);*/

    //print("\n");$orders = json_decode(((array) $orders->toJson())[0]);
    //$addresses = json_decode($addresses[0]);
    //$items = json_decode($items[0]);

    //print_r((array) $orders->toJson());
    print("\n");
    print_r($addresses);
    print("\n");
    print_r($items);

    return view('pages.profile.purchased_history', ['orders' => (array) $orders->toJson(), 'addresses' => $addresses, 'items' => $items, 'pictures' => $pictures]);
  }
}
