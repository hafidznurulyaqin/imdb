@extends('layouts.app',['pageSlug' => 'actors'])

@section('content')
    <div class="col-md-4">
        <div class="card card-user">
            <div class="card-body">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                            <!-- <img class="avatar" src="{{ asset('black') }}/img/default-avatar.png" alt=""> -->
                            <img class="avatar" src="{{asset($actor->img)}}" alt="">
                            <h5 class="title">{{ $actor->name }}</h5>
                        </a>
                        <p class="description">
                            Gender :
                            @if($actor->sex === 'F')
                                @php echo 'Female'; @endphp
                            @elseif($actor->sex === 'M')
                                @php echo 'Male'; @endphp
                            @else
                                @php echo 'Other'; @endphp
                            @endif
                            <br>
                            Date Of Birth : {{ $actor->dob }}
                        </p>
                </div>
                <div class="card-description text-justify">
                    {{ $actor->bio }}
                </div>
            </div>
            <div class="card-footer">
                <div class="button-container">
                    <a class="btn btn-icon btn-round" title="Edit" href="{{route('actors.update',$actor->id)}}">
                        <i class="tim-icons icon-pencil"></i>
                    </a>
                    <a class="btn btn-icon btn-round" data-toggle="modal" data-target="#{{ $actor->id }}" title="Delete" href="#" id="del">
                        <i class="tim-icons icon-trash-simple"></i>
                    </a>
                    <a class="btn btn-icon btn-round" title="Back" href="{{route('actors.index')}}">
                        <i class="tim-icons icon-minimal-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
