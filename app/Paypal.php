<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paypal extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'paypal';

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}

?>