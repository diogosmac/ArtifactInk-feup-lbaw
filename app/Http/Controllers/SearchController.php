<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Item;


class SearchController extends Controller
{

    public function showSearch() {

        $query = Input::get('query');
        $filterVars = ['query' => $query];

        if (Input::has('orderBy')) {
            $orderBy = Input::get('orderBy');
            $filterVars['orderBy'] = $orderBy;
        }

        if (Input::has('sortOrder')) {
            $sortOrder = Input::get('sortOrder');
            $filterVars['sortOrder'] = $sortOrder;
        }

        if (Input::has('category')) {
            $filterCategories = Input::get('category');
            $filterVars['filterCategories'] = $filterCategories;
        }

        if (Input::has('brand')) {
            $filterBrands = Input::get('brand');
            $filterVars['filterBrands'] = $filterBrands;
        }

        if (Input::has('inStock')) {
            $inStock = Input::get('inStock');
            $filterVars['inStock'] = $inStock;
        }

        if (Input::has('minPrice')) {
            $minPrice = Input::get('minPrice');
            $filterVars['minPrice'] = $minPrice;
        }

        if (Input::has('maxPrice')) {
            $maxPrice = Input::get('maxPrice');
            $filterVars['maxPrice'] = $maxPrice;
        }

        $search = Item::search($query);

        if (isset($orderBy)) {
            if (!isset($sortOrder)) {
                $sortOrder = 'desc';
            }
            switch($orderBy) {
                case 'bestMatch':
                    if ($sortOrder == 'asc') {
                        $search = $search->reverse();
                    }
                    break;
                case 'price':
                    $search = $search->orderBy($orderBy, $sortOrder);
                    break;
                case 'rating':
                    $search = $search->orderBy($orderBy, $sortOrder);
                    break;
            }
        }

        $searchResults = $search->get();

        $categories = SearchController::getCategories($searchResults);
        $brands = SearchController::getBrands($searchResults);

        if (isset($filterCategories)) {
            $search = $search->whereIn('id_category', $filterCategories);
        }

        if (isset($filterBrands)) {
            $search = $search->whereIn('brand', $filterBrands);
        }

        if (isset($inStock)) {
            $search = $search->where('stock', '>', 0);
        }

        if (isset($minPrice)) {
            $search = $search->where('price', '>=', $minPrice);
        }    

        if (isset($maxPrice)) {
            $search = $search->where('price', '<=', $maxPrice);
        }    

        $items = $search->paginate(18);
        $items->withPath('');

        $filterVars['categories'] = $categories;
        $filterVars['brands'] = $brands;
        $filterVars['items'] = $items;

        return view('pages.search', $filterVars);

    }

    public static function getCategories($search) {
        
        $categories = array();
        if (count($search) > 0) {
            array_push($categories, $search[0]->category()->get()[0]);
            for ($i = 1; $i < count($search); $i++) {
                $j = 0;
                for (; $j < count($categories); $j++) {
                    if ($search[$i]->category()->get()[0]->id == $categories[$j]->id) {
                        break;
                    }
                }
                if ($j == count($categories)) {
                    array_push($categories, $search[$i]->category()->get()[0]);
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
