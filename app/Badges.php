<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Badges extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'userbadges';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
