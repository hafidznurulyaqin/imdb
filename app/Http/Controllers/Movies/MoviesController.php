<?php

namespace App\Http\Controllers\Movies;

use App\ActorMovies;
use App\Actors;
use App\Producer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Movies;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{
    //
    public function index()
    {
        $movie = Movies::with('producer','actorMovies')->paginate(15);

        return view('movies.index',['movies' => $movie]);
    }

    public function create()
    {
        $years = range(1900, strftime("%Y", time()));

        $producers = Producer::all();

        $actors = Actors::all();

        return view('movies.create',['years' => $years,'producers' => $producers,'actors' => $actors]);
    }

    public function store(Request $request)
    {
        $movie = new Movies();

        if($request->has('img'))
        {
            if ($request->file('img')->isValid()) {
                //
                $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);

                $extension = $request->img->extension();

                $request->image->storeAs('/public', $request->name.".".$extension);

                $url = Storage::url($request->name.".".$extension);

                $movie->image = $url;
            }
        }

        $movie->name = $request->name;
        $movie->year_of_release = $request->year_of_release;
        $movie->plot = $request->plot;
        $movie->producer_id = $request->producer;
        $movie->save();

        if($request->has('actors'))
        {
            $actors = $request->actors;

            foreach($actors as $actor)
            {
                $newActorMovies = new ActorMovies();
                $newActorMovies->actor_id = $actor;
                $newActorMovies->movies_id = $movie->id;
                $newActorMovies->save();
            }
        }

        return redirect(route('movies.index'))->with(['status' => 'Movies Successfully created']);
    }

    public function show($id)
    {
        $movie = Movies::find($id);

        return view('movies.show',['actor' => $movie]);
    }

    public function update($id)
    {
        $movie = Movies::find($id);

        $years = range(1900, strftime("%Y", time()));

        $producers = Producer::all();

        $actors = Actors::all();

        $actorMovies = ActorMovies::where('movies_id',$id)->pluck('id')->toArray();

        return view('movies.edit',['movie' => $movie,'years'=> $years,'producers' => $producers,'actors'=> $actors,'actor_movies' => $actorMovies]);
    }

    public function put(Request $request,$id)
    {
        $movie = Movies::find($id);

        if($request->has('image'))
        {
            if ($request->file('image')->isValid()) {
                //
                $request->validate([
                    'image' => 'mimes:jpeg,png|max:1014',
                ]);

                $extension = $request->image->extension();

                $request->image->storeAs('/public', $request->name.".".$extension);

                $url = Storage::url($request->name.".".$extension);

                $movie->image = $url;
            }
        }

        $movie->name = $request->name;
        $movie->year_of_release = $request->year_of_release;
        $movie->plot = $request->plot;
        $movie->producer_id = $request->producer;

        $movie->update();

        if($request->has('actors'))
        {
            $actors = $request->actors;
            ActorMovies::where('movies_id',$movie->id)->delete();
            foreach($actors as $actor)
            {
                $newActorMovies = new ActorMovies();
                $newActorMovies->actor_id = $actor;
                $newActorMovies->movies_id = $movie->id;
                $newActorMovies->save();
            }
        }

        return redirect(route('movies.index'))->with(['status' => 'Movies Successfully updated']);
    }

    public function delete($id)
    {
        Movies::destroy($id);

        return redirect(route('movies.index'))->with(['status' => 'Movies Successfully deleted']);
    }
}
