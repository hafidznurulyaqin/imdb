@extends('layouts.app',['pageSlug' => 'producers'])

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title">Producers</h2>
                        </div>
                    </div>
                    <a href="{{route('producers.create')}}" class="btn btn-fill btn-primary float-right">{{ __('Add') }}</a>
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
                            @foreach($producers as $producer)
                            <tr>
                                <td>
                                    <a href="{{route('producers.show',$producer->id)}}">{{ $producer->name }}</a>
                                </td>
                                <td>
                                    @if($producer->sex === 'F')
                                        @php echo 'Female'; @endphp
                                    @elseif($producer->sex === 'M')
                                        @php echo 'Male'; @endphp
                                    @else
                                        @php echo 'Other'; @endphp
                                    @endif
                                </td>
                                <td>
                                    {{ $producer->dob }}
                                </td>
                                <td class="text-justify col-md-4">
                                    @if(strlen($producer->bio) > 298)
                                    {{ substr($producer->bio,0,298) }}...<a href="{{url(route('producers.show',$producer->id))}}">More</a>
                                    @else
                                    {{ $producer->bio }}
                                    @endif
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
