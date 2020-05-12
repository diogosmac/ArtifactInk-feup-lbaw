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
        'name', 'email', 'password', 'date_of_birth', 'phone'
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

    /**
     * The user's payment methods
     */
    public function payment_methods() {
        return $this->belongsToMany('App\PaymentMethod', 'user_payment_method', 'id_user', 'id_payment_method');
    }

    /**
     * The user's addresses
     */
    public function addresses() {
        return $this->belongsToMany('App\Address', 'user_address', 'id_user', 'id_address');
    }
    
    /**
     * The user's reviews
     */
    public function reviews() {
        return $this->hasMany('App\Review', 'id_user');
    } 

    /**
     * The user's orders
     */
    public function orders() {
        return $this->hasMany('App\Order', 'id_user');
    }
}
