@extends('layouts.master')

@section('content')
    <form method="POST" action="/namesearch">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('namesearch') ? ' has-error' : '' }}">
            <label for="namesearch" class="col-md-3 control-label">Search By Name:</label>

            <div class="col-md-12">
                <input id="namesearch" type="text" class="form-control" name="namesearch" value="{{ old('name') }}" autofocus>

                @if ($errors->has('namesearch'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('namesearch') }}</strong>
                                </span>
                @endif
            </div>
            <div class="col-md-12">
                <label for="locationlist" class="col-md-3 control-label">Search By Location:</label>
                <select name="locationlist">
                    <option value=""></option>
                    @foreach($locations as $location)
                        <option value="{{ $location->location }}">{{ $location->location }}</option>
                    @endforeach
                </select>
                @if ($errors->has('locationlist'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('locationlist') }}</strong>
                                    </span>
                @endif
            </div>
            <label for="ratingsearch" class="col-md-3 control-label">Search By Rating:</label>

            <div class="col-md-12">
                <select name="ratingsearch">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                @if ($errors->has('ratingsearch'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('ratingsearch') }}</strong>
                                </span>
                @endif
            </div>
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </div>
        </div>
    </form>
@endsection
