@extends('layouts.app',['pageSlug' => 'movies-update'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Update Movies') }}</h5>
                </div>
                <form method="post" action="{{ route('movies.put',$movie->id) }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @method('put')
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $movie->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('year_of_release') ? ' has-danger' : '' }}">
                            <label>{{ __('Year Of Release') }}</label>
                            <select name="year_of_release" class="form-control select2">
                                <option style="background-color: #27293D;" value="-">-- Select --</option>
                                @foreach($years as $year)
                                        <option style="background-color: #27293D;" @if((string)$year === $movie->year_of_release) {{ __('selected') }} @else {{__('')}} @endif value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'year_of_release'])
                        </div>

                        <div class="form-group{{ $errors->has('plot') ? ' has-danger' : '' }}">
                            <label>{{ __('Plot') }}</label>
                            <input type="text" name="plot" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" placeholder="{{ __('Plot') }}" value="{{ old('plot',$movie->plot) }}">
                            @include('alerts.feedback', ['field' => 'plot'])
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                            <label>{{ __('Image') }}</label>
                            <input type="file" class="form-control" name="image" value="Upload" placeholder="Upload">
                            @include('alerts.feedback', ['field' => 'image'])
                        </div>

                        <div class="form-group{{ $errors->has('producer') ? ' has-danger' : '' }}">
                            <label>{{ __('Producer') }}</label>
                            <select name="producer" class="form-control select2">
                                <option selected value="-">-- Select --</option>
                                @foreach($producers as $producer)
                                    <option @if($movie->producer_id === $producer->id){{ __('selected') }} @endif value="{{ $producer->id }}">{{ $producer->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'producer'])
                        </div>

                        <div class="form-group{{ $errors->has('actors') ? ' has-danger' : '' }}">
                            <label>{{ __('Actors') }}</label>
                            <select name="actors[]" class="form-control select2" multiple="multiple">
                                @foreach($actors as $i => $actor)
                                    <option @if(in_array($actor->id,$actor_movies)) {{__('selected')}} @endif value="{{ $actor->id }}">{{ $actor->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'actors[]'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
