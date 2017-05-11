@extends('layouts.master')

@section('content')
    <div class="starter-template">
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