<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPicture extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * A product picture belongs to a single product
     */
    public function item() {
        return $this->belongsTo('App\Item');
    }
}
