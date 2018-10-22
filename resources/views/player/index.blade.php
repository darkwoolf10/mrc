@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="accordion">
            @forelse($players as $player)
            <div class="card">
                <div class="card-header" id="heading{{$player->id}}">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$player->id}}" aria-expanded="false" aria-controls="collapse{{$player->id}}">
                        {{$player->name}} {{$player->surname}}
                    </button>
                    <a class="btn btn-primary float-right" href="{{route('player.show', $player->id)}}"><i class="fas fa-user-astronaut"></i></a>
                </div>
                <div id="collapse{{$player->id}}" class="collapse" aria-labelledby="heading{{$player->id}}" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            <li>{{$player->pluses_count}} pluses.</li>
                            <li>{{$player->minuses_count}} minuses.</li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
                <div class="center"><h1>Players not found :(</h1></div>
            @endforelse
        </div>
    </div>
@endsection
