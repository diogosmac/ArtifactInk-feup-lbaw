<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use App\ItemPicture;
use Illuminate\Support\Facades\File;

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
    
    private function validateProduct(Request $request) {
        //validation rules.
        $rules = [
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required|string',
            'brand' => 'required|string',
            'category' => 'required|numeric',
            'pictures' => 'required|array',
            'pictures.*' => 'image|mimes:jpeg,jpg,png'
        ];

        //custom validation error messages.
        $messages = [
            'pictures.*.mimes' => 'Only jpeg, jpg or png images are allowed',
            'pictures.*.image' => 'Uploaded file must be an image',
        ];

        // validate the request.
        $request->validate($rules, $messages);
    }

    public function addProduct(Request $request) {
        // validate product
        $this->validateProduct($request);
        // create product entry
        $new_item = new Item;
        $new_item->name = $request->title;
        $new_item->price = $request->price;
        $new_item->stock = $request->stock;
        $new_item->brand = $request->brand;
        $new_item->id_category = $request->category;
        $new_item->description = $request->description;
        $new_item->save();
        
        // create image entries
        $pictures = $request->file('pictures');
        $picture_id = 1;
        foreach ($pictures as $picture) {
            // create item picture entry
            $item_picture = new ItemPicture;
            $item_picture->id_item = $new_item->id;
            // build picture name
            $extension = $picture->getClientOriginalExtension();
            $picture_name = $new_item->id . "_" . $picture_id . "_" . str_replace(" ", "_", strtolower($new_item->name)) . "." . $extension;
            // save item picture entry
            $item_picture->link = $picture_name;
            $item_picture->save();
            // store uploaded image
            $picture->storeAs('public/img_product', $picture_name);
            $picture_id = $picture_id + 1;
        }

        return redirect()
            ->intended(route('admin.products.home'))
            ->with('status','Product ' . $new_item->name . ' added successfuly!');
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

    public function editProduct(Request $request) {
        // validate product
        $this->validateProduct($request);
        // get item and update item
        $item = Item::find($request->id);
        $item->name = $request->title;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->brand = $request->brand;
        $item->id_category = $request->category;
        $item->description = $request->description;
        $item->save();

        // delete old images ffrom database
        $old_item_pictures = $item->images;
        ItemPicture::destroy(array_column($old_item_pictures, 'id'));
        // delete from filesystem
        File::delete(File::glob("storage/img_product/" . $item->id . "_*"));

        // update images
        $pictures = $request->file('pictures');
        $picture_id = 1;
        foreach ($pictures as $picture) {
            // create item picture entry
            $item_picture = new ItemPicture;
            $item_picture->id_item = $item->id;
            // build picture name
            $extension = $picture->getClientOriginalExtension();
            $picture_name = $item->id . "_" . $picture_id . "_" . str_replace(" ", "_", strtolower($item->name)) . "." . $extension;
            // save item picture entry
            $item_picture->link = $picture_name;
            $item_picture->save();
            // store uploaded image
            $picture->storeAs('public/img_product', $picture_name);
            $picture_id = $picture_id + 1;
        }

        return $item;
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

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    */
    public function __construct() {
        $this->middleware('admin');
    }
}
