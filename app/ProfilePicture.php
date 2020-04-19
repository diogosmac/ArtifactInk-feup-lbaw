<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilePicture extends Model
{

    protected $table = 'profile_picture';
    /**
   * The user this card belongs to
   */
  public function user() {
    return $this->hasOne('App\User','id_picture');
  }

}
