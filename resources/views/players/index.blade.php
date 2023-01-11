@extends('layouts.main')

@section('title', 'Ver Jogadores')

@section('content')

<div class="main-text">
    <div class="main-wrapper">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Rating</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $player )
                <tr>
                    <td>{{$loop -> index + 1}}</td>
                    <td><a href="#">{{$player->name}}</a></td>
                    <td>{{$player->rating}}</td>
                    <td>
                        <a class="edit" href="{{route('players.edit', ['id' => $player->id])}}">Editar</a>
                        <form action="{{route('players.destroy', ['id' => $player->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection
