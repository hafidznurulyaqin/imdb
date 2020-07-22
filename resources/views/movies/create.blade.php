@extends('layouts.app',['pageSlug' => 'movies-create'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Add New Movies') }}</h5>
                </div>
                <form method="post" action="{{ route('movies.store') }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('year_of_release') ? ' has-danger' : '' }}">
                            <label>{{ __('Year Of Release') }}</label>
                            <select name="year_of_release" class="form-control select2">
                                <option selected value="-">-- Select --</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'year_of_release'])
                        </div>

                        <div class="form-group{{ $errors->has('plot') ? ' has-danger' : '' }}">
                            <label>{{ __('Plot') }}</label>
                            <input type="text" name="plot" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" placeholder="{{ __('Plot') }}" value="">
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
                                    <option value="{{ $producer->id }}">{{ $producer->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'producer'])
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
