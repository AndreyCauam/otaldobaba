@extends('layouts.main')

@section('title', 'Editar Jogador')

@section('content')

        <div class="main-text">
            <div class="main-wrapper">
                <form enctype="multipart/form-data" method="POST" id="player-form" action="{{route('players.update', ['id' => $data->id])}}">
                    @csrf
                    @method('PUT')
                        <fieldset>
                            <div>
                        <legend>Editar o Jogador {{$data->name}}</legend>
                            <div class="form-content">

                                    @include('layouts.alerts')
                                    <div class="form-input">
                                        <label for="name">Nome do Jogador</label>
                                        <input type="text" id="name" name="name" value="{{$data->name}}">
                                    </div>

                                    <div class="form-input">
                                        <label for="rating" class="leading-7 text-sm text-gray-600">Nível</label>
                                        <input type="text" id="rating" name="rating" placeholder="De 1 a 10" value="{{$data->rating}}">
                                    </div>



                                <div>
                                    <button type="submit">Salvar</button>
                                </div>
                        </div>
                        </fieldset>
                </form>
            </div>
        </div>


@endsection
