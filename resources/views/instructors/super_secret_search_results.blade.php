@extends('layouts.master')

@section('content')
    <div class="starter-template">
       {{ $type }} search results for {{ $search_string }}
       <ul>
           @foreach($results as $result)
                <li>{{ $result->lastname }} {{ $result->firstname }}</li>
           @endforeach
       </ul>
@endsection