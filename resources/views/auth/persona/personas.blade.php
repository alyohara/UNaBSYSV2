@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th style="width: 20px"></th>
                        <th>Apellido</th>
                        <th>Nombre</th>

                        <th>Email</th>

                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($personas as $persona)

                        <tr>
                            <td>{!! $persona->badgeNuevo() !!} </td>
                            <td>{{  $persona->lastname}} </td>


                            <td>{{  $persona->name}}</td>
                            <td>{{  $persona->email}}</td>

                            <td>
                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno'))
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('persona.persona', $persona->id) }}">Editar</a>
                                    <a href="{{ route('persona.destroy', $persona->id) }}" class="btn btn-danger btn-sm"
                                       data-confirm-delete="true">Borrar</a>

                                @endif
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('persona.verPersona', $persona->id) }}">Ver</a>
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

