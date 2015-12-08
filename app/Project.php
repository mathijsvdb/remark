<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';
    //protected $softDelete = true;
    protected $dates = ['deleted_at'];

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
