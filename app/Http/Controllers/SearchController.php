<?php

namespace App\Http\Controllers;

use App\Item;


class SearchController extends Controller
{
    //

    public function showSearch()
    {

        $items = Item::search('ink')->paginate(20);
        $items->withPath('');

        return view('pages.search', ['items' => $items]);
    }

}
