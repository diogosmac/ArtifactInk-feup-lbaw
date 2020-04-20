<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
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
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 'active',
    ];

    /**
     * An item belongs to a category because fk is in item table
     */
    public function category() {
        return $this->belongsTo('App\Category', 'id_category');
    }

    /**
     * An item has many images
     */
    public function images() {
        return $this->hasMany('App\ItemPicture', 'id_item');
    }

    /**
     * An item has many reviews
     */
    public function reviews() {
        return $this->hasMany('App\Review', 'id_item');
    }
}
