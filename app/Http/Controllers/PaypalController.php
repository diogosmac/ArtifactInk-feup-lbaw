<?php

namespace App\Http\Controllers;

use App\Paypal;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaypalController extends Controller
{
    public function addPaypal(Request $request){
       
        if (!Auth::check()) return redirect('/sign_in');

        $this->validate($request, [
            'email' => 'required|email'
          ]);

        $userPaymentMethods = Auth::user()->payment_methods();

        $email = $request['email']; 

        $paypal= new Paypal;
        $paypal->email = $email; 

     

        try {
            //create new card
            $paypal->save(); 
            
            //add the card to payment methods table 
            $payment_method = new PaymentMethod; 
            $payment_method->id_pp = $paypal->id; 
            $payment_method->save();
        
            //add the the payment method to the user 
            $userPaymentMethods->attach($payment_method->id);

		} catch (PDOException $e) {
			return response('Added Paypal to Payment Methods');
		}

        return redirect()->route('profile.home');
    }

    public function updatePaypal(Request $request){

        if (!Auth::check()) return redirect('/sign_in');


        $this->validate($request, [
            'email' => 'required|email'
          ]);

          
        $id = $request['id']; 
        $email = $request['email']; 

        $paypal = Paypal::where('id',$id)->first();
    
        try {
           $paypal->update(['email' => $email]);
		} catch (PDOException $e) {
			return response('Updated Paypal');
		}
       
        return redirect()->route('profile.home');

    }

    public function deletePaypal(Request $request){
        try {
            Paypal::where('id', $request['id'])->delete(); 
         } catch (PDOException $e) {
             return response('error deleting address');
         }
         return redirect()->route('profile.home');
    }
}
