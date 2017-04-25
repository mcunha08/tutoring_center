@extends('layouts.master')

@section('content')
    <div class="starter-template">
       @foreach($tutors as $tutor)
            <a href="/tutors_list/{{  $tutor->id }}">{{ $tutor->firstname }} {{ $tutor->lastname }}  Rating: {{ $tutor->rating }}</a><br/>
           @endforeach
    </div>
@endsection