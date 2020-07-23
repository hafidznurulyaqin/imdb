<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    //
    public $guarded = ['id'];

    public function movies()
    {
        return $this->hasMany('App\Movies');
    }
}
