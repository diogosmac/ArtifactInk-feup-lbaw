<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;

class AdminController extends Controller
{
    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('pages.admin.home');
    }

    public function showProducts(){
        return view('pages.admin.products.products');
    }

    public function showAddProductForm(){
        return view('pages.admin.products.add_product');
    }

    public function showEditProductForm($id_item) {
        try {
            $item = Item::findOrFail($id_item);
            $pictures = $item->images()->get();

            if ($item != null) {
                return view('pages.admin.products.edit_product', ['product' => $item, 'pictures' => $pictures]);
            } else {
                return response(json_encode("This product does not exist"), 404);
            }
        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }

    public function __construct() {
        $this->middleware('admin');
    }
}
