@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <a href="{{ route('cuatrimestres.create') }}" class="btn btn-primary">Nuevo Cuatrimestre</a>            @include('auth.partials.copy')

            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Fecha Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Nombre</th>
                        <th>Descripción</th>


                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cuatrimestres as $cuatrimestre)
                        <tr>
                            <td>{{  $cuatrimestre->fecha_inicio}}</td>
                            <td>{{  $cuatrimestre->fecha_fin}}</td>
                            <td>{{  $cuatrimestre->nombre}}</td>
                            <td>{{  $cuatrimestre->descripcion}}</td>
                            <td style="display: flex; ">

                                @if(auth()->user()->userData->hasRole('admin')||auth()->user()->userData->hasRole('acaUno')||auth()->user()->userData->hasRole('acaDos'))
                                    <a class="btn btn-success btn-sm" style="margin-right: 5px;"
                                       href="{{ route('cuatrimestres.edit', $cuatrimestre->id) }}">Editar</a>
                                    <a href="{{ route('cuatrimestres.destroy', $cuatrimestre->id) }}"
                                       style="margin-right: 5px;" class="btn btn-danger btn-sm"
                                       data-confirm-delete="true">Borrar</a>
                                @endif
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('cuatrimestres.show', $cuatrimestre->id) }}">Ver</a>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

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

