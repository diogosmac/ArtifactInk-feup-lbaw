<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemSubscriber extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_subscriber';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * A subscriber is subscribed to many items
     */
    public function items() {
        return $this->belongsToMany('App\Item', 'item_subscription', 'email_subscriber', 'id_item');
    }


}
