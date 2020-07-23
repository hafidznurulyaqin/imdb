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

    public function producer()
    {
        return $this->belongsTo('App\Producer');
    }

    public function actorMovies()
    {
        return $this->hasMany('App\ActorMovies','movies_id');
    }

}
