<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Item;


class SearchController extends Controller
{
    //

    public function showSearch() {

        $query = Input::get('query');
        $search = Item::search($query);

        $searchResults = $search->get();

        $categories = SearchController::getCategories($searchResults);
        $brands = SearchController::getBrands($searchResults);

        $items = $search->paginate(18);
        $items->withPath('');

        return view('pages.search', ['items' => $items, 'categories' => $categories, 'brands' => $brands, 'query' => $query]);

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
