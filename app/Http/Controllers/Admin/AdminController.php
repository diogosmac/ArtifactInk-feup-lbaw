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

    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    */
    public function showProducts() {
        $items = Item::paginate(10);
        $items->withPath('');
        return view('pages.admin.products.products', ['products' => $items]);
    }

    public function showAddProductForm() {
        return view('pages.admin.products.add_product');
    }

    public function addProduct(Request $request) {
        
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

    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */
    public function showCategories() {
        return view('pages.admin.categories');
    }

    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */
    public function showOrders() {
        return view('pages.admin.orders');
    }

    /*
    |--------------------------------------------------------------------------
    | Reviews
    |--------------------------------------------------------------------------
    */
    public function showReviews() {
        return view('pages.admin.reviews');
    }

    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */
    public function showUsers() {
        return view('pages.admin.users');
    }

    /*
    |--------------------------------------------------------------------------
    | Sales
    |--------------------------------------------------------------------------
    */
    public function showSales() {
        return view('pages.admin.sales.sales');
    }

    public function showAddSaleForm() {
        return view('pages.admin.sales.add_sale');
    }

    public function showEditSaleForm($id_sale) {
        // TODO GET SALE OBJECT
        $sale = (object) array(
            "id" => $id_sale,
            "name" => "Inktober Fest",
            "startDate" => "2020-03-01",
            "endDate" => "2020-04-01"
        );
        return view('pages.admin.sales.edit_sale', ['sale' => $sale]);
    }

    /*
    |--------------------------------------------------------------------------
    | Newsletter
    |--------------------------------------------------------------------------
    */
    public function showNewsletter() {
        return view('pages.admin.newsletter');
    }

    /*
    |--------------------------------------------------------------------------
    | FAQs
    |--------------------------------------------------------------------------
    */
    public function showFaqs() {
        return view('pages.admin.faqs');
    }

    /*
    |--------------------------------------------------------------------------
    | Info
    |--------------------------------------------------------------------------
    */
    public function showInfo() {
        return view('pages.admin.info');
    }

    /*
    |--------------------------------------------------------------------------
    | Support Chat
    |--------------------------------------------------------------------------
    */
    public function showSupportChat() {
        return view('pages.admin.support_chat');
    }

    public function __construct() {
        $this->middleware('admin');
    }
}
