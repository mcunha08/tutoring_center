@extends('layouts.master')

@section('content')
    <br/>
    <h2>Search Results:</h2>
    @if(count($tutors) == 0)
        We couldn't find a tutor with your specified search parameters
    @else
        <table>
            <tr>
                <th>Name</th>
                <th>Major</th>
                <th>Location</th>
                <th>Availability</th>
                <th>Rating</th>
            </tr>
            @foreach($tutors as $tutor)
                <tr>
                    <td><a href="/tutors_list/{{  $tutor->id }}">{{ $tutor->lastname }}, {{ $tutor->firstname }}</a>
                    </td>
                    <td>{{ $tutor->majors }}</td>
                    <td>{{ $tutor->location }}</td>
                    <td>{{$tutor->availability}}</td>
                    <td><img src="{{ App\Utils::getStarImage($tutor->rating) }}"></img>({{round($tutor->rating)}})</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection