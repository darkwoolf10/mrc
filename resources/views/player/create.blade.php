@extends('layouts.app')

@section('content')
    <div class="container" id="app">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(['action' => 'PlayerController@store', 'method' => 'POST']) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="name"><h4>Player name</h4></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name player">
            </div>
            <div class="form-group">
                <label for="player_surname"><h4>Player surnamer</h4></label>
                <input type="text" name="surname" class="form-control" id="surname" placeholder="Surname player">
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <datepicker id="birthday" name="birthday" :language="ru" placeholder="Write date of birth"></datepicker>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 col-form-label" for="rank"><h4>Player rank</h4></label>
                <div class="col-9 float-right">
                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="rank" id="rank">
                        <option value="1">One rank</option>
                        <option value="2">Two rank</option>
                        <option value="3">Three rank</option>
                    </select>
                </div>
                <div class="col-1">
                    <rank-component />
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success float-right">Create player</button>
            </div>
        {!! Form::close() !!}
    </div>
@endsection