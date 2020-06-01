<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportNotification extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'report_notification';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_notif','id_review'
    ];
}

?>