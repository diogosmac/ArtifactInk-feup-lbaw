<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\AdminNotification;
use App\Category;
use App\Country;
use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailService\EmailServiceController;
use App\Http\Controllers\SearchController;
use App\Item;
use App\ItemPicture;
use App\NewsletterSubscriber;
use App\Order;
use App\Review;
use App\OutOfStockNotification;
use App\ReportNotification;
use App\Sale;
use App\Store;
use App\User;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Image;

class AdminController extends Controller
{
    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $notifications = AdminNotification::all()->sortByDesc('sent');

        $detail_notifications = array();
        foreach ($notifications as $notification){
            $detail = ReportNotification::find($notification->id);
            if ($detail == null) {
                $detail = OutOfStockNotification::find($notification->id);
            }
            array_push($detail_notifications, $detail);
        }

        return view('pages.admin.home', [
            'notifications' => $notifications,
            'detail' => $detail_notifications,
        ]);
    }

    public function clearNotification(Request $request) {
        $notification_id = $request->notification_id;

        try {
            AdminNotification::destroy($notification_id);
        } catch (Exception $e) {
            return response('Internal Server Error', 500);
        }

        return response()->json(['notification_id' => $notification_id]);
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
            //$picture->storeAs('public/img_product', $picture_name);

            Image::make($picture)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
              })->save('storage/img_product/'. $picture_name); 

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
            //$picture->storeAs('public/img_product', $picture_name);

            Image::make($picture)->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
              })->save('storage/img_product/'. $picture_name); 

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
        // get categories and subcategories
        $categories = Category::whereNull('id_parent')->orderBy('id', 'asc')->get();
        $subcategories = Category::whereNotNull('id_parent')->orderBy('id_parent', 'asc')->get();

        return view('pages.admin.categories', [
            'categories' => $categories,
            'subcategories' => $subcategories
        ]);
    }

    private function validateCategory(Request $request) {
        //validation rules.
        $rules = [
            'name' => 'required|string|max:32',
            'id_parent' => 'sometimes|numeric|exists:category'
        ];

        // validate the request.
        $request->validate($rules);
    }

    public function addCategory(Request $request) {
        // validate request
        $this->validateCategory($request);

        $category = new Category;
        $category->name = $request->name;
        if ($request->has('id_parent')) {
            $category->id_parent = $request->id_parent;
        } else {
            $category->id_parent = null;
        }
        $category->save();

        return redirect()
            ->intended(route('admin.categories'))
            ->with('status','Category ' . $category->name . ' added successfuly!');
    }

    public function editCategory(Request $request) {
        // validate request
        $this->validateCategory($request);
        try {
            // get category
            $category = Category::findOrFail($request->id);

            if ($category != null) {
                // set new category attributes
                $category->name = $request->name;
                if ($request->has('id_parent')) {
                    $category->id_parent = $request->id_parent;
                } else {
                    $category->id_parent = null;
                }
                $category->save();
                // return item id
                return redirect()
                    ->intended(route('admin.categories'))
                    ->with('status','Category ' . $category->name . ' edited successfuly!');
            } else {
                return redirect()
                    ->intended(route('admin.categories'))
                    ->withErrors('Category not found!');
            }

        } catch (\Exception $e) {
            return redirect()
                ->intended(route('admin.categories'))
                ->withErrors('Failed to edit category. ' . $e->getMessage());
        }
    }

    public function deleteCategory(Request $request) {
        // validate request
        try {
            // get category
            $category = Category::findOrFail($request->id);

            if ($category != null) {
                // check if any child categories
                if ($category->children->count() > 0) {
                    return redirect()
                        ->intended(route('admin.categories'))
                        ->withErrors('Category ' . $category->name . ' has subcategories associated and cannot be deleted!');
                }
                // check if any items categories
                if ($category->item->count() > 0) {
                    return redirect()
                        ->intended(route('admin.categories'))
                        ->withErrors('Category ' . $category->name . ' has items associated and cannot be deleted!');
                }
                // now delete it
                $category->delete();
                return redirect()
                    ->intended(route('admin.categories'))
                    ->with('status','Category ' . $category->name . ' deleted successfuly!');
            } else {
                return redirect()
                    ->intended(route('admin.categories'))
                    ->withErrors('Category not found!');
            }

        } catch (\Exception $e) {
            return redirect()
                ->intended(route('admin.categories'))
                ->withErrors('Failed to delete category. ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Orders
    |--------------------------------------------------------------------------
    */
    public function showOrders() {
        $orders = Order::orderBy('date', 'desc')->paginate(10)->withPath('');
        return view('pages.admin.orders', ['orders' => $orders]);
    }

    public function updateOrder(Request $request) {
        try {
            // get order
            $order = Order::findOrFail($request->id);
            if ($order != null) {
                // update order
                $order->status = $request->status;
                $order->save();
                
                return redirect()
                    ->route('admin.orders')
                    ->with('status', 'Order ' . $order->name . ' updated successfuly.');
            } else {
                return redirect()
                    ->route('admin.orders')
                    ->withErrors('Failed to update order.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.orders')
                ->withErrors('Failed to update order. ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Reviews
    |--------------------------------------------------------------------------
    */
    public function showReviews() {
        $reviews = Review::orderBy('date', 'desc');
        $reviews = $reviews->paginate(10)->withPath('');
        return view('pages.admin.reviews', ['reviews' => $reviews]);
    }

    public function deleteReview(Request $request) {
        try {
            // get review
            $review = Review::findOrFail($request->id);
            if ($review != null) {
                // delete sale
                $review->delete();
                return redirect()
                    ->route('admin.reviews')
                    ->with('status', 'Review ' . $review->name . ' deleted successfuly.');
            } else {
                return redirect()
                    ->route('admin.reviews')
                    ->withErrors('Failed to delete review.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.reviews')
                ->withErrors('Failed to delete review. ' . $e->getMessage());
        }
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
        $items = Item::all();
        return view('pages.admin.sales.add_sale', ['products' => $items]);
    }

    private function validateSale(Request $request) {
        //validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'item' => 'required|array',
            'item.*.*' => 'required|numeric|exists:App\Item,id'
        ];

        //custom validation error messages.
        $messages = [
            'item.*' => 'At least one item must be selected',
            'value.*' => 'Discount value is too high'
        ];

        // validate the request.
        $request->validate($rules, $messages);
        // add new rules depending on type
        $new_rules = [];
        if ($request->type == 'percentage') {
            $new_rules = [
                'value' => 'required|numeric|max:100|min:0',
            ];
        }
        else {
            // get lowest price item on sale
            $min_price = Item::find($request->item)->min('price');
            $new_rules = [
                'value' => 'required|numeric|min:0|max:' . $min_price,
            ];
        }

        // re-validate the request.
        $request->validate($new_rules, $messages);
    }

    public function addSale(Request $request) {
        // validate request
        $this->validateSale($request);
        // create new sale
        $new_sale = new Sale;
        $new_sale->name = $request->name;
        $new_sale->type = $request->type;
        // pick type
        if ($request->type == 'percentage') {
            $new_sale->percentage_amount = $request->value;
            $new_sale->fixed_amount = null;
        } else {
            $new_sale->fixed_amount = $request->value;
            $new_sale->percentage_amount = null;
        }
        $new_sale->start = $request->start;
        $new_sale->end = $request->end;
        $new_sale->save();

        // create item sales
        foreach($request->item as $id_item) {
            $new_sale->items()->attach(1, ['id_item' => $id_item, 'id_sale' => $new_sale->id]);
        }

        return redirect()
            ->intended(route('admin.sales.home'))
            ->with('status','Sale ' . $new_sale->name . ' added successfuly!');
    }

    public function showEditSaleForm($id_sale) {
        try {
            $sale = Sale::findOrFail($id_sale);
            $sale_items = $sale->items()->orderBy('id', 'asc')->get();
            $sale_item_ids = $sale_items->pluck('id');
            $non_sale_items = Item::whereNotIn('id', $sale_item_ids)->orderBy('id', 'asc')->get();
            
            if ($sale != null) {
                return view('pages.admin.sales.edit_sale', [
                    'sale' => $sale,
                    'items_sale' => $sale_items,
                    'items' => $non_sale_items
                ]);
            } else {
                return redirect()
                    ->route('admin.sales.home')
                    ->withErrors('Failed to load sale.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.sales.home')
                ->withErrors('Failed to load sale. ' . $e->getMessage());
        }
    }

    public function editSale(Request $request) {
        // validate request
        $this->validateSale($request);
        try {
            $sale = Sale::findOrFail($request->id);
            
            if ($sale != null) {
                $sale->name = $request->name;
                $sale->type = $request->type;
                if ($request->type == 'percentage') {
                    $sale->percentage_amount = $request->value;
                    $sale->fixed_amount = null;
                } else {
                    $sale->fixed_amount = $request->value;
                    $sale->percentage_amount = null;
                }
                $sale->start = $request->start;
                $sale->end = $request->end;
                $sale->save();

                // delete old items sales
                $sale->items()->sync([]);
                // create new item sales
                foreach($request->item as $id_item) {
                    $sale->items()->attach(1, ['id_item' => $id_item, 'id_sale' => $sale->id]);
                }

                return redirect()
                    ->route('admin.sales.home')
                    ->with('status', 'Sale ' . $sale->name . ' edited successfuly');
            } else {
                return redirect()
                    ->route('admin.sales.edit', ['id' => $sale->id])
                    ->withErrors('Failed to edit sale.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.sales.edit', ['id' => $sale->id])
                ->withErrors('Failed to edit sale. ' . $e->getMessage());
        }
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
        $items = Item::all();
        return view('pages.admin.newsletter', ['products' => $items]);
    }

    public function sendNewsletter(Request $request) {
        // Validation rules.
        $rules = [
            'subject' => 'required|string|max:64',
            'title' => 'required|string',
            'body' => 'required|string|'
        ];

        // custom validation error messages.
        $messages = [
            'subject' => 'Invalid subject',
            'title' => 'Invalid title',
            'body' => 'Invalid body'
        ];

        // validate the request.
        $request->validate($rules, $messages);

        $subject = $request['subject'];
        $title = $request['title'];
        $body = $request['body'];
        $items = $request['item'];

        $subscribers = NewsletterSubscriber::all();
        $email_service = new EmailServiceController();
        foreach ($subscribers as $subscriber) {
            if (!$email_service->sendNewsletterEmail($subscriber->email, 'Newsletter Subscriber', $subject, $title, $body, $items))   
                return redirect()
                    ->back()
                    ->withErrors('A Network Error occurred. Please try again.');   
        }
        
        return redirect()
            ->back()
            ->with('status', 'The newsletter was sent to ' . $subscribers->count() . ' subscribers');
    }

    /*
    |--------------------------------------------------------------------------
    | FAQs
    |--------------------------------------------------------------------------
    */
    public function showFaqs() {
        // get faqs
        $faqs = Faq::orderBy('order', 'asc')->get();
        return view('pages.admin.faqs', ['faqs' => $faqs]);
    }

    private function validateFaq(Request $request) {
        // get max order number
        $max_order = Faq::max('order') + 1;

        // Validation rules.
        $rules = [
            'question' => 'required|string',
            'answer' => 'required|string',
            'order' => 'required|numeric|min:1|max:' . $max_order
        ];

        // validate the request.
        $request->validate($rules);
    }

    public function addFaq(Request $request) {
        // validate request
        $this->validateFaq($request);
        // update other FAQs order
        $faqs_to_update = Faq::where('order', '>=', $request->order)
            ->orderBy('order', 'desc')
            ->get();
        foreach($faqs_to_update as $faq) {
            $faq->order = $faq->order + 1;
            $faq->save();
        }
        
        // create new FAQ
        $new_faq = new Faq;
        $new_faq->question = $request->question;
        $new_faq->answer = $request->answer;
        $new_faq->order = $request->order;
        $new_faq->save();

        return redirect()
            ->route('admin.faqs')
            ->with('status', 'FAQ added successfuly');
    }

    public function editFaq(Request $request) {
        // validate request
        $this->validateFaq($request);
        try {
            $faq = Faq::findOrFail($request->id);
            // check if exists
            if ($faq != null) {
                // update FAQs order
                $faqs_to_update = Faq::where('order', '>', $faq->order)
                    ->orderBy('order', 'asc')
                    ->get();
                $faq->order = Faq::max('order') + 1;
                $faq->save();
                foreach($faqs_to_update as $faq_update) {
                    $faq_update->order = $faq_update->order - 1;
                    $faq_update->save();
                }
                // update next FAQs order
                $faqs_to_update = Faq::where('order', '>=', $request->order)
                    ->orderBy('order', 'desc')
                    ->get();
                foreach($faqs_to_update as $faq_update) {
                    $faq_update->order = $faq_update->order + 1;
                    $faq_update->save();
                }
                // update FAQ
                $faq->question = $request->question;
                $faq->answer = $request->answer;
                $faq->order = $request->order;
                $faq->save();

                return redirect()
                    ->route('admin.faqs')
                    ->with('status', 'FAQ edited successfuly');
            } else {
                return redirect()
                    ->route('admin.faqs')
                    ->withErrors('Failed to edit FAQ.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.faqs')
                ->withErrors('Failed to edit FAQ. ' . $e->getMessage());
        }
    }

    public function deleteFaq(Request $request) {
        try {
            $faq = Faq::findOrFail($request->id);
            // check if exists
            if ($faq != null) {
                // delete FAQ
                $faq->delete();
                // update FAQs order
                $faqs_to_update = Faq::where('order', '>', $faq->order)
                    ->orderBy('order', 'asc')
                    ->get();
                foreach($faqs_to_update as $faq_update) {
                    $faq_update->order = $faq_update->order - 1;
                    $faq_update->save();
                }

                return redirect()
                    ->route('admin.faqs')
                    ->with('status', 'FAQ deleted successfuly');
            } else {
                return redirect()
                    ->route('admin.faqs')
                    ->withErrors('Failed to delete FAQ.');
            }
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.faqs')
                ->withErrors('Failed to delete FAQ. ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Info
    |--------------------------------------------------------------------------
    */
    public function showInfo() {
        // get store information
        $store = Store::get()->first();
        $countries = Country::all();
        // render view
        return view('pages.admin.info', ['store' => $store, 'countries' => $countries]);
    }

    public function editInfo(Request $request) {
        try {
            // get store information
            $store = Store::get()->first();
            $store_address = Address::find($store->address->id);
            // update address
            $store_address->id_country = $request->id_country;
            $store_address->city = $request->city;
            $store_address->street = $request->street;
            $store_address->postal_code = $request->postal_code;
            // update store info
            $store->email = $request->email;
            $store->phone = $request->phone;
            $store->about_us = $request->about_us;
            $store->payments_shipment = $request->payments_shipment;
            $store->returns = $request->returns;
            $store->warranty = $request->warranty;
            // save changes
            $store->save();
            $store_address->save();
            // render view
            return redirect()
                ->route('admin.info')
                ->with('status', 'Store information edited successfuly');
        } catch (\Exception $e) {
            return redirect()
                ->route('admin.info')
                ->withErrors('Failed to update store info. ' . $e->getMessage());
        }
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
