<?php

namespace App\Http\Controllers;

use App\Address;
use App\AdminNotification;
use App\CreditCard;
use App\Item;
use App\Order;
use App\OutOfStockNotification;
use App\PaymentMethod;
use App\Paypal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
    * Process checkout 
    */
   public function addOrder(Request $request){

    //request fields test 
    $address_id = $request['addrOld']; 
    $payment_id = $request['paymentOld']; 
    $total = $request['total'];
    $new_addr = $request['address'];
    $new_payment = $request['payment'];
    $date = date('m/d/Y h:i:s a', time());

    //request fields for new info 
    $street_new = $request['street']; 
    $country_new = $request['country']; 
    $postal_code_new = $request['postalCode']; 
    $city_new = $request['city']; 


    $cc_number_new = $request['ccNumber']; 
    $cc_cvv_new = $request['ccCVV']; 
    $cc_expiration_new = $request['ccDate']; 
    $cc_name_new = $request['ccName']; 

    $pp_email_new  = $request['ppEmail']; 

    //PRINT VALUES 

    //new address 
    if($new_addr == "true"){
        $address = new Address; 
        $address->street = $street_new; 
        $address->postal_code = $postal_code_new; 
        $address->city = $city_new; 
        $address->id_country = $country_new; 

        $userAddresses = Auth::user()->addresses();
        try{
            //create new address 
           $address->save(); 
           //add tp users table
           $userAddresses->attach($address->id);

        }catch(\Exception $e){
            return redirect()->back()->withErrors("Failed creating new Address!");
        }
        //update address id 
        $address_id = $address->id;  
    }

    //new payment method 
    if($new_payment == "true"){
        $userPaymentMethods = Auth::user()->payment_methods();
        //if creditcard
        if(empty($pp_email_new)){
            
            $creditCard = new CreditCard;
            $creditCard->name = $cc_name_new; 
            $creditCard->number = $cc_number_new; 
            $creditCard->expiration = $cc_expiration_new; 
            $creditCard->cvv = $cc_cvv_new; 
    
            try {
                //create new card
                $creditCard->save(); 
                
                //add the card to payment methods table 
                $payment_method = new PaymentMethod; 
                $payment_method->id_cc = $creditCard->id; 
                $payment_method->save();
            
                //add the the payment method to the user 
                $userPaymentMethods->attach($payment_method->id);
    
            } catch (Exception $e) {
                return redirect()->back()->withErrors("Failed creating new Credit Card payment method!");
            }
            //update payment id 
            $payment_id =  PaymentMethod::where('id_cc',$creditCard->id)->first()->id;

        }else{//if paypal
            $paypal= new Paypal; 
            $paypal->email = $pp_email_new; 
    
            try {
                //create new card
                $paypal->save(); 
                
                //add the card to payment methods table 
                $payment_method = new PaymentMethod; 
                $payment_method->id_pp = $paypal->id; 
                $payment_method->save();
            
                //add the the payment method to the user 
                $userPaymentMethods->attach($payment_method->id);
                
            } catch (Exception $e) {
                return redirect()->back()->withErrors("Failed creating new Paypal paymenmt method!");
            }
            
            $payment_id =  PaymentMethod::where('id_pp',$paypal->id)->first()->id;

        }
    }

    //process
    $order = new Order; 
    $order->total = $total; 
    $order->id_user = Auth::user()->id; 
    $order->date = $date; 
    $order->id_address = $address_id; 
    $order->id_payment = $payment_id; 
    $order->status = "processing"; 

    echo $order; 
    
    $items = Auth::user()->cart_items()->get()->toArray();

    try {
        \DB::select('SELECT public."checkout_transaction"(?,?,?)',[Auth::user()->id, $address_id, $payment_id]);
    } catch (\Exception $e) {
       return redirect()->back()->withErrors($e->getMessage());
    }

    foreach ($items as $item) {
        $updated_item = Item::find($item['id']);
        if ($updated_item->stock == 0) {
            $notif = null;
            try {
                $notif = AdminNotification::create(['body' => "Item #$updated_item->id is out of stock"]);
                OutOfStockNotification::create(['id_notif' => $notif->id, 'id_item' => $updated_item->id]);
            } catch (Exception $e){
                if ($notif != null) 
                    $notif->delete();
            }
        }
    } 

    return redirect()->route('home')->with('status',"Order has been processed"); 

   }
   
}
