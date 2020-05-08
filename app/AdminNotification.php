<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_notification';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function out_of_stock_notification() {
        return $this->hasOne('App\OutOfStockNotification', 'id_notif');
    }

    public function report_notification() {
        return $this->hasOne('App\ReportNotification', 'id_notif');
    }
}

?>