@extends('layouts.app')

@section('content')
    <div class="container">

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
            <input type="text" name="name" class="form-control" id="name" placeholder="Имя игрока">
        </div>
        <div class="form-group">
            <label for="player_surname"><h4>Player surnamer</h4></label>
            <input type="text" name="surname" class="form-control" id="surname" placeholder="Фамилия игрока">
        </div>
        <div class="form-group row">
            <label for="age" class="col-2 col-form-label"><h4>Player age</h4></label>
            <div class="col-10">
                <input class="form-control" name="age" type="number" value="42" id="age">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label" for="rank"><h4>Player rank</h4></label>
            <div class="col-10 float-right">
                <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="rank" id="rank">
                    <option value="1">One rank</option>
                    <option value="2">Two rank</option>
                    <option value="3">Three rank</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="plus"><h4>Player pluses</h4></label>
            <textarea class="form-control" name="plus" id="plus" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="minus"><h4>Player minuses</h4></label>
            <textarea class="form-control" name="minus" id="plus" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success float-right">Create player</button>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
