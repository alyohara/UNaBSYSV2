@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>

            <h1 class="h3 mb-3 fw-normal"></h1>
            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                <i class="fa-solid fa-screen-users"></i>&nbsp;&nbsp; {{strtoupper($subject->name)}}
            </div>

            <dl class="row">
                <dt class="col-sm-3"><i class="fa-solid fa-qrcode"></i><b>&nbsp;Código de la Materia:</b></dt>
                <dd class="col-sm-9">{{ $subject->code}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-hand-paper"></i><b>&nbsp;Nombre Abreviado:</b></dt>
                <dd class="col-sm-9">{{ $subject->abrev_name}} </dd>


                <dt class="col-sm-3"><i class="fa-solid fa-calendar-plus"></i><b>&nbsp;Tipo de Materia:</b></dt>
                <dd class="col-sm-9">{{ $subject->type}} @if($subject->type != "Anual")
                        , {{$subject->semester}} @endif</dd>

                <dt class="col-sm-3"><i class="fa-solid fa-calendar-alt"></i><b>&nbsp;Año:</b></dt>
                <dd class="col-sm-9">{{ $subject->year}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-graduation-cap"></i><b>&nbsp;Carrera/s:</b></dt>
                <dd class="col-sm-9">
                    <ul>
                    @foreach($subject->carreras as $career)
                        <li>
                        <a href="{{ route('career.verCarrera',  $career->id) }}"> {{ $career->DenominacionCarrera}}
                            &nbsp; <i class="fa-solid fa-up-right-from-square"></i> </a>
                        </li>
                    @endforeach
                    </ul>
                   </dd>
                <dt class="col-sm-3"><i class="fa-solid fa-user-alt"></i><b>&nbsp;Coordinador/es:</b></dt>
                <dd class="col-sm-9">
                    <ul>
                    @foreach($coordsmateria as $coordinator)
                        <li>
                        <a href="{{ route('persona.verPersonaNotDocOnly',  $coordinator->id) }}"> {{ $coordinator->user->userData->lastname}}, {{ $coordinator->user->userData->name}} &nbsp; <i class="fa-solid fa-up-right-from-square"></i> </a>
                        </li>
                    @endforeach
                    </ul>

                </dd>



            </dl>



            <div class="h5 pb-2 mb-4 text-success border-bottom border-success"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;
                Cargos
            </div>
            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Cargo</th>
                        <th>Profesor</th>
                        <th>Dedicación Horaria</th>
                        <th>Estado</th>


                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cargos as $cargo)

                        <tr>
                            <td>{{  $cargo->tipo.' - '.$cargo->categoria}}</td>
                            <td><b>{{  strtoupper($cargo->persona->lastname)}}</b>, {{  $cargo->persona->name}}</td>
                            <td>{{  $cargo->dedicacion_horaria}}</td>

                            <td>@if($cargo->status == 1)
                                    @if($cargo->fecha_alta < date('Y-m-d'))
                                        @if ($cargo->fecha_baja)
                                            @if( date('Y-m-d')< $cargo->fecha_baja)
                                                <a class="btn btn-outline-info btn-sm"
                                                   href="
                                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos'))

                                                   {{ route('cargo.cargoToggle', $cargo->id) }}
                                                   @else
                                                       #
@endif
                                                       ">Habilitado</a>
                                            @else
                                                <a class="btn btn-outline-danger btn-sm"
                                                   href="
                                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos'))
                                                   {{ route('cargo.cargoToggle', $cargo->id) }}
                                                   @else
                                                       #
@endif
                                                       ">Deshabilitado</a>

                                            @endif
                                        @else
                                            <a class="btn btn-outline-info btn-sm"
                                               href="
                                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos'))
                                               {{ route('cargo.cargoToggle', $cargo->id) }}
                                               @else
                                                   #
                                                @endif
                                                   ">Habilitado</a>
                                        @endif
                                    @else
                                        <a class="btn btn-outline-danger btn-sm"
                                           href="
                                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos'))
                                           {{ route('cargo.cargoToggle', $cargo->id) }}
                                           @else
                                               #
@endif
                                               ">Deshabilitado</a>
                                    @endif
                                @else <a class="btn btn-outline-danger btn-sm"
                                         href="
                                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos'))
                                         {{ route('cargo.cargoToggle', $cargo->id) }}
                                         @else
                                             #
@endif
                                             ">Deshabilitado</a> @endif</td>
                            </td>

                            <td>
                                @if(auth()->user()->userData->userType_id <= 2)
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('cargo.cargo', $cargo->id) }}">Editar</a>
                                @endif
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('cargo.verCargo',  $cargo->id) }}">Ver</a>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>


            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>




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

