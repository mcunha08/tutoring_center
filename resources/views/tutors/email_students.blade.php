@extends('layouts.master')

@section('content')
    <h3> Email all students</h3>
    <form method="POST" action="/email_students">

        {{ csrf_field() }}
        <div class="col-md-12 search-form form-group">
            <label for="emaillist" class="col-md-3 control-label">Select student:</label>
            <div class="col-md-6">
                <select name="emaillist">
                    <option value=""></option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->email }}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
            <div class="col-md-12 text-center">
                <label for="subject" class="col-md-3 control-label">Subject</label>
                <input class="col-md-5" id="subject" type="text" class="form-control" name="subject" required>
                @if ($errors->has('subject'))
                    <span class="help-block">
                            <strong>{{ $errors->first('subject') }}</strong>
                        </span>
                @endif
            </div>
            <div class="col-md-12" style="height:25px"> </div>

            <div class="col-md-12 text-center">
                <label for="body" class="col-md-3 control-label">Body</label>
                <input class="col-md-5" id="body" type="text" class="form-control" name="body" style="height:200px;width:400px" required>
                @if ($errors->has('body'))
                    <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                @endif
                <div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">

                    </div>
                </div>
    </form>
@endsection