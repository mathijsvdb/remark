<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ads';

    public $timestamps = false;
}
