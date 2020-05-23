<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Item;


class SearchController extends Controller
{
    //

    public function showSearch()
    {
        $query = Input::get('query');
        $search = Item::search($query);
        
        $categories = SearchController::getCategories($search->get());
        // $brands 

        $items = $search->paginate(18);
        $items->withPath('');

        return view('pages.search', ['items' => $items, 'categories' => $categories]);
    }

    public function getCategories($search) {
        //$search = Item::search('ink')->get();
        
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

}
