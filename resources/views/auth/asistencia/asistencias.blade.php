@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Profesor</th>
                        <th>Bedel</th>
                        <th>Fecha / Período</th>
                        <th>Sede</th>
                        <th>Estado</th>


                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($asistencias as $asistencia)

                        <tr>
                            <td>{{$asistencia->subject->name}}</td>
                            <td><b>{{  strtoupper($asistencia->profesor->lastname)}}</b>, {{  $asistencia->profesor->name}}</td>
                            <td><b>{{  strtoupper($asistencia->bedel->lastname)}}</b>, {{  $asistencia->bedel->name}}</td>
                            <td>
                                @if($asistencia->tipo == "porFecha")
                                    {{ $asistencia->fecha}}
                                @else
                                    {{ $asistencia->fecha_inicio}} - {{ $asistencia->fecha_fin}}
                                @endif

                            </td>
                            <td>@if($asistencia->sede_de_cursada) {{$asistencia->sede->nombre}}</td> @endif
                            <td><span class="dot-{{$asistencia->status}}">@if($asistencia->status == 1) Presente @else Ausente @endif</span> </td>

                            <td>
                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno')  || auth()->user()->userData->hasRole('bedel'))
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('asistencia.asistencia', $asistencia->id) }}">Editar</a>
                                    <a href="{{ route('asistencia.destroy', $asistencia->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Borrar</a>

                            @endif
                               {{-- <a class="btn btn-primary btn-sm"
                                   href="{{ route('asistencia.verAsistencia', $asistencia->id) }}">Ver</a>--}}
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


