@extends('layouts.master')

@section('content')
    <form method="POST" action="/calculator">
        {{ csrf_field() }}
        <div class="col-md-12">
            Fee per hours: ${{$tutor->fee}}
        </div>
        <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }} col-md-12 search-form">
            <input type="hidden" id="tutor_id" name="tutor_id" value="{{$tutor->id}}"/>
            <label for="hours" class="col-md-3 control-label">Hours:</label>
            <div class="col-md-6">
                <input id="hours" type="text" class="form-control" name="hours" value="{{ old('name') }}"
                       autofocus>

                @if ($errors->has('hours'))
                    <span class="help-block">
                        <strong>{{ $errors->first('hours') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Calculate
            </button>
        </div>
        </div>
    </form>
@endsection
