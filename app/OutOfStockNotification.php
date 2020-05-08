<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutOfStockNotification extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'out_of_stock_notification';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}

?>