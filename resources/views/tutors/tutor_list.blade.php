@extends('layouts.master')

@section('content')
    <div class="starter-template">
        <h1 style="border-bottom:2px solid black">List of all tutors</h1>
       <table>
           <tr>
               <th>Name</th>
               <th>Major</th>
               <th>Location</th>
               <th>Rating</th>
           </tr>
        @foreach($tutors as $tutor)
            <tr>
                <td><a href="/tutors_list/{{  $tutor->id }}">{{ $tutor->lastname }}, {{ $tutor->firstname }}</a></td>
                <td>{{ $tutor->majors }}</td>
                <td>{{ $tutor->location }}</td>
                <td><img src="{{ App\Utils::getStarImage($tutor->rating) }}"></img>({{round($tutor->rating)}})</td>
            </tr>
        @endforeach
       </table>
    </div>
@endsection