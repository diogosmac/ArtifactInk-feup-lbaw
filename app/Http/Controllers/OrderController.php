<?php

namespace App\Http\Controllers;

use App\Address;
use App\CreditCard;
use App\Order;
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

    try {
        //create new order
        //$order->save();
        \DB::select('SELECT public."checkout_transaction"(?,?,?)',[Auth::user()->id, $address_id, $payment_id]);
        //add tp users table
        //$userAddresses->attach($address->id);

    } catch (PDOException $e) {
        return redirect()->route('/');
    }

    //empty cart 
    return redirect()->route('home')->with('status',"Order has been processed"); 

   }
   
}
