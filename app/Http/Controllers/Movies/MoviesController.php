<?php

namespace App\Http\Controllers\Movies;

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

        return redirect(route('movies.index'))->with(['success' => 'Movies Successfully updated']);
    }

    public function delete($id)
    {
        Movies::destroy($id);

        return redirect(route('movies.index'))->with(['success' => 'Movies Successfully deleted']);
    }
}
