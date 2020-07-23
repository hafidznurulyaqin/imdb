<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorMovies extends Model
{
    //
    public $table = 'actor_movies';

    public $guarded = ['id'];

    public function actor()
    {
        return $this->belongsTo('App\Actors','actor_id');
    }
}
