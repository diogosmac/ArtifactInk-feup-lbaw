<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'store';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_address', 'phone', 'email', 'about_us', 'payments_shipment', 'returns', 'warranty'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * A store belongs to an address because fk is in the store table
     */
    public function address() {
        return $this->belongsTo('App\Address', 'id_address');
    }
}
