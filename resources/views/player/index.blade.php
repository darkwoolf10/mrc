@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Rank</th>
                    <th scope="col">Age</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                    <tr>
                        <td><a href={{ route('player.show',$player->id) }}>{{$player->name}}</a></td>
                        <td><a href={{ route('player.show',$player->id) }}>{{$player->surname}}</a></td>
                        <td>{{$player->rank}}</td>
                        <td>{{$player->age}}</td>
                        @if($player->birthday > 0)
                            <td>{{date('F j, Y', strtotime($player->birthday))}}</td>
                        @else
                            <td>Birthday not found</td>
                        @endif
                        <td>
                            <a href="{{ route('player.destroy', $player->id) }}" class="btn btn-primary"><i class="fas fa-user-astronaut"></i></a>
                            <a class="btn btn-success" href={{ route('player.edit', $player->id) }}><i class="fas fa-edit"></i></a>
                            <form action="{{ route('player.destroy', ['id' => $player->id]) }}" method="post" class="d-inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
