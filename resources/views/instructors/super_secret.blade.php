@extends('layouts.master')

@section('content')
    <div class="starter-template">

        <form method="POST" action="/supersecret_tutor_search">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('namesearch') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <div class="col-md-3">
                        Search for Tutor by name:
                    </div>
                    <div class="col-md-6">
                        <input id="namesearch" type="text" class="form-control" name="namesearch"
                               value="{{ old('name') }}" autofocus>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
        </form>
        <br/>
        <br/>
        <br/>
        <br/>

        <form method="POST" action="/supersecret_student_search">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('namesearch') ? ' has-error' : '' }}">
                <div class="col-md-12">
                    <div class="col-md-3">
                        Search for Student by name:
                    </div>
                    <div class="col-md-6">
                        <input id="namesearch" type="text" class="form-control" name="namesearch"
                               value="{{ old('name') }}" autofocus>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
        </form>
        <br/>
        <br/>
        <a href="/student_list"><h2>Click here to view list of all users</h2></a>
        <br/>
        <br/>
        <h1>Activity log:</h1>
        <table>
            <tr>
                <th>Date</th>
                <th style="padding-left: 20px">Log Body</th>
            </tr>
        @foreach($all_logs as $log)
            <tr>
                <td>{{ $log->created_at }}</td>
                <td style="padding-left: 20px">{{ $log->log_body }}</td>
            </tr>
        @endforeach
        </table>
    </div>
@endsection