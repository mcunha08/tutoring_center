@extends('layouts.master')

@section('content')
    <form method="POST" action="/namesearch">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('namesearch') ? ' has-error' : '' }} col-md-12 search-form">
            <label for="namesearch" class="col-md-3 control-label">Search By Name:</label>
            <div class="col-md-6">
                <input id="namesearch" type="text" class="form-control" name="namesearch" value="{{ old('name') }}"
                       autofocus>

                @if ($errors->has('namesearch'))
                    <span class="help-block">
                        <strong>{{ $errors->first('namesearch') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-12 search-form form-group">
            <label for="locationlist" class="col-md-3 control-label">Search By Location:</label>
            <div class="col-md-6">
                <select name="locationlist">
                    <option value=""></option>
                    @foreach($locations as $location)
                        <option value="{{ $location->location }}">{{ $location->location }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('locationlist'))
                <span class="help-block">
                        <strong>{{ $errors->first('locationlist') }}</strong>
                    </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('availability') ? ' has-error' : '' }} col-md-12 search-form">
            <label for="availability" class="col-md-3 control-label">Search By Availability:</label>
            <div class="col-md-6">
                <input id="availability" type="text" class="form-control" name="availability" value="{{ old('name') }}"
                       autofocus>

                @if ($errors->has('availability'))
                    <span class="help-block">
                        <strong>{{ $errors->first('availability') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-12 search-form form-group">
            <label for="ratingsearch" class="col-md-3 control-label">Search By Rating:</label>

            <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary">Submit
            </button>
        </div>
        </div>
    </form>
@endsection
