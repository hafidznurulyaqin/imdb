<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    //
    public $guarded = ['id'];

    public function movies()
    {
        return $this->belongsToMany('App\Actors');
    }
}
