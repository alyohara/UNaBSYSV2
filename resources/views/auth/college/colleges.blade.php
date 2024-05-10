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
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Fecha de Inicio de las Actividades</th>
                        <th>Tipo de Sede</th>

                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($colleges as $college)

                        <tr>
                            <td>{{  $college->name}}</td>
                            <td>{{  $college->address}}</td>
                            <td>{{  $college->email}}</td>
                            <td>{{ $college->dateInit }}</td>
                            <td>{{ $college->tipo_de_sede }}</td>
                            <td>
                                @if(auth()->user()->userData->userType_id <= 2)
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('college.college', $college->id) }}">Editar</a>
                                    <a href="{{ route('college.destroy', $college->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Borrar</a>

                                @endif
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('college.verFacultad',  $college->id) }}">Ver</a>
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

