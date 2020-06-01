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
        'id_notif','id_review'
    ];
}

?>