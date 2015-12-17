<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apikey extends Model
{
    protected $table = 'apikeys';

    public function user() {
        return $this->belongsTo('App\User');
    }
}
