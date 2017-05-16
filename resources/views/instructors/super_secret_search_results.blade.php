@extends('layouts.master')

@section('content')
    <div class="starter-template">
       {{ $type }} search results for {{ $search_string }}
       <ul>
           @foreach($results as $result)
                <li>{{ $result->lastname }} {{ $result->firstname }}. Email: {{ $result->email }} Location: {{ $result->location }} @if ($role_id == App\Role::where('name', 'Tutor')->first()->id) Rating: {{ $result->rating }}@endif</li>
           @endforeach
       </ul>
@endsection