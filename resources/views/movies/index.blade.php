@extends('layouts.app',['pageSlug' => 'movies'])

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title">{{ __('Movies') }}</h2>
                        </div>
                    </div>
                    <a href="{{route('movies.create')}}" class="btn btn-fill btn-primary float-right">{{ __('Add') }}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Year of Release
                                </th>
                                <th>
                                    Plot
                                </th>
                                <th class="text-center">
                                    Image
                                </th>
                                <th>
                                    Producer
                                </th>
                                <th>
                                    List of Actors
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($movies as $movie)
                            <tr>
                                <td>
                                    <a href="{{route('movies.show',$movie->id)}}">{{ $movie->name }}</a>
                                </td>
                                <td>
                                 {{ $movie->year_of_release }}
                                </td>
                                <td>
                                    {{ $movie->plot }}
                                </td>
                                <td class="text-center">
                                    <img class="img-thumbnail" src="{{asset($movie->image)}}" alt="">
                                </td>
                                <td class="text-center">
                                    <img class="card-img" src="{{asset($movie->image)}}" alt="">
                                </td>
                                <td class="text-center">
                                    <img class="figure-img" src="{{asset($movie->image)}}" alt="">
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
