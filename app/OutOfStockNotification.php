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

    protected $primaryKey = 'id_notif';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_notif','id_item'
    ];
}

?>