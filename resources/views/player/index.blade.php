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
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                    <tr>
                        <td>{{$player->name}}</td>
                        <td>{{$player->surname}}</td>
                        <td>{{$player->rank}}</td>
                        <td>{{$player->age}}</td>
                        <td>{{$player->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
