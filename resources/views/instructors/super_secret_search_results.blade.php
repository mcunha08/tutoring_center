@extends('layouts.master')

@section('content')
    <div class="starter-template">
       {{ $type }} search results for {{ $search_string }}
           <table>
               <tr>
                   <th>Name</th>
                   <th>Email</th>
                   <th>Major</th>
                   <th>Location</th>
                   <th>Rating</th>
               </tr>
               @foreach($results as $result)
                   <tr>
                       <td><a href="/tutors_list/{{  $result->id }}">{{ $result->lastname }}, {{ $result->firstname }}</a></td>
                       <td>{{ $result->email }}</td>
                       <td>{{ $result->majors }}</td>
                       <td>{{ $result->location }}</td>
                       <td><img src="{{ App\Utils::getStarImage($result->rating) }}"></img>({{round($result->rating)}})</td>
                   </tr>
               @endforeach
           </table>

@endsection