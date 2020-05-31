<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;


class CategoryController extends Controller
{
    /**
     * Display item
     */
    public function show($id_item, $slug='') {
        try {
            $category = Category::findOrFail($id_item);
            $items = array();
            // if category is a parent fetch all child items
            if ($category->parent == null) {
                $child_categories_ids = $category->children->pluck('id');
                $items = Item::whereIn('id_category', $child_categories_ids)->paginate(18);
                $items->withPath('');
            } else {
                $items = Item::where('id_category', $category->id)->paginate(18);
                $items->withPath('');
            }

            if ($category != null) {
                if ($slug !== $category->getSlug()) {
                    return redirect()->to($category->getUrlAttribute());
                } else {
                    return view('pages.search', ['items' => $items]);
                }
            } else {
                return response(json_encode("This product does not exist"), 404);
            }
        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }
}
