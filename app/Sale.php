<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sale';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * A sale is applied to many items
     */
    public function items() {
        return $this->belongsToMany('App\Item', 'item_sale', 'id_item', 'id_sale');
    }

}
