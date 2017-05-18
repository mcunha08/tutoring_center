@extends('layouts.master')

@section('content')
    <br/>
    <h2>Search Results:</h2>
        @foreach($tutors as $tutor)
            <a href="/tutors_list/{{$tutor->id}}">{{ $tutor->lastname }}, {{ $tutor->firstname }}</a> Location: {{ $tutor->location }} Rating: {{ $tutor->rating }}<br/>
        @endforeach
@endsection