@extends('layouts.app',['pageSlug' => 'movies'])

@section('content')
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-body">
                <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                            <img class="img-holder" src="{{asset($actor->image)}}" alt="">
                            <h5 class="title">{{ $actor->name }}</h5>
                        </a>
                <p class="description">
                    Year Of Release :
                  {{ $actor->year_of_release }}
                    <br>
                    Plot : {{ $actor->plot }}
                </p>
            </div>
            </p>
        </div>
        <div class="card-footer">
            <div class="button-container">
                <a class="btn btn-icon btn-round" title="Edit" href="{{route('movies.update',$actor->id)}}">
                    <i class="tim-icons icon-pencil"></i>
                </a>
                <a class="btn btn-icon btn-round" title="Back" href="{{route('movies.index')}}">
                    <i class="tim-icons icon-minimal-left"></i>
                </a>
                <a class="btn btn-icon btn-round" data-toggle="modal" data-target="#{{ $actor->id }}" title="Delete" href="#" id="del">
                    <i class="tim-icons icon-trash-simple"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
