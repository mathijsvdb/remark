<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }
}
