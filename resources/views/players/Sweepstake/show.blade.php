@extends('layouts.main')

@section('title', 'Ver Jogadores')

@section('content')

<div class="main-text">
    <div class="main-wrapper">

        @if($team1 && $team2 && $team3)

        <table>
            <caption>Time 1</caption>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team1 as $player1 )
                <tr>
                    <td><a href="#">{{$player1->name}}</a></td>
                    <td>{{$player1->rating}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table>
            <caption>Time 2</caption>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team2 as $player2 )
                <tr>
                    <td><a href="#">{{$player2->name}}</a></td>
                    <td>{{$player2->rating}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table>
            <caption>Time 3</caption>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team3 as $player3 )
                <tr>
                    <td><a href="#">{{$player3->name}}</a></td>
                    <td>{{$player3->rating}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else

        <table>
            <caption>Time 1</caption>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team1 as $player1 )
                <tr>
                    <td><a href="#">{{$player1->name}}</a></td>
                    <td>{{$player1->rating}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table>
            <caption>Time 2</caption>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team2 as $player2 )
                <tr>
                    <td><a href="#">{{$player2->name}}</a></td>
                    <td>{{$player2->rating}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


        @endif

    </div>
</div>


@endsection























