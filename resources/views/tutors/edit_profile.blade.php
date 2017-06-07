@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit your profile</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/edit_profile" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name:</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ Auth::user()->firstname }}" required autofocus>

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
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastname }}" required autofocus>

                                @if ($errors->has('lastname'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location:</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" value="{{ Auth::user()->location }}" required autofocus>

                                @if ($errors->has('location'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>

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
                                <input id="majors" type="text" class="form-control" name="majors" value="{{ Auth::user()->majors  }}" required autofocus>

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
                        <div class="form-group{{ $errors->has('first_date_of_attendance') ? ' has-error' : '' }}">
                            <label for="first_date_of_attendance" class="col-md-4 control-label">First date of attendance</label>

                            <div class="col-md-6">
                                <input id="first_date_of_attendance" type="date" class="form-control" name="first_date_of_attendance" required>

                                @if ($errors->has('first_date_of_attendance'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_date_of_attendance') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tutor_start') ? ' has-error' : '' }}">
                            <label for="tutor_start" class="col-md-4 control-label">When you became a tutor:</label>

                            <div class="col-md-6">
                                <input id="tutor_start" type="date" class="form-control" name="tutor_start" required>

                                @if ($errors->has('tutor_start'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tutor_start') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('availability') ? ' has-error' : '' }}">
                            <label for="availability" class="col-md-4 control-label">Availability:</label>

                            <div class="col-md-6">
                                <input id="availability" type="text" class="form-control" name="availability" value="{{ Auth::user()->availability  }}" required autofocus>

                                @if ($errors->has('availability'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('availability') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('calendar_link') ? ' has-error' : '' }}">
                            <label for="calendar_link" class="col-md-4 control-label">Calendar Link:</label>

                            <div class="col-md-6">
                                <input id="calendar_link" type="text" class="form-control" name="calendar_link" value="{{ Auth::user()->calendar  }}" required autofocus>

                                @if ($errors->has('calendar_link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('calendar_link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('fee') ? ' has-error' : '' }}">
                            <label for="fee" class="col-md-4 control-label">Fee charged per hour ($): </label>

                            <div class="col-md-6">
                                <input id="fee" type="text" class="form-control" name="fee" value="{{ Auth::user()->fee  }}" required autofocus>

                                @if ($errors->has('fee'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fee') }}</strong>
                                    </span>
                                @endif
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
            </div>
        </div>
    </div>
</div>
@endsection
