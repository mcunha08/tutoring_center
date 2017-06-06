@extends('layouts.master')

@section('content')
    @if($user->id == Auth::user()->id)
        <a href="/edit_profile" style="float:right">Edit your profile</a>
    @endif
    <div class="starter-template home-body">
        {{--<div class="col-md-12 text-center">--}}

        <div class="col-md-12 home-body">
            {{--<div style="float:left">--}}
            <img height="125px" width="125px" src="{{ Storage::disk('local')->url($user->profile_picture) }}"></img>
            {{--</div>--}}
        </div>
        <div class="col-md-12 home-body"><br/></div>
        {{--</div>--}}
        <div class="col-md-12">
            <label for="firstname" class="col-md-12 control-label">First Name: {{ $user->firstname }}</label>
        </div>
        <div class="col-md-12">
            <label for="lastname" class="col-md-12 control-label">Last Name: {{ $user->lastname }}</label>
        </div>
        <div class="col-md-12">
            <label for="email" class="col-md-412control-label">E-Mail Address: {{ $user->email }}</label>
        </div>
        <div class="col-md-12">
            <label for="majors" class="col-md-12 control-label">First date of
                attendance: {{ $user->first_date_of_attendance }}</label>
        </div>

        <div class="col-md-12">
            <label for="email" class="col-md-12 control-label">Majors: {{ $user->majors }}</label>
        </div>
        {{--TODO fix this--}}
        @if($user->role_id == 3)
            <div class="col-md-12">
                <label for="majors" class="col-md-12 control-label">Tutor since: {{ $user->tutor_start }}</label>
            </div>
            <div class="col-md-12">
                <label for="email" class="col-md-12 control-label">Availability: {{ $user->availability }}</label>
            </div>
            <div class="col-md-12">
                Rating: <img style="max-width:100px"
                             src="{{ App\Utils::getStarImage($user->rating) }}"></img>({{$user->rating}})
            </div>
            <div class="col-md-12 home-body"><br/></div>
            <div class="col-md-12">
                <a href="{{ $user->calendar }}" class="email-calendar-button" style="height:25px;padding:10px">Go to my Google Calendar</a>
            </div>
        @endif
        @if($user->id == auth()->user()->id)
            <div class="col-md-12 home-body"><br/></div>
            <div class="col-md-12">
                <a href="/email_students" class="email-calendar-button" style="height:25px;padding:10px">Email all students</a>
            </div>
        @endif
        <div class="col-md-12 home-body"><br/></div>
        <div class="col-md-12">
            <a href="/email_tutor/{{$user->id}}" class="email-calendar-button" style="height:25px;padding:10px">Email
                this tutor to schedule an appointment</a>
        </div>
        <div class="col-md-12 home-body"><br/></div>
        <form method="POST" action="/tutor_detail">
            {{ csrf_field() }}
            <input type='hidden' name='userid' value='{{  $user->id }}'/>

            <div class="form-group home-body {{ $errors->has('rating') ? ' has-error' : '' }}" >
                <div class="center-block text-center">
                    <label for="rating" class="control-label">Rating</label>
                    <select name="rating" class="">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
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
        </form>
    </div>

@endsection