<?php

namespace App\Http\Controllers;

use App\Order;
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
    print_r($address_id); 
    echo " - "; 
    print_r($payment_id); 
    echo " - "; 
    print_r($total); 
    echo " - "; 
    print_r($new_addr); 
    echo " - "; 
    print_r($new_payment); 
    echo " - "; 
    print_r($date); 
    echo " - "; 

    print_r($street_new); 
    echo " - "; 
    print_r($country_new); 
    echo " - "; 
    print_r($postal_code_new); 
    echo " - "; 
    print_r($city_new); 
    echo " - "; 

    print_r($cc_number_new); 
    echo " - "; 
    print_r($cc_cvv_new); 
    echo " - "; 
    print_r($cc_expiration_new); 
    echo " - "; 
    print_r($cc_name_new); 
    echo " - "; 
    print_r($pp_email_new);
    echo " - "; 
    //new payment method 

    //new address


    
    //process
    $order = new Order; 
    $order->total = $total; 
    $order->id_user = Auth::user()->id; 
    $order->date = $date; 
    $order->id_address = $address_id; 
    $order->id_payment = $payment_id; 
    $order->status = "processing"; 

    echo $order; 

    try {
        \DB::select('SELECT public."checkout_transaction"(?,?,?)',[Auth::user()->id, $address_id, $payment_id]);
    } catch (\Exception $e) {
       return redirect()->back()->withErrors($e->getMessage());
    }

    //empty cart 


    return redirect()->route('home')->with('status',"Order has been processed");
   }
}
