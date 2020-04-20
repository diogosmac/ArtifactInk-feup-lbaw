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
    public function subscribers() {
        return $this->belongsToMany('App\Item', 'item_subscription', 'id_item', 'email_subscriber');
    }


}
