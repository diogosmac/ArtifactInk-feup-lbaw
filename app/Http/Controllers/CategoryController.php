<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
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
            // if category is a parent fetch all child items
            if ($category->parent == null) {
                $child_categories_ids = $category->children->pluck('id');
                $items = Item::whereIn('id_category', $child_categories_ids);
            } else {
                $items = Item::where('id_category', $category->id);
            }
            
            $orderBy = Input::get('orderBy', 'name');

            $defaultSortOrder = 'asc';
            if ($orderBy == 'rating') {
                $defaultSortOrder = 'desc';
            }
            $sortOrder = Input::get('sortOrder', $defaultSortOrder);
            $items = $items->orderBy($orderBy, $sortOrder);

            $brands = SearchController::getBrands($items->get());

            if (Input::has('brand')) {
                $items = $items->whereIn('brand', Input::get('brand'));
            }

            if (Input::has('inStock')) {
                $items = $items->where('stock', '>', 0);
            }

            $minPrice = Input::get('minPrice', 0);
            $items = $items->where('price', '>=', $minPrice);

            $maxPrice = Input::get('maxPrice', 500);
            $items = $items->where('price', '<=', $maxPrice);

            $items = $items->paginate(18)->withPath('');

            if ($category != null) {
                if ($slug !== $category->getSlug()) {
                    return redirect()->to($category->getUrlAttribute());
                } else {
                    return view('pages.category',
                        [
                            'url' => $id_item . '-' . $slug,
                            'category' => $category,
                            'items' => $items,
                            'categories' => array(),
                            'brands' => $brands,
                        ]);
                }
            } else {
                return response(json_encode("This product does not exist"), 404);
            }
        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }
}
