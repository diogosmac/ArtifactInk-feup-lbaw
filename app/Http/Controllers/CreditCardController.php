<?php

namespace App\Http\Controllers;

use App\CreditCard;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditCardController extends Controller
{
    public function addCreditCard(Request $request){

        if (!Auth::check()) return redirect('/sign_in');

        $userPaymentMethods = Auth::user()->payment_methods();

        $this->validate($request, [
            'name' => 'required|max:255', 
            'number' => 'required|max:20', 
            'expiration' => 'required|date|after:today', 
            'cvv' => 'required'
          ]);

        $name = $request['name']; 
        $number = $request['number']; 
        $expiration = $request['expiration']; 
        $cvv = $request['cvv']; 

        $creditCard = new CreditCard;
        $creditCard->name = $name; 
        $creditCard->number = $number; 
        $creditCard->expiration = $expiration; 
        $creditCard->cvv = $cvv; 

        try {
            //create new card
            $creditCard->save(); 
            
            //add the card to payment methods table 
            $payment_method = new PaymentMethod; 
            $payment_method->id_cc = $creditCard->id; 
            $payment_method->save();
        
            //add the the payment method to the user 
            $userPaymentMethods->attach($payment_method->id);

		} catch (PDOException $e) {
			return response('Added Credit Card to Payment Methods');
		}

        return redirect()->route('profile.home');
    }

    public function updateCreditCard(Request $request){

        if (!Auth::check()) return redirect('/sign_in');
        $this->validate($request, [
            'name' => 'required|max:255', 
            'number' => 'required|max:20', 
            'expiration' => 'required|date|after:today', 
            'cvv' => 'required',
            'id' => 'required'
          ]);
        $id = $request['id']; 
        $name = $request['name']; 
        $number = $request['number']; 
        $expiration = $request['expiration']; 
        $cvv = $request['cvv']; 

        $creditCard = CreditCard::where('id',$id)->first();
    
        try {
           $creditCard->update(['name' => $name, 'number' => $number, 'expiration' => $expiration , 'cvv' => $cvv]);
		} catch (PDOException $e) {
			return response('Updated Credit Card');
		}
       
        return redirect()->route('profile.home');

    }

    public function deleteCreditCard(){

    }
}
