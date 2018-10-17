@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Ранк</th>
                    <th scope="col">Возраст</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                    <tr>
                        <td><a href={{ route('player.show',$player->id) }}>{{$player->name}}</a></td>
                        <td><a href={{ route('player.show',$player->id) }}>{{$player->surname}}</a></td>
                        <td>{{$player->rank}}</td>
                        <td>{{$player->age}}</td>
                        <td>{{$player->created_at}}</td>
                        <td>
                            <a href="{{ route('player.show', $player->id) }}" class="btn btn-primary"><i class="fas fa-user-astronaut"></i></a>
                            <a class="btn btn-success" href={{ route('player.edit', $player->id) }}><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href={{ route('player.destroy', $player->id) }}><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
