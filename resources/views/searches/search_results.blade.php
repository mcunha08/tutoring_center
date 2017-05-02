@extends('layouts.master')

@section('content')
    <br/>
    <h2>Search Results:</h2>
        @foreach($tutors as $tutor)
            {{ $tutor->lastname }}, {{ $tutor->firstname }} Location: {{ $tutor->location }} Rating: {{ $tutor->rating }}<br/>
        @endforeach
@endsection