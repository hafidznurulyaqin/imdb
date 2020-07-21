<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
    //
    public $guarded = ['id'];


    public function actors()
    {
        return $this->belongsToMany('App\Movies');
    }

}
