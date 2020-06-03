<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Controllers\CartController;
use App\ItemPicture;
use App\User;
use Illuminate\Support\Facades\Input;
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
            $pictures = $item->images;
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
        // $cart_items = CartController::get_user_cart_items();
        
        return view('pages.home', [ 'top_rated' => $top_rated, 
                                    'featured_deals' => $featured_deals, 
                                    'best_sellers' => $best_sellers
                                    ]); 
    }

    public static function top_rated($filters=FALSE) {
        /**
         * (True Rating) = (v ÷ (v+m)) * R
         * 
         * R = average for the movie (mean) = (Rating)
         * v = number of votes for the movie = (votes)
         * m = minimum votes required 
         * */ 

        $items = Item::whereNotNull('rating')
            ->where('status', 'active')
            ->orderBy('rating', 'desc');

        $data = [];

        $finalItems = array();
        $prices = array();
        $pictures = array();

        if (!$filters) {
            $items = $items->take(4);
        }

        $allItems = $items->get();
        $absoluteMax = $allItems->max('price');

        foreach ($allItems as $i) {
            $item = Item::findOrFail($i->id);
            array_push($finalItems, $item);

            $sales = $item->sales;
            $currentSale = 0;
            $price = $item->price;
            foreach ($sales as $sale) {
                $new_sale = 0;
                if ($sale->type == 'percentage') {
                    $new_sale = 0.01 * $sale->percentage_amount * $price;
                } else if ($sale->type == 'fixed') {
                    $new_sale = $sale->fixed_amount;
                }
                if ($new_sale > $currentSale) {
                    $currentSale = $new_sale;
                }
            }
            $price = round($price - $currentSale, 2);
            array_push($prices, $price);

            array_push($pictures, $item->images->first());
        }
        
        $data['title'] = 'Top Rated';
        $data['slug'] = 'top_rated';
        $data['prices'] = $prices;
        $data['pictures'] = $pictures;
        if (!$filters) {
            $data['items'] = $finalItems;
        }
        
        if ($filters) {
            $data['items'] = $items;
            $data['categories'] = SearchController::getCategories($finalItems);
            $data['brands'] = SearchController::getBrands($finalItems);
            $data['maxPrice'] = ceil($absoluteMax);
        }

        return $data;

    }

    public static function featured_deals($filters=FALSE) {
        /**
         * Most percentage of price
         */
        $items = Item::select('item.*')
            ->where('status', 'active')
            ->whereHas('sales')
            ->join('item_sale', 'item.id', '=', 'item_sale.id_item')
            ->join('sale', 'sale.id', '=', 'item_sale.id_sale')
            // ->whereDate('sale.start', '<=', Carbon::now()->toDateString())
            ->whereDate('sale.end', '<=', Carbon::now()->toDateString())
            ->orderByRaw('
                CASE
                    WHEN fixed_amount IS NULL THEN percentage_amount
                    WHEN percentage_amount IS NULL THEN fixed_amount / price * 100
                END DESC');

        $data = [];

        $finalItems = array();
        $prices = array();
        $pictures = array();

        if (!$filters) {
            $items = $items->take(4);
        }

        $allItems = $items->get();
        $absoluteMax = $allItems->max('price');

        foreach ($allItems as $i) {
            $item = Item::findOrFail($i->id);
            array_push($finalItems, $item);

            $sales = $item->sales;
            $currentSale = 0;
            $price = $item->price;
            foreach ($sales as $sale) {
                $new_sale = 0;
                if ($sale->type == 'percentage') {
                    $new_sale = 0.01 * $sale->percentage_amount * $price;
                } else if ($sale->type == 'fixed') {
                    $new_sale = $sale->fixed_amount;
                }
                if ($new_sale > $currentSale) {
                    $currentSale = $new_sale;
                }
            }
            $price = round($price - $currentSale, 2);
            array_push($prices, $price);

            array_push($pictures, $item->images->first());
        }
        
        $data['title'] = 'Featured Deals';
        $data['slug'] = 'featured_deals';
        $data['prices'] = $prices;
        $data['pictures'] = $pictures;
        if (!$filters) {
            $data['items'] = $finalItems;
        }

        if ($filters) {
            $data['items'] = $items;
            $data['categories'] = SearchController::getCategories($finalItems);
            $data['brands'] = SearchController::getBrands($finalItems);
            $data['maxPrice'] = ceil($absoluteMax);
        }

        return $data;

    }

    /**
     * Most ordered items
     */
    public static function best_sellers($filters=FALSE) {
        
        $items = Item::selectRaw('item.*, count(*) as purchase_count')
            ->groupBy('item.id')
            ->where('status', 'active')
            ->whereHas('purchases')
            ->join('item_purchase', 'item.id', '=', 'item_purchase.id_item')
            ->orderByDesc('purchase_count');
                
        $data = [];

        $finalItems = array();
        $prices = array();
        $pictures = array();

        if (!$filters) {
            $items = $items->take(4);
        }

        $allItems = $items->get();
        $absoluteMax = $allItems->max('price');

        foreach ($allItems->toArray() as $i) {
            $item = Item::findOrFail($i['id']);
            array_push($finalItems, $item);

            $sales = $item->sales;
            $currentSale = 0;
            $price = $item->price;
            foreach ($sales as $sale) {
                $new_sale = 0;
                if ($sale->type == 'percentage') {
                    $new_sale = 0.01 * $sale->percentage_amount * $price;
                } else if ($sale->type == 'fixed') {
                    $new_sale = $sale->fixed_amount;
                }
                if ($new_sale > $currentSale) {
                    $currentSale = $new_sale;
                }
            }
            $price = round($price - $currentSale, 2);
            array_push($prices, $price);

            array_push($pictures, $item->images->first());
        }

        $data['title'] = 'Best Sellers';
        $data['slug'] = 'best_sellers';
        $data['prices'] = $prices;
        $data['pictures'] = $pictures;
        if (!$filters) {
            $data['items'] = $finalItems;
        }

        if ($filters) {
            $data['items'] = $items;
            $data['categories'] = SearchController::getCategories($finalItems);
            $data['brands'] = SearchController::getBrands($finalItems);
            $data['maxPrice'] = ceil($absoluteMax);
        }

        return $data;

    }   

}
