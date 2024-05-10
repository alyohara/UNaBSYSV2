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
                        <th>Descripción</th>
                        <th>Dirección</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($sedes as $sede)

                        <tr>
                            <td>{{  $sede->nombre}}</td>
                            <td>{{  $sede->descripcion}}</td>
                            <td>{{  $sede->direccion}}</td>
                            <td>
                                @if(auth()->user()->userData->hasRole('admin')||auth()->user()->userData->hasRole('acaUno')||auth()->user()->userData->hasRole('acaDos'))
                                    <a class="btn btn-success btn-sm" style="margin-bottom: 5px; display: block;" href="{{ route('sede_de_cursada.edit', $sede) }}">Editar</a>
                                    <a href="{{ route('sede_de_cursada.destroy', $sede->id) }}" style="margin-bottom: 5px; display: block;" class="btn btn-danger btn-sm" data-confirm-delete="true">Borrar</a>
                                @endif
<a class="btn btn-primary btn-sm" style="display: block;" href="{{ route('sede_de_cursada.show', $sede) }}">Ver</a>




                            </td>
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

