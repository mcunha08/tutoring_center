@extends('layouts.master')

@section('content')
    <div class="starter-template">
        Search for Tutor by name:
        <form method="POST" action="/supersecret_tutor_search">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('namesearch') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="namesearch" type="text" class="form-control" name="namesearch" value="{{ old('name') }}" autofocus>
                </div>
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
        <br/>
        <br/>
        <br/>
        <br/>
        Search for Student by name:
        <form method="POST" action="/supersecret_student_search">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('namesearch') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <input id="namesearch" type="text" class="form-control" name="namesearch" value="{{ old('name') }}" autofocus>
                </div>
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
        <br/>
        <br/>
        <br/>
        <br/>
        <h2>Tutoring sessions:</h2>
        (Blank because tutoring sessions haven't been implemented)
        <h2>Tutoring charges:</h2>
        (Blank because we don't have a system for tutors to charge money yet)
        <h1>All activity</h1>
        <ul>
            @foreach($all_logs as $log)
                <li>{{ $log->created_at }}: {{ $log->log_body }}</li>
            @endforeach
        </ul>
    </div>
@endsection