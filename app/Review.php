<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'review';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * A review belongs to an item because fk is in the review table
     */
    public function item() {
        return $this->belongsTo('App\Item', 'id_item');
    }

    /**
     * A review belongs to user because fk is in the review table
     */
    public function user() {
        return $this->belongsTo('App\User', 'id_user');
    }
}
