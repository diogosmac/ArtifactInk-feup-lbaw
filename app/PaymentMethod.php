<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'payment_method';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function credit_card() {
        return $this->belongsTo('App\CreditCard', 'id_cc');
    }

    public function paypal() {
        return $this->belongsTo('App\Paypal', 'id_pp');
    }

}

?>