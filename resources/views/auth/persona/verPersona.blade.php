@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>

            <input type="hidden" name="persona_id" id="persona_id" value="{{ $persona->id }}"/>
            <h1 class="h3 mb-3 fw-normal"></h1>




            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                <i class="fa-solid fa-user"></i>&nbsp;&nbsp; {{strtoupper($persona->lastname).', '.$persona->name}}
            </div>
            <div style=" display: flex; flex-direction: row; ">
                <div style="width: 70%;">
                    <dl class="row">


                        <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Email:</b></dt>
                        <dd class="col-sm-9">{{ $persona->email}}</dd>
                        <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Email personal:</b></dt>
                        <dd class="col-sm-9">{{ $persona->personal_email}}</dd>

                        <dt class="col-sm-3"><i class="fa-solid fa-map-location-dot"></i><b>&nbsp;Dirección:</b></dt>
                        <dd class="col-sm-9">{{ $persona->address}} </dd>

                        <dt class="col-sm-3"><i class="fa-solid fa-phone"></i><b>&nbsp;Teléfono:</b></dt>
                        <dd class="col-sm-9">{{ $persona->phone}} </dd>

                        <dt class="col-sm-3"><i class="fa-solid fa-calendar"></i><b>&nbsp;Fecha de Nacimiento:</b></dt>
                        <dd class="col-sm-9">{{ $persona->birth}} </dd>

                        <dt class="col-sm-3"><i class="fa-solid fa-address-card"></i><b>&nbsp;Documento:</b></dt>
                        <dd class="col-sm-9">{{ $persona->doc}} </dd>

                        <dt class="col-sm-3"><i class="fa-solid fa-person-half-dress"></i><b>&nbsp;Género:</b></dt>
                        <dd class="col-sm-9">{{ $persona->gender}} </dd>

                        <dt class="col-sm-3"><i class="fa-solid fa-people-arrows"></i><b>&nbsp;Roles:</b></dt>
                        <dd class="col-sm-9">
                            <ul>@foreach($persona->roles as $rol)
                                    <li>{{ $rol->name }}</li>
                                @endforeach</ul>
                        </dd>
                        <dt class="col-sm-3"><i class="fa-solid fa-person-half-dress"></i><b>&nbsp;Docencia:</b></dt>
                        <dd class="col-sm-9">{{ $persona->Docencia}} </dd>
                        <dt class="col-sm-3"><i class="fa-solid fa-person-half-dress"></i><b>&nbsp;Investigacion:</b>
                        </dt>
                        <dd class="col-sm-9">{{ $persona->Investigacion}} </dd>
                        <dt class="col-sm-3"><i class="fa-solid fa-person-half-dress"></i><b>&nbsp;Extension:</b></dt>
                        <dd class="col-sm-9">{{ $persona->Extension}} </dd>
                        <dt class="col-sm-3"><i class="fa-solid fa-person-half-dress"></i><b>&nbsp;Gestion:</b></dt>
                        <dd class="col-sm-9">{{ $persona->Gestion}} </dd>

                        <dt class="col-sm-3"><i class="fa-solid fa-graduation-cap"></i><b>&nbsp;Diplomatura:</b></dt>
                        <dd class="col-sm-9">{{ $persona->diplomatura}}</dd>

                        <dt class="col-sm-3"><i class="fa-solid fa-map-marker-alt"></i><b>&nbsp;Area:</b></dt>
                        <dd class="col-sm-9">{{ $persona->area}}</dd>
                    </dl>
                </div>


                @php
                    $userRoles = auth()->user()->userData->roles->pluck('name')->toArray();
                    $currentRouteName = Route::currentRouteName();
                @endphp

                @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles))
                    <div style="width: 25%; display: flex;  align-items: center;  justify-content: center;">
                        @if($persona->user)
                            <div class="alert alert-primary" role="alert">
                                Este docente además tiene creado un <a
                                    href="{{ route('register.verUsuario', $persona->user->id) }}"
                                    class="alert-link">usuario</a> para el sistema.
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert">
                                <p>Este docente no tiene creado un usuario para el sistema.</p>

                                <a
                                    href="{{ route('register.show2', $persona->id) }}"
                                    class="btn btn-success btn-sm">¿Crear Usuario?</a>
                            </div>
                        @endif


                    </div>
                @endif
            </div>

            <div class="h5 pb-2 mb-4 text-success border-bottom border-success"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;
                Curriculum
            </div>
            <dl class="row">
                <dt class="col-sm-12"></b>
                    @if ($persona->cv_id)
                        <embed src="{{ asset($persona->curriculum->file_path) }}" height="500" width="100%"
                               alt="pdf"/>
                    @else
                        No tiene Curriculum cargado
                    @endif</dt>
            </dl>
            <div class="h5 pb-2 mb-4 text-success border-bottom border-success"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;
                Cargos
            </div>
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
                    @foreach ($cargos as $cargo)

                        <tr>

                            <td>{{  $cargo->materia->name}}</td>
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
                                                   href="
                                                @if(auth()->user()->userData->userType_id <= 3)
                                                       {{ route('cargo.cargoToggle', $cargo->id) }}
                                                       @else
                                                           #
@endif
                                                           ">Habilitado</a>
                                            @else
                                                <a class="btn btn-outline-danger btn-sm"
                                                   href="
                                                @if(auth()->user()->userData->userType_id <= 3)
                                                       {{ route('cargo.cargoToggle', $cargo->id) }}
                                                       @else
                                                           #
@endif
                                                           ">Deshabilitado</a>

                                            @endif
                                        @else
                                            <a class="btn btn-outline-info btn-sm"
                                               href="
                                                @if(auth()->user()->userData->userType_id <= 3)
                                                   {{ route('cargo.cargoToggle', $cargo->id) }}
                                                   @else
                                                       #
@endif
                                                       ">Habilitado</a>
                                        @endif
                                    @else
                                        <a class="btn btn-outline-danger btn-sm"
                                           href="
                                                @if(auth()->user()->userData->userType_id <= 3)
                                               {{ route('cargo.cargoToggle', $cargo->id) }}
                                               @else
                                                   #
@endif
                                                   ">Deshabilitado</a>
                                    @endif
                                @else
                                    <a class="btn btn-outline-danger btn-sm"
                                       href="
                                                @if(auth()->user()->userData->userType_id <= 3)
                                             {{ route('cargo.cargoToggle', $cargo->id) }}
                                             @else
                                                 #
@endif
                                                 ">Deshabilitado</a>
                                @endif</td>


                            </td>

                            <td>
                                @if(auth()->user()->userData->userType_id <= 2)
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('cargo.cargo', $cargo->id) }}">Editar</a>
                                @endif
                            </td>
                            <td><a class="btn btn-primary btn-sm"
                                   href="{{ route('cargo.verCargo', $cargo->id) }}">Ver</a></td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(auth()->user()->userData->userType_id <= 2)
                <a class="btn btn-success btn-sm"
                   href="{{ route('persona.persona', $persona->id) }}">Editar</a>
            @endif

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

