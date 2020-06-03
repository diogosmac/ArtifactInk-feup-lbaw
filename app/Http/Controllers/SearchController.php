<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Item;


class SearchController extends Controller
{

    public function showSearch() {

        $search = Input::get('query');
        $filterVars = ['query' => $search];

        $query = Item::search($search);

        $queryResults = $query->get();

        $categories = SearchController::getCategories($queryResults);
        $brands = SearchController::getBrands($queryResults);

        $orderBy = 'bestMatch';
        if (Input::has('orderBy')) {
            $orderBy = Input::get('orderBy');
        }
        $sortOrder = 'desc';
        if (Input::has('sortOrder')) {
            $sortOrder = Input::get('sortOrder');
        }
        switch ($orderBy) {
            case 'bestMatch':
                $query = Item::sortBestMatch($query, $search, $sortOrder);
                break;
            default:
                $query = $query->orderBy($orderBy, $sortOrder);
                break;
        }

        if (Input::has('category')) {
            $filterCategories = Input::get('category');
            $query = $query->whereIn('id_category', $filterCategories);
        }

        if (Input::has('brand')) {
            $filterBrands = Input::get('brand');
            $query = $query->whereIn('brand', $filterBrands);
        }

        if (Input::has('inStock')) {
            $query = $query->where('stock', '>', 0);
        }

        $minPrice = Input::get('minPrice', 0);
        $maxPrice = Input::get('maxPrice', 500);

        $query = $query
            ->where(function ($query) use ($minPrice, $maxPrice) {
                $query
                    ->whereHas('sales', function ($query) use ($minPrice, $maxPrice) {
                        $query
                            ->whereRaw('
                                ( "sale"."type" = \'fixed\'
                                and "item"."price" - "sale"."fixed_amount" >= ' . $minPrice . '
                                and "item"."price" - "sale"."fixed_amount" <= ' . $maxPrice . ' )')
                            ->orWhereRaw('
                                ( "sale"."type" = \'percentage\'
                                and "item"."price" * 0.01 * (100 - "sale"."percentage_amount") >= ' . $minPrice . '
                                and "item"."price" * 0.01 * (100 - "sale"."percentage_amount") <= ' . $maxPrice . ' )');
                    })
                    ->orWhereDoesntHave('sales')
                        ->where('item.price', '>=', $minPrice)
                        ->where('item.price', '<=', $maxPrice);
            });

        $items = $query->paginate(18)->withPath('');
        
        $filterVars['categories'] = $categories;
        $filterVars['brands'] = $brands;
        $filterVars['items'] = $items;

        return view('pages.search', $filterVars);

    }

    public static function getCategories($search) {
        
        $categories = array();
        if (count($search) > 0) {
            array_push($categories, $search[0]->category);
            for ($i = 1; $i < count($search); $i++) {
                $j = 0;
                for (; $j < count($categories); $j++) {
                    if ($search[$i]->category->id == $categories[$j]->id) {
                        break;
                    }
                }
                if ($j == count($categories)) {
                    array_push($categories, $search[$i]->category);
                }
            }
        }
        return $categories;

    }

    public static function getBrands($search) {

        $brands = array();
        if (count($search) > 0) {
            array_push($brands, $search[0]['brand']);
            for ($i = 1; $i < count($search); $i++) {
                $j = 0;
                for (; $j < count($brands); $j++) {
                    if ($search[$i]['brand'] == $brands[$j]) {
                    break;
                    }
                }
                if ($j == count($brands)) {
                    array_push($brands, $search[$i]['brand']);
                }
            }
        }
        return $brands;

    }

}
