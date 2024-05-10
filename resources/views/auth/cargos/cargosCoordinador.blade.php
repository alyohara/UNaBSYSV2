@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive">
                <form method="POST" action="{{ route('cargo.renovarCargosCoord') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <button type="submit" class="btn btn-outline-success"
                            style="position: relative; float: right; margin-bottom: 10px">Renovar Cargos Seleccionados
                    </button>

                    <table class="table" id="tabla" style="vertical-align: middle;">
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
                        @foreach ($cargos as $cargo)

                            <tr @if ($cargo->status == 2) style="background-color: #efc8c8"
                                @elseif($cargo->status == 3) style="background-color: #cff1ff" @endif>

                                <td>{{ $cargo->materia->code .' - '. $cargo->materia->name}}</td>
                                <td><b>{{  strtoupper($cargo->persona->lastname)}}</b>, {{  $cargo->persona->name}}</td>
                                <td>{{  $cargo->tipo}}</td>
                                <td>{{  $cargo->categoria}}</td>
                                <td>{{  $cargo->dedicacion_horaria}}</td>
                                <td>{{  $cargo->fecha_alta}}</td>
                                <td>{{  $cargo->fecha_baja}}</td>
                                <td>{{  $cargo->act_des}}</td>
                                <td>
                                    @php
                                        $isAdminOrAca = auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos') || auth()->user()->userData->hasRole('coordinador');
                                    @endphp
                                    @if($cargo->status == 1)
                                        @php
                                            $isHabilitado = $cargo->fecha_alta < date('Y-m-d') && (!$cargo->fecha_baja || date('Y-m-d') < $cargo->fecha_baja);
                                        @endphp
                                        <span class="btn btn-outline-{{ $isHabilitado ? 'info' : 'danger' }} btn-sm"     >
                                            {{ $isHabilitado ? 'Habilitado' : 'Deshabilitado' }}
                                        </span>
                                    @else
                                        @if ($cargo->status == 2)
                                            <a class="btn btn-outline-dark btn-sm"
                                               href="{{ $isAdminOrAca ? route('cargo.cargoCoord', $cargo->id) : '#' }}">
                                                Pendiente de Carga
                                            </a>
                                        @elseif ($cargo->status == 3)
                                            <a class="btn btn-outline-secondary btn-sm"
                                               href="{{ $isAdminOrAca ? route('cargo.cargoCoord', $cargo->id) : '#' }}">
                                                Pendiente de Validación
                                            </a>
                                        @else
                                            <a class="btn btn-outline-danger btn-sm"
                                               href="">
                                                Deshabilitado
                                            </a>
                                        @endif
                                    @endif


                                </td>
                                <td>
                                    <div style="display: flex; flex-flow: column">
                                        @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('coordinador'))
                                            <a class="btn btn-success btn-sm" style="margin-bottom: 5px"
                                               href="{{ route('cargo.cargoCoord', $cargo->id) }}">
                                                @if($cargo->status == 2)
                                                    Cargar
                                                @else
                                                    Editar
                                                @endif</a>
                                        @endif
                                        <a class="btn btn-primary btn-sm"
                                           style="align-items: center; margin-bottom: 5px"
                                           href="{{ route('cargo.verCargo', $cargo->id) }}">Ver</a>


                                        @if($cargo->status < 2)
                                            <a class="btn btn-outline-dark btn-sm" style="align-items: center"
                                               href="{{ route('cargo.renovarCargoCoord', $cargo->id) }}">Renovar</a>

                                        @endif


                                    </div>
                                </td>
                                <td>@if ($cargo->act_des != "Pendiente de Carga")
                                        <input type="checkbox" class="form-check-input" name="selected[]"
                                               value="{{ $cargo->id }}">
                                    @endif
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
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

