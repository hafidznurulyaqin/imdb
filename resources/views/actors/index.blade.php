@extends('layouts.app',['pageSlug' => 'actors'])

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title">Actors</h2>
                        </div>
                    </div>
                    <a href="{{route('actors.create')}}" class="btn btn-fill btn-primary float-right">{{ __('Add') }}</a>
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
                                    Sex
                                </th>
                                <th>
                                    DOB
                                </th>
                                <th class="text-center">
                                    Bio
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($actors as $actor)
                            <tr>
                                <td>
                                    <a href="{{route('actors.show',$actor->id)}}">{{ $actor->name }}</a>
                                </td>
                                <td>
                                    @if($actor->sex === 'F')
                                        @php echo 'Female'; @endphp
                                    @elseif($actor->sex === 'M')
                                        @php echo 'Male'; @endphp
                                    @else
                                        @php echo 'Other'; @endphp
                                    @endif
                                </td>
                                <td>
                                    {{ $actor->dob }}
                                </td>
                                <td class="text-center">
                                    {{ $actor->bio }}
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
