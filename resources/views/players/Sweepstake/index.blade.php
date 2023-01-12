@extends('layouts.main')

@section('title', 'Sorteio')

@section('content')


@if($errors->any())
    <div class="alert">
        <p>{{$errors->first()}}</p>
    </div>
@endif
<div class="main-text">
    <div class="main-wrapper">
        <form enctype="multipart/form-data" method="POST" action="{{route('sweepstake.start')}}">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>X</th>
                    <th>Nome</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $player )
                <tr>
                    <td><input class="checkbox" type="checkbox" name="users[]" value="{{$player->id}}"></td>
                    <td><a href="#">{{$player->name}}</a></td>
                    <td>{{$player->rating}}</td>
                    <td>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <br>
        <div>
            <select name="amountPlayers" id="amountPlayers" class="amount">
                <option value="">Quantidade de jogadores por time</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>
        <button type="submit" class="sorteio">Sortear</button>
        </form>
    </div>
</div>


@endsection

