@extends('layouts.master')

@section('content')
    <div class="starter-template">
        <h1 style="border-bottom:2px solid black">List of all tutors</h1>
       @foreach($tutors as $tutor)
           <p style="font-size: 2em;border-bottom: 2px solid black"> <a href="/tutors_list/{{  $tutor->id }}">Name: {{ $tutor->lastname }}, {{ $tutor->firstname }}  Rating: {{ $tutor->rating }}</p></a><br/>
        @endforeach
    </div>
@endsection