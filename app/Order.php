<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * An order belongs to one user
     */
    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }

    /**
     * An order belongs to one address
     */
    public function address() {
        return $this->belongsTo('App\Address', 'id_address');
    }

    /**
     * An order has many items
     */
    public function items() {
        return $this->belongsToMany('App\Item', 'item_purchase', 'id_order', 'id_item')->withPivot(['price', 'quantity']);
    }

}
