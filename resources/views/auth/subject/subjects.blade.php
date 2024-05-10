@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Nombre Abreviado</th>
                        <th>Carrera/s</th>


                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($subjects as $subject)

                        <tr>
                            <td>{{  $subject->code}}</td>
                            <td>{{  $subject->name}}</td>
                            <td>{{  $subject->abrev_name}}</td>
                            <td>@if($subject->carreras->count() > 0)
                                    @foreach($subject->carreras as $carrera)
                                        <ul>
                                            <li>{{$carrera->CodigoSIU.' - '. $carrera->DenominacionCarrera }}</li>
                                        </ul>

                                    @endforeach
                                @else
                                    Materia sin Carrera Asociada
                                @endif
                            </td>


                            <td>
                                @if(auth()->user()->userData->hasRole('admin')||auth()->user()->userData->hasRole('acaUno')||auth()->user()->userData->hasRole('acaDos'))
                                    <a class="btn btn-success btn-sm" style="display: block; margin-bottom: 5px;" href="{{ route('subject.subject', $subject->id) }}">Editar</a>
                                    <a href="{{ route('subject.destroy', $subject->id) }}" style="display: block; margin-bottom: 5px;" class="btn btn-danger btn-sm" data-confirm-delete="true">Borrar</a>
                                @endif
                                <a class="btn btn-primary btn-sm" style="display: block;" href="{{ route('subject.verMateria', $subject->id) }}">Ver</a>
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

