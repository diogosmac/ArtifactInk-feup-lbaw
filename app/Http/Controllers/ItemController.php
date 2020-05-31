<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Controllers\CartController;
use App\ItemPicture;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display item
     */
    public function show($id_item, $slug='') {
        try {
            $item = Item::findOrFail($id_item);
            $pictures = $item->images()->get();
            $reviews = $item->reviews()->orderBy('date', 'desc')->get();
            
            if ($item != null) {
                if ($slug !== $item->getSlug()) {
                    return redirect()->to($item->getUrlAttribute());
                } else {
                    return view('pages.product', ['item' => $item, 'pictures' => $pictures, 'reviews' => $reviews]);
                }
            } else {
                return response(json_encode("This product does not exist"), 404);
            }
        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }

    public function showHomepage(){
        
        $top_rated = ItemController::top_rated();
        $featured_deals = ItemController::featured_deals();
        $best_sellers = ItemController::best_sellers();
        $cart_items = CartController::get_user_cart_items();
        
        return view('pages.home', [ 'top_rated' => $top_rated, 
                                    'featured_deals' => $featured_deals, 
                                    'best_sellers' => $best_sellers
                                    ]); 
    }

    public function top_rated() {
        /**
         * (True Rating) = (v ÷ (v+m)) * R
         * 
         * R = average for the movie (mean) = (Rating)
         * v = number of votes for the movie = (votes)
         * m = minimum votes required 
         * */ 

        $items = Item::whereNotNull('rating')->take(25)->orderBy('rating', 'desc')->get();

        $pictures = array();
		foreach ($items as $i) {
			$item = Item::findOrFail($i->id);
			array_push($pictures, $item->images()->get()->first());
		}

        return ['title' => 'Top Rated', 'items' => $items, 'pictures' => $pictures];
    }

    public function featured_deals() {
        /**
         * Most percentage of price
         */
        $items = DB::table('item')->
        join('item_sale', 'item.id', '=', 'item_sale.id_item')->
        join('sale', 'sale.id', '=', 'item_sale.id_sale')->
        where('status', '=', 'active')->
        whereDate('end', '<=', Carbon::now()->toDateString())->
        select('item.*')->
        select(DB::raw('item.id, item.name, brand, item.price, stock, rating, status, 
        CASE 
            WHEN fixed_amount IS NULL THEN percentage_amount
            WHEN percentage_amount IS NULL THEN fixed_amount/price * 100
        END AS deal_value'))->
        orderByDesc('deal_value')->
        get()->toArray();

        $pictures = array();
		foreach ($items as $i) {
            $item = Item::findOrFail($i->id);
			array_push($pictures, $item->images()->get()->first());
		}

        return ['title' => 'Featured Deals', 'items' => $items, 'pictures' => $pictures];
    }

    /**
     * 25 Most ordered items 
     */
    public function best_sellers() {
        
        $items = DB::table('item')->
        join('item_purchase', 'item.id', '=', 'item_purchase.id_item')->
        where('status', '=', 'active')->
        groupBy('item.id')->
        select('item.*')->
        select(DB::raw('id, name, brand, item.price, stock, rating, status, count(*) as purchase_count'))->
        orderByDesc('purchase_count')->
        take(25)->
        get()->toArray();

        $pictures = array();
		foreach ($items as $i) {
            $item = Item::findOrFail($i->id);
			array_push($pictures, $item->images()->get()->first());
        }
        
        return ['title' => 'Best Sellers', 'items' => $items, 'pictures' => $pictures];
    }   
}
