<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'newsletter_subscriber';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}

?>