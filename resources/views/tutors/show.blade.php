@extends('layouts.master')

@section('content')
    <div class="starter-template">
        <form method="POST" action="/tutor_detail">
            {{ csrf_field() }}
            <input type='hidden' name='userid' value='{{  $user->id }}'/>
            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    <label for="firstname" class="col-md-4 control-label">First Name: {{ $user->firstname }}</label>
                </div>
            </div>
            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    <label for="lastname" class="col-md-4 control-label">Last Name: {{ $user->lastname }}</label>
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    <label for="email" class="col-md-4 control-label">E-Mail Address: {{ $user->email }}</label>
                </div>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    <label for="password" class="col-md-4 control-label">Rating</label>
                    <input id="rating" type="text" class="form-control" name="rating" required>
                    @if ($errors->has('rating'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rating') }}</strong>
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
@endsection