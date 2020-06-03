<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addAddress(Request $request){
        if (!Auth::check()) return redirect('/sign_in');

        $userAddresses = Auth::user()->addresses();

        $this->validate($request, [
            'street' => 'required|max:255', 
            'postal_code' => 'required|max:20', 
            'city' => 'required|max:255', 
            'id_country' => 'required'
          ]);

        $street = $request['street']; 
        $postal_code = $request['postal_code']; 
        $city = $request['city']; 
        $id_country = $request['id_country']; 

        $address = new Address;
        $address->street = $street; 
        $address->postal_code = $postal_code; 
        $address->city = $city; 
        $address->id_country = $id_country;  
        
        try {
            //create new address 
            $address->save(); 
            //add tp users table
            $userAddresses->attach($address->id);
		} catch (PDOException $e) {
			return response('Added to addresses');
		}

        return redirect()->route('profile.home');
    }

    public function updateAddress(Request $request){
        
        if (!Auth::check()) return redirect('/sign_in');

        $this->validate($request, [
            'street' => 'required|max:255', 
            'postal_code' => 'required|max:20', 
            'city' => 'required|max:255', 
            'id_country' => 'required',
            'id' => 'required'
        ]);

        $id = $request['id'];
        $street = $request['street']; 
        $postal_code = $request['postal_code']; 
        $city = $request['city']; 
        $id_country = $request['id_country']; 

        $address = Address::where('id',$id)->first();
    
      
        try {
            $address->update(['street' => $street, 'postal_code' => $postal_code, 'city' => $city , 'id_country' => $id_country]);
		} catch (PDOException $e) {
			return response('Updated Addresses');
		}
       
         return redirect()->route('profile.home');


    }

    public function deleteAddress(Request $request){

              
        try {
            Auth::user()->addresses()->detach($request['id']);
		} catch (PDOException $e) {
			return response('deleted Addresses');
		}
        return redirect()->route('profile.home');

    }
}
