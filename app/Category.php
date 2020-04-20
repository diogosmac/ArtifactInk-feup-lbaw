<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * A category has many items
     */
    public function item() {
        return $this->hasMany('App\Item');
    }

    /**
     * A category may have a parent category
     */
    public function parent() {
        return $this->belongsTo('App\Category', 'id_parent');
    }

    /**
     * A category may have many children category
     */
    public function children() {
        return $this->hasMany('App\Category', 'id_parent');
    }


}
