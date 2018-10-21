@extends('layouts.app')

@section('content')
    <div class="container" id="comments">
        <div class="float-right">
            <img src="/img/icon.jpg" alt="icon" width="80" height="80" style="border-radius: 50px;border: 1px solid silver">
        </div>
        <h1>
            {{$player->name . ' ' .$player->surname}}
            <span style="font-size:16px">{{$age}} age.</span>
        </h1>
        <h4>rank: {{$player->rank}}</h4>
        <hr>
        <div class="row">
                <div class="col-md-6 col-sm-12">
                    <form action="{{ route('comment.store') }}" method="post">
                        <input type="hidden" name="player_id" value="{{$player->id}}">
                        <input type="hidden" name="characteristic" value="1">
                        {{csrf_field()}}
                        <h3 class="center"><i class="fas fa-star"></i></h3>
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" id="plus" placeholder="Запишите новое достежение">
                            <button class="btn btn-primary"><i class="fas fa-trophy"></i></button>
                        </div>
                        <br>
                        <ul class="list-group">
                            @foreach($pluses as $comment)
                                <li class="list-group-item list-group-item-action">{{$comment->text}}</li>
                            @endforeach
                        </ul>
                        <br>
                    </form>
                </div>

                <div class="col-md-6 col-sm-12">
                    <form action="{{ route('comment.store') }}" method="post">
                        <input type="hidden" name="player_id" value="{{$player->id}}">
                        <input type="hidden" name="characteristic" value="0">
                        {{csrf_field()}}
                        <h3 class="center"><i class="fas fa-frown"></i></h3>
                        <div class="input-group">
                            <input type="text" name="text" class="form-control" id="plus" placeholder="Чем вы разочарованы?">
                            <button class="btn btn-primary"><i class="fas fa-frown"></i></button>
                        </div>
                        <br>
                        <ul class="list-group">
                        @foreach($minuses as $comment)
                            <li class="list-group-item list-group-item-action">{{$comment->text}}</li>
                        @endforeach
                        </ul>
                    </form>
                </div>
        </div>
    </div>
@endsection
