@extends('layouts.app',['pageSlug' => 'movies-update'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Update Movies') }}</h5>
                </div>
                <form method="post" action="{{ route('movies.put',$movie->id) }}" autocomplete="off">
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
                            <select name="year_of_release" class="form-control">
                                <option style="background-color: #27293D;" value="-">-- Select --</option>
                                @foreach($years as $year)
                                        <option style="background-color: #27293D;" @if((string)$year === $movie->year_of_release) {{ __('selected') }} @endif value="{{ $movie->year_of_release }}">{{ $movie->year_of_release }}</option>
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
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
