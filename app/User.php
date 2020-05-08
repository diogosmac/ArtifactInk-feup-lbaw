<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $table = 'user';

    use Notifiable;

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'date_of_birth'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profilePicture() {
        return $this->belongsTo('App\ProfilePicture','id_picture');
    }

    public function userAdresses(){
        //TODO 
    }

    public function userPaymentMethods(){
        //TODO 
    }

    /**
     * The items in this user's cart
     */
    public function cart_items() {
        return $this->belongsToMany('App\Item', 'cart', 'id_user', 'id_item')->withPivot(['quantity', 'date_added']);
    }

    /**
     * The items in this user's wishlist
     */
    public function wishlist_items() {
        return $this->belongsToMany('App\Item', 'wishlist', 'id_user', 'id_item');
    }
    
}
