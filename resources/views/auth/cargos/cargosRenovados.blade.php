@extends('layouts.app-master-export-validate')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive  nowrap" style="width:100%">

                <table class="table" id="tabla">

                    <thead style="background-color: #f6f7f8 !important; margin-top: 5px">
                    <tr>
                        <th>Profesor <small style="font-size: 10px">Apellido</small></th>
                        <th><small style="font-size: 10px">Nombre</small></th>
                        <th>Materia</th>
                        <th>Condición</th>
                        <th>Categoria</th>
                        <th>Dedicación Horaria</th>
                        <th>Fecha Alta</th>
                        <th>Renovado Por</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    {{--                    <tr id="filterRow">--}}
                    {{--                        <th>Profesor <small style="font-size: 10px">Apellido</small></th>--}}
                    {{--                        <th><small style="font-size: 10px">Nombre</small></th>--}}
                    {{--                        <th>Materia</th>--}}
                    {{--                        <th>Condición</th>--}}
                    {{--                        <th>Categoria</th>--}}
                    {{--                        <th>Dedicación Horaria</th>--}}
                    {{--                        <th>Fecha Alta</th>--}}
                    {{--                        <th>Coordinador</th>--}}
                    {{--                        <th>Estado</th>--}}
                    {{--                        <th></th>--}}
                    {{--                    </tr>--}}

                    {{--                    </thead>--}}

                    {{--                    <tfoot>--}}
                    {{--                    <tr id="filterRowFooter">--}}
                    {{--                        <th>Profesor <small style="font-size: 10px">Apellido</small></th>--}}
                    {{--                        <th><small style="font-size: 10px">Nombre</small></th>--}}
                    {{--                        <th>Materia</th>--}}
                    {{--                        <th>Condición</th>--}}
                    {{--                        <th>Categoria</th>--}}
                    {{--                        <th>Dedicación Horaria</th>--}}
                    {{--                        <th>Fecha Alta</th>--}}
                    {{--                        <th>Coordinador</th>--}}
                    {{--                        <th>Estado</th>--}}
                    {{--                        <th></th>--}}
                    {{--                    </tr>--}}

                    {{--                    </tfoot>--}}
                    <tbody>
                    @foreach ($cargos as $cargo)

                        <tr @if ($cargo->status == 2) style="background-color: rgba(239,200,200,0.45)"
                            @elseif($cargo->status == 3) style="background-color: rgba(207,241,255,0.45)" @endif>

                            <td><b>{{  ucfirst($cargo->persona->lastname)}}</b></td>
                            <td>{{  $cargo->persona->name}}</td>
                            <td>{{ $cargo->materia->code .' - '. $cargo->materia->name}}</td>
                            <td>{{  $cargo->tipo}}</td>
                            <td>{{  $cargo->categoria}}</td>
                            <td>{{  $cargo->dedicacion_horaria}}</td>
                            <td>{{  $cargo->fecha_alta}}</td>

                            <td><b>
                                    {{$cargo->persona_que_lo_renovo ? $cargo->persona_que_lo_renovo->userData->lastname.',' : ''}}
                                </b>
                                {{$cargo->persona_que_lo_renovo ? $cargo->persona_que_lo_renovo->userData->name : ''}}

                            </td>


                            <td>
                                @php
                                    $isAdminOrAca = auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos');
                                @endphp
                                @if($cargo->status == 1)
                                    @php
                                        $isHabilitado = $cargo->fecha_alta < date('Y-m-d') && (!$cargo->fecha_baja || date('Y-m-d') < $cargo->fecha_baja);
                                    @endphp
                                    <a class="btn btn-outline-{{ $isHabilitado ? 'info' : 'danger' }} btn-sm"        href="{{ $isAdminOrAca ? route('cargo.cargoToggle', $cargo->id) : '#' }}">
                                        {{ $isHabilitado ? 'Habilitado' : 'Deshabilitado' }}
                                    </a>
                                @else
                                    @if ($cargo->status == 2)
                                        <a class="btn btn-outline-dark btn-sm"
                                           href="{{ $isAdminOrAca ? route('cargo.cargo', $cargo->id) : '#' }}">
                                            Pendiente de Carga
                                        </a>
                                    @elseif ($cargo->status == 3)
                                        <a class="btn btn-outline-secondary btn-sm"
                                           href="{{ $isAdminOrAca ? route('cargo.cargo', $cargo->id) : '#' }}">
                                            Pendiente de Validación
                                        </a>
                                    @else
                                        <a class="btn btn-outline-danger btn-sm"
                                           href="{{ $isAdminOrAca ? route('cargo.cargoToggle', $cargo->id) : '#' }}">
                                            Deshabilitado
                                        </a>
                                    @endif
                                @endif


                            </td>
                            <td>
                                <div style="display: flex; flex-flow: column">
                                    @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno'))
                                        <a class="btn btn-success btn-sm" style="margin-bottom: 5px"
                                           href="{{ route('cargo.cargo', $cargo->id) }}">@if($cargo->status == 2)
                                                Cargar
                                            @elseif($cargo->status == 3)
                                                Validar
                                            @else
                                                Editar
                                            @endif</a>
                                    @endif
                                    <a class="btn btn-primary btn-sm"
                                       style="align-items: center; margin-bottom: 5px"
                                       href="{{ route('cargo.verCargo', $cargo->id) }}">Ver</a>


                                    @if($cargo->status < 2)
                                        <a class="btn btn-outline-dark btn-sm" style="align-items: center"
                                           href="{{ route('cargo.renovarCargo', $cargo->id) }}">Renovar</a>

                                    @endif


                                </div>
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


