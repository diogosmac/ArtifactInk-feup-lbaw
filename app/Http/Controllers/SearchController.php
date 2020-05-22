<?php

namespace App\Http\Controllers;

use App\Item;


class SearchController extends Controller
{
    //

    public function showSearch($search)
    {
        $items = Item::search($search)->paginate(20);
        $items->withPath('');

        return view('pages.search', ['items' => $items]);
    }
}
