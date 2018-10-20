@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="float-right">
            <img src="/img/icon.jpg" alt="icon" width="80" height="80" style="border-radius: 50px;border: 1px solid silver">
        </div>
        <h1>
            {{$player->name . ' ' .$player->surname}}
            <span style="font-size:16px">{{$age}} age.</span>
        </h1>
        <h4>runk: {{$player->rank}}</h4>
        <hr>
        <div class="row">
            <div class="col-6">
                <h3 style="text-align: center"><i class="fas fa-star"></i></h3>
                <div class="form-group">
                    <input type="text" name="plus" class="form-control" id="plus" placeholder="Запишите новое достежение">
                </div>
                @if(empty($player->plus))
                    {{$player->plus}}
                @endif
            </div>
            <div class="col-6">
                <h3 style="text-align: center"><i class="fas fa-frown"></i></h3>
                <div class="form-group">
                    <input type="text" name="plus" class="form-control" id="plus" placeholder="Чем вы разочарованы?">
                </div>
                @if(empty($player->minus))
                    {{$player->minus}}
                @endif
            </div>
        </div>
    </div>
@endsection
