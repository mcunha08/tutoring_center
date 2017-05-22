@extends('layouts.master')

@section('content')
    <div class="starter-template">
        {{--<div class="col-md-12 text-center">--}}
            <img height="100px" width="100px" src="{{ Storage::disk('public')->url($user->profile_picture) }}"></img>
        {{--</div>--}}
        <div class="col-md-12 text-center">
            <label for="firstname" class="col-md-4 control-label">First Name: {{ $user->firstname }}</label>
            </div>
        <div class="col-md-12 text-center">
            <label for="lastname" class="col-md-4 control-label">Last Name: {{ $user->lastname }}</label>
        </div>
        <div class="col-md-12 text-center">
            <label for="email" class="col-md-4 control-label">E-Mail Address: {{ $user->email }}</label>
        </div>
        <div class="col-md-12 text-center">
            <label for="majors" class="col-md-4 control-label">Date of Birth: {{ $user->date_of_birth }}</label>
        </div>
        <div class="col-md-12 text-center">
            <label for="email" class="col-md-4 control-label">Majors: {{ $user->majors }}</label>
        </div>
        {{--TODO fix this--}}
        @if($user->role_id == 3)
        <div class="col-md-12 text-center">
            <label for="email" class="col-md-4 control-label">Availability: {{ $user->availability }}</label>
        </div>

            <a href="{{ $user->calendar }}">Go to my Google Calendar</a>
        @endif
        <a href="/email_tutor/{{$user->id}}">Email this tutor to schedule an appointment</a>

        <form method="POST" action="/tutor_detail">
            {{ csrf_field() }}
            <input type='hidden' name='userid' value='{{  $user->id }}'/>

            <div class="form-group{{ $errors->has('rating') ? ' has-error' : '' }}">
                <div class="col-md-4 text-center">
                    <label for="rating" class="col-md-4 control-label">Rating</label>
                    <input id="rating" type="text" class="form-control" name="rating" required>
                    @if ($errors->has('rating'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rating') }}</strong>
                        </span>
                    @endif
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">

                </div>
            </div>
        </form>
            </div>
    @if($user->id = Auth::user()->id)
            <a href="/edit_profile">Edit your profile</a>
    @endif
    </div>
@endsection