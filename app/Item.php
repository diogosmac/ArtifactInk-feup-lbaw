<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SebastianBergmann\Environment\Console;

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

    /**
     * An item belongs to many sales
     */
    public function sales() {
        return $this->belongsToMany('App\Sale', 'item_sale', 'id_item', 'id_sale');
    }

    /**
     * An item has many subscribers
     */
    public function subscribers() {
        return $this->belongsToMany('App\ItemSubscriber', 'item_subscription', 'id_item', 'email_subscriber');
    }

    public function scopeSearch($query, $search) {
        if (!$search) {
            return $query;
        }
        return $query->
            whereRaw('setweight(to_tsvector(\'english\', "item"."name"), \'A\') || setweight(to_tsvector(\'english\', "item"."description"), \'B\') || setweight(to_tsvector(\'english\', "item"."brand"), \'C\' ) @@ plainto_tsquery(\'english\', ?)', [$search])->
            where('status', 'active');
    }

    public static function sortBestMatch($query, $search, $order) {
        $expression = 'ts_rank_cd(to_tsvector("item"."name" || \' \' || "item"."description"|| \' \' || "item"."brand"), plainto_tsquery(\'english\', ?)) ';
        if ($order == 'asc') {
            $expression = $expression . 'ASC';
        } else {
            $expression = $expression . 'DESC';
        }

        return $query->orderByRaw($expression, [$search]);
    }

    public function getUrlAttribute(): string {
        return action('ItemController@show', [$this->id, $this->getSlug()]);
    }

    public function getSlug(): string {
        return Str::slug($this->name, "-");
    }

}
