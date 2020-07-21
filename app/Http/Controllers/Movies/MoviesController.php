<?php

namespace App\Http\Controllers\Movies;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Movies;

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

        return view('movies.create',['years' => $years]);
    }

    public function store(Request $request)
    {
        $movie = new Movies();

        $movie->name = $request->name;
        $movie->year_of_release = $request->year_of_release;
        $movie->plot = $request->plot;
        $movie->image = $request->image;

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

        return view('movies.edit',['movie' => $movie,'years'=> $years]);
    }

    public function put(Request $request,$id)
    {
        $movie = Movies::find($id);

        $movie->name = $request->name;
        $movie->year_of_release = $request->year_of_release;
        $movie->plot = $request->plot;
        $movie->image = $request->image;

        $movie->update();

        return redirect(route('movies.index'))->with(['success' => 'Movies Successfully updated']);
    }

    public function delete($id)
    {
        Movies::destroy($id);

        return redirect(route('movies.index'))->with(['success' => 'Movies Successfully deleted']);
    }
}
