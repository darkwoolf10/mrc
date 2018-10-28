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
        <div class="row">
            <comment-component
                    :player="{{ json_encode($player) }}"
                    :characteristic="{{json_encode($pluses)}}"
                    v-bind:characteristic-type="1"
                    :csrf-token="{{ csrf_token() }}">
            </comment-component>
            <comment-component
                    :player="{{ json_encode($player) }}"
                    :characteristic="{{json_encode($minuses)}}"
                    v-bind:characteristic-type="0"
                    :csrf-token="{{ csrf_token() }}">
            </comment-component>
        </div>
    </div>
@endsection
