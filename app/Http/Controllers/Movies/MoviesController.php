<?php

namespace App\Http\Controllers\Movies;

use App\Producer;
use App\ProducersMovies;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Movies;
use Illuminate\Support\Facades\Storage;

class MoviesController extends Controller
{
    //
    public function index()
    {
        $movie = Movies::paginate(15);

        return view('movies.index',['movies' => $movie]);
    }

    public function create()
    {
        $years = range(1900, strftime("%Y", time()));

        $producers = Producer::all();

        return view('movies.create',['years' => $years,'producers' => $producers]);
    }

    public function store(Request $request)
    {
        $movie = new Movies();
        $producerMovies = new ProducersMovies();


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

        $movie->save();

        if($request->has('producer'))
        {
            $producerMovies->producer_id = $request->producer;
            $producerMovies->movies_id = $movie->id;
            $producerMovies->save();
        }


        return redirect(route('movies.index'))->with(['success' => 'Movies Successfully created']);
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

        return view('movies.edit',['movie' => $movie,'years'=> $years,'producers' => $producers]);
    }

    public function put(Request $request,$id)
    {
        $movie = Movies::find($id);
        $producerMovies = ProducersMovies::where('movies_id',$id)->first();

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

        $movie->update();

        if($request->has('producer'))
        {
            if($producerMovies === null)
            {
                $producerMovies = new ProducersMovies();

                $producerMovies->producer_id = $request->producer;
                $producerMovies->movies_id = $movie->id;
                $producerMovies->save();
            } else {
                $producerMovies->producer_id = $request->producer;
                $producerMovies->update();
            }
        }

        return redirect(route('movies.index'))->with(['success' => 'Movies Successfully updated']);
    }

    public function delete($id)
    {
        Movies::destroy($id);

        return redirect(route('movies.index'))->with(['success' => 'Movies Successfully deleted']);
    }
}
