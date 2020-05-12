<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'credit_card';

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'number', 'expiration', 'cvv'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'number', 'cvv',
    ];

}

?>