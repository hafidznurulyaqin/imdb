<?php

namespace App\Http\Controllers\Producers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Producer;

class ProducerController extends Controller
{
    //
    //
    public function index()
    {
        $actor = Producer::paginate(15);

        return view('producers.index',['producers' => $actor]);
    }

    public function create()
    {
        return view('producers.create');
    }

    public function store(Request $request)
    {
        $actor = new Producer();
        $yearBefore = date('Y-01-01',strtotime(date('Y').'-20 Years'));

        $request->validate([
            'name' => 'string',
            'dob' => 'after:1900-01-01,before:'.$yearBefore,
            'sex' => 'alpha',
        ]);

        $actor->name = $request->name;
        $actor->dob = $request->dob;
        $actor->sex = $request->sex;
        $actor->bio = $request->bio;

        $actor->save();

        return redirect(route('producers.index'))->with(['status' => 'Producer Successfully created']);
    }

    public function show($id)
    {
        $actor = Producer::find($id);

        return view('producers.show',['producer' => $actor]);
    }

    public function update($id)
    {
        $actor = Producer::find($id);

        return view('producers.edit',['producer' => $actor]);
    }

    public function put(Request $request,$id)
    {
        $actor = Producer::find($id);

        $yearBefore = date('Y-01-01',strtotime(date('Y').'-20 Years'));

        $request->validate([
            'name' => 'string',
            'dob' => 'after:1900-01-01,before:'.$yearBefore,
            'sex' => 'alpha',
        ]);

        $actor->name = $request->name;
        $actor->dob = $request->dob;
        $actor->sex = $request->sex;
        $actor->bio = $request->bio;

        $actor->update();

        return redirect(route('producers.index'))->with(['status' => 'Producer Successfully updated']);
    }

    public function delete($id)
    {
        Producer::destroy($id);

        return redirect(route('producers.index'))->with(['status' => 'Producer Successfully deleted']);
    }
}
