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
                        <th>Tipo</th>
                        <th>Categoria</th>
                        <th>Dedicación Horaria</th>
                        <th>Fecha Alta</th>
                        <th>Fecha Baja</th>
                        <th>Acto Administrativo / Designación</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($profesores_coordinados as $cargo)

                        <tr>

                            <td>{{ $cargo->materia->code .' - '. $cargo->materia->name}}</td>
                            <td><b>{{  strtoupper($cargo->persona->lastname)}}</b>, {{  $cargo->persona->name}}</td>
                            <td>{{  $cargo->tipo}}</td>
                            <td>{{  $cargo->categoria}}</td>
                            <td>{{  $cargo->dedicacion_horaria}}</td>
                            <td>{{  $cargo->fecha_alta}}</td>
                            <td>{{  $cargo->fecha_baja}}</td>
                            <td>{{  $cargo->act_des}}</td>
                            <td>@if($cargo->status == 1)
                                    @if($cargo->fecha_alta < date('Y-m-d'))
                                        @if ($cargo->fecha_baja)
                                            @if( date('Y-m-d')< $cargo->fecha_baja)
                                                <a class="btn btn-outline-info btn-sm"
                                                   href="#">Habilitado</a>
                                            @else
                                                <a class="btn btn-outline-danger btn-sm"
                                                   href="#">Fuera de Fecha</a>

                                            @endif
                                        @else
                                            <a class="btn btn-outline-info btn-sm"
                                               href="#">Habilitado</a>
                                        @endif
                                    @else
                                        <a class="btn btn-outline-danger btn-sm"
                                           href="#">Fuera de Fecha</a>
                                    @endif
                                @else <a class="btn btn-outline-danger btn-sm"
                                         href="#">Deshabilitado</a> @endif</td>


                            </td>

                            <td>

                            </td>
                            <td><a class="btn btn-primary btn-sm"
                                   href="{{ route('cargo.verCargo', $cargo->id) }}">Ver</a></td>


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

