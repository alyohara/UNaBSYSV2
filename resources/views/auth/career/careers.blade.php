@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Codigo SIU</th>
                        <th>Nombre</th>
                        <th>Título</th>

                        <th>Departamento</th>


                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($careers as $career)

                        <tr>
                            <td>{{  $career->CodigoSIU}}</td>
                            <td>{{  $career->DenominacionCarrera}}</td>
                            <td>{{  $career->Titulo}}</td>
                            <td>@if($career->college_id)
                                {{ $career->facultad->name }}
                                @else
                                    Carrera sin Departamento Asociada
                                @endif</td>
                            <td>
                                @if(auth()->user()->userData->hasRole('admin')||auth()->user()->userData->hasRole('acaUno')||auth()->user()->userData->hasRole('acaDos'))
                                    <a class="btn btn-success btn-sm" style="margin-bottom: 5px; display: block;" href="{{ route('career.career', $career->id) }}">Editar</a>
                                    <a href="{{ route('career.destroy', $career->id) }}" style="margin-bottom: 5px; display: block;" class="btn btn-danger btn-sm" data-confirm-delete="true">Borrar</a>
                                @endif
                                <a class="btn btn-primary btn-sm" style="display: block;" href="{{ route('career.verCarrera', $career->id) }}">Ver</a>
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

