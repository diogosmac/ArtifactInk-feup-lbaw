<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SearchController;
use App\Item;
use App\ItemPicture;
use App\Sale;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

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

        $items = Item::orderBy('id', 'asc');

        if (Input::has('query')) {
            $query = Input::get('query');
            $items = Item::search($query)->orderBy('id', 'asc');
        }

        $allItems = $items->get();
        $allCategories = SearchController::getCategories($allItems);
        $allBrands = SearchController::getBrands($allItems);

        if (Input::has('category')) {
            $categories = Input::get('category');
            $items = $items->whereIn('id_category', $categories);
        }

        if (Input::has('brand')) {
            $brands = Input::get('brand');
            $items = $items->whereIn('brand', $brands);
        }

        if (Input::has('inStock')) {
            $items = $items->where('stock', '>', 0);
        }

        if (Input::has('minPrice')) {
            $minPrice = Input::get('minPrice');
            $items = $items->where('price', '>=', $minPrice);
        }

        if (Input::has('maxPrice')) {
            $maxPrice = Input::get('maxPrice');
            $items = $items->where('price', '<=', $maxPrice);
        }

        $items = $items->paginate(10)->withPath('');

        return view('pages.admin.products.products', ['products' => $items, 'categories' => $allCategories, 'brands' => $allBrands]);

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
            $pictures = $item->images;

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

        // get old pictures
        $old_item_pictures = $item->images;
        // delete old images from database and
        // delete images from filesystem if no
        // other item is using this image
        foreach ($old_item_pictures as $old_item_picture) {
            ItemPicture::destroy($old_item_picture->id);
            if (ItemPicture::where('link', $old_item_picture->link)->count() == 0)
                Storage::delete('public/img_product/' . $old_item_picture->link);
        }
        

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

        return redirect()
            ->intended(route('admin.products.home'))
            ->with('status','Product ' . $item->name . ' updated successfuly!');
    }

    public function archiveItem(Request $request) {
        try {
            // get item
            $item = Item::findOrFail($request->id_item);

            if ($item != null) {
                // set new status
                $item->status = 'archived';
                $item->save();
                // return item id
                return response()->json(['id_item' => $item->id]);
            } else {
                return response(json_encode("This product does not exist"), 404);
            }

        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }

    public function unarchiveItem(Request $request) {
        try {
            // get item
            $item = Item::findOrFail($request->id_item);
            
            if ($item != null) {
                // set new status
                $item->status = 'active';
                $item->save();
                // return item id
                return response()->json(['id_item' => $item->id]);
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
        $users = User::orderBy('id', 'asc');

        // TODO search

        $users = $users->paginate(10)->withPath('');
        return view('pages.admin.users', ['users' => $users]);
    }

    public function banUser(Request $request) {
        try {
            // get user
            $user = User::findOrFail($request->id_user);

            if ($user != null) {
                // set new status
                $user->is_banned = true;
                $user->save();
                // return user id
                return response()->json(['id_user' => $user->id]);
            } else {
                return response(json_encode("This user does not exist"), 404);
            }

        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }

    public function unbanUser(Request $request) {
        try {
            // get user
            $user = User::findOrFail($request->id_user);

            if ($user != null) {
                // set new status
                $user->is_banned = false;
                $user->save();
                // return user id
                return response()->json(['id_user' => $user->id]);
            } else {
                return response(json_encode("This user does not exist"), 404);
            }

        } catch (\Exception $e) {
            return response(json_encode($e->getMessage()), 400);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Sales
    |--------------------------------------------------------------------------
    */
    public function showSales() {
        $sales = Sale::orderBy('id', 'asc');

        $sales = $sales->paginate(10)->withPath('');
        return view('pages.admin.sales.sales', ['sales' => $sales]);
    }

    public function showAddSaleForm() {
        return view('pages.admin.sales.add_sale');
    }

    public function addSale() {
        return 1;
    }

    public function showEditSaleForm($id_sale) {
        try {
            $sale = Sale::findOrFail($id_sale);
            $sale_items = $sale->items;
            $sale_item_ids = array_column((array) $sale_items, 'id');
            $non_sale_items = Item::whereNotIn('id', $sale_item_ids)->get();
            
            if ($sale != null) {
                // delete sale
                return view('pages.admin.sales.edit_sale', ['sale' => $sale, 'items_sale' => $sale_items, 'items' => $non_sale_items]);

            } else {
                return redirect()
                    ->route('admin.sales.home')
                    ->withErrors('Failed to load sale.');
                }
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.sales.home')
                ->withErrors('Failed to laod sale. ' . $e->getMessage());
        }
    }

    public function editSale(Request $request) {
        return 1;
    }

    public function deleteSale(Request $request) {
        try {
            $sale = Sale::findOrFail($request->id);
            
            if ($sale != null) {
                // delete sale
                $sale->delete();
                return redirect()
                    ->route('admin.sales.home')
                    ->with('status', 'Sale ' . $sale->name . ' deleted successfuly.');
            } else {
                return redirect()
                    ->route('admin.sales.home')
                    ->withErrors('Failed to delete sale.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.sales.home')
                ->withErrors('Failed to delete sale. ' . $e->getMessage());
        }
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
