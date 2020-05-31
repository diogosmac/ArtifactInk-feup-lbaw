<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        return $this->hasMany('App\Item', 'id_category');
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

    public function getUrlAttribute(): string {
        return action('CategoryController@show', [$this->id, $this->getSlug()]);
    }

    public function getSlug(): string {
        return Str::slug($this->name, "-");
    }


}
