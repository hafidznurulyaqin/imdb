@extends('layouts.app',['pageSlug' => 'actors-create'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Add New Actors') }}</h5>
                </div>
                <form method="post" action="{{ route('actors.store') }}" autocomplete="off" enctype="multipart/form-data">
                    <div class="card-body">
                        @csrf
                        @include('alerts.success')

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>{{ __('Name') }}</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                            <label>{{ __('Sex') }}</label>
                            <select name="sex" class="form-control">
                                <option style="background-color: #27293D;" selected value="-">-- Select --</option>
                                <option style="background-color: #27293D;" value="M">Male</option>
                                <option style="background-color: #27293D;" value="F">Female</option>
                                <option style="background-color: #27293D;" value="O">Other</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'sex'])
                        </div>

                        <div class="form-group{{ $errors->has('dob') ? ' has-danger' : '' }}">
                            <label>{{ __('Date Of Birth') }}</label>
                            <input type="date" name="dob" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" placeholder="{{ __('Date Of Birth') }}" value="">
                            @include('alerts.feedback', ['field' => 'dob'])
                        </div>

                        <div class="form-group{{ $errors->has('bio') ? ' has-danger' : '' }}">
                            <label>{{ __('Biography') }}</label>
                            <textarea name="bio" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}" placeholder="{{ __('Biography') }}" value=""></textarea>
                            @include('alerts.feedback', ['field' => 'bio'])
                        </div>

                        <div class="form-group{{ $errors->has('img') ? ' has-danger' : '' }}">
                            <label>{{ __('Image') }}</label>
                            <input type="file" class="form-control" name="img" size="60" />
                            @include('alerts.feedback', ['field' => 'bio'])
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
