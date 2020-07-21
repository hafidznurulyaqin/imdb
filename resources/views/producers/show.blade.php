@extends('layouts.app',['pageSlug' => 'producers'])

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
                            <img class="avatar" src="{{ asset('black') }}/img/default-avatar.png" alt="">
                            <h5 class="title">{{ $producer->name }}</h5>
                        </a>
                <p class="description">
                    Gender :
                    @if($producer->sex === 'F')
                        @php echo 'Female'; @endphp
                    @elseif($producer->sex === 'M')
                        @php echo 'Male'; @endphp
                    @else
                        @php echo 'Other'; @endphp
                    @endif
                    <br>
                    Date Of Birth : {{ $producer->dob }}
                </p>
            </div>
            </p>
            <div class="card-description text-justify">
                {{ $producer->bio }}
            </div>
        </div>
        <div class="card-footer">
            <div class="button-container">
                <a class="btn btn-icon btn-round" title="Edit" href="{{route('producers.update',$producer->id)}}">
                    <i class="tim-icons icon-pencil"></i>
                </a>
                <a class="btn btn-icon btn-round" title="Back" href="{{route('producers.index')}}">
                    <i class="tim-icons icon-minimal-left"></i>
                </a>
                <a class="btn btn-icon btn-round" data-toggle="modal" data-target="#{{ $producer->id }}" title="Delete" href="#" id="del">
                    <i class="tim-icons icon-trash-simple"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
