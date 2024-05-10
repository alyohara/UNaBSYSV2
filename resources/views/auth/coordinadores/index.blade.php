@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive">


                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($coordinadores as $coordinador)

                        <tr>
                            <td>{{  $coordinador->user->userData->name.', '.$coordinador->user->userData->lastname}}</td>
                            <td>
                                @if($coordinador->estado == 'activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                          </td>
                            <td>
                                @if(auth()->user()->userData->hasRole('admin')||auth()->user()->userData->hasRole('acaUno'))
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('coordinador.coordinador', $coordinador->id) }}">Editar</a>
                                    <a href="{{ route('coordinador.destroy', $coordinador->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Borrar</a>

                                @endif
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('coordinador.verCoordinador', $coordinador->id) }}">Ver Detalle</a>

                                @if(auth()->user()->userData->hasRole('admin')||auth()->user()->userData->hasRole('acaUno'))
                                    <a class="btn btn-warning btn-sm"
                                       href="{{ route('coordinador.statusCoordinador', $coordinador->id) }}">Cambiar Estado</a>
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


