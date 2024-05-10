@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Título</th>
                        <th>Origen</th>
                        <th>Fecha</th>
                        <th>Estado</th>



                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($alertas as $alerta)

                        <tr>
                            <td>{{  $alerta->titulo}}</td>
                            <td>@if($alerta->origen == 1)
                                    <span >Sistema</span>
                                @elseif($alerta->origen == 2)
                                    <span >Usuario: {{$alerta->user->userData->name.' '.$alerta->user->userData->lastname}}</span>
                                @endif
                            </td>
                            <td>{{  $alerta->created_at}}</td>
                            <td>@if($alerta->status == 1)
                                    <span class="text-success">Leído</span>
                            </td>
                            <td><a class="btn btn-success btn-sm"
                                   href="{{ route('alerta.verAlerta', $alerta->id) }}">Ver</a></td>
                                @else
                                    <span class="text-primary">No Leído</span>
                                </td>
                                <td><a class="btn btn-primary btn-sm"
                                       href="{{ route('alerta.verAlerta', $alerta->id) }}">Leer</a></td>
                                @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @include('auth.partials.copy')

        @endauth

        @guest
            <h1>¡Bienvenido!</h1>
            <div class="d-flex justify-content-center">
                <iframe width="923" height="519" src="https://www.youtube.com/embed/REnyeTuFR98"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>

        @endguest
    </div>


@endsection

