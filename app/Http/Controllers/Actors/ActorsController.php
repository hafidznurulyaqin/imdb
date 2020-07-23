<?php

namespace App\Http\Controllers\Actors;

use App\Actors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ActorsController extends Controller
{
    //
    public function index()
    {
        $actor = Actors::paginate(15);

        return view('actors.index',['actors' => $actor]);
    }

    public function create()
    {
        return view('actors.create');
    }

    public function store(Request $request)
    {
        $actor = new Actors();

        /**
         * Only Receive string for the name
         * DOB only available after year 1900
         * Sex is only accept Alphabet
         */
        $request->validate([
            'name' => 'string',
            'dob' => 'after:1900-01-01',
            'sex' => 'alpha',
        ]);

        if($request->has('img'))
        {
            if ($request->file('img')->isValid()) {
                //
                $request->validate([
                    'img' => 'mimes:jpeg,png|max:1014',
                ]);

                $extension = $request->img->extension();

                $request->img->storeAs('/public', $request->name.".".$extension);

                $url = Storage::url($request->name.".".$extension);

                $actor->img = $url;
            }
        }


        $actor->name = $request->name;
        $actor->dob = $request->dob;
        $actor->sex = $request->sex;
        $actor->bio = $request->bio;

        $actor->save();

        return redirect(route('actors.index'))->with(['status' => 'Actor Successfully created']);
    }

    public function show($id)
    {
        $actor = Actors::find($id);

        return view('actors.show',['actor' => $actor]);
    }

    public function update($id)
    {
        $actor = Actors::find($id);

        return view('actors.edit',['actor' => $actor]);
    }

    public function put(Request $request,$id)
    {
        $actor = Actors::find($id);

        /**
         * Only Receive string for the name
         * DOB only available after year 1900
         * Sex is only accept Alphabet
         */
        $request->validate([
            'name' => 'string',
            'dob' => 'after:1900-01-01',
            'sex' => 'alpha'
        ]);

        if($request->has('img'))
        {
            if ($request->file('img')->isValid()) {
                //
                $request->validate([
                    'img' => 'mimes:jpeg,png|max:1014',
                ]);

                $extension = $request->img->extension();

                $request->img->storeAs('/public', $request->name.".".$extension);

                $url = Storage::url($request->name.".".$extension);

                $actor->img = $url;
            }
        }


        $actor->name = $request->name;
        $actor->dob = $request->dob;
        $actor->sex = $request->sex;
        $actor->bio = $request->bio;

        $actor->update();

        return redirect(route('actors.index'))->with(['status' => 'Actor Successfully updated']);
    }

    public function delete($id)
    {
        Actors::destroy($id);

        return redirect(route('actors.index'))->with(['status' => 'Actor Successfully deleted']);
    }
}
