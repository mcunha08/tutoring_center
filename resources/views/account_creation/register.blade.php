@extends('layouts.master')

@section('content')
    <div class="starter-template">
        <h1>Create a new account</h1>
        <form method="POST" action="/register">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                <label for="firstname" class="col-md-4 control-label">First Name:</label>

                <div class="col-md-6">
                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('firstname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="lastname" class="col-md-4 control-label">Last Name:</label>

                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                <label for="location" class="col-md-4 control-label">Location:</label>

                <div class="col-md-6">
                    <input id="location" type="text" class="form-control" name="location" value="{{ old('location') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('majors') ? ' has-error' : '' }}">
                <label for="majors" class="col-md-4 control-label">Major(s):</label>

                <div class="col-md-6">
                    <input id="majors" type="text" class="form-control" name="majors" value="{{ old('location') }}" required autofocus>

                    @if ($errors->has('majors'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('majors') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('profile_picture') ? ' has-error' : '' }}">
                <label for="profile_picture" class="col-md-4 control-label">Profile Picture</label>

                <div class="col-md-6">
                    <input id="profile_picture" type="file" class="form-control" name="profile_picture" required>

                    @if ($errors->has('profile_picture'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('profile_picture') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Type of student:</label>

                <div class="col-md-6">
                    <select name="type">
                        <option value="tutor">Tutor</option>
                        <option value="student">Student</option>
                        <option value="instructor">Instructor</option>
                    </select>
                    </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection