@extends('layouts.master')

@section('content')
    <div class="starter-template">
        <h1 style="border-bottom:2px solid black">List of all users</h1>
        <table>
            <tr>
                <th>Name</th>
                <th>Major</th>
                <th>Location</th>
                <th>Rating</th>
                <th>Active</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td><a href="/tutors_list/{{  $user->id }}">{{ $user->lastname }}, {{ $user->firstname }}</a></td>
                    <td>{{ $user->majors }}</td>
                    <td>{{ $user->location }}</td>
                    <td><img src="{{ App\Utils::getStarImage($user->rating) }}"></img>({{round($user->rating)}})</td>
                    @if($user->active)
                        <td><a href="/inactivate/{{$user->id}}">Inactivate</a></td>
                    @endif
                    @if(!$user->active)
                        <td><a href="/activate/{{$user->id}}">Activate</a></td>
                    @endif
                </tr>
            @endforeach
        </table>
    </div>
@endsection