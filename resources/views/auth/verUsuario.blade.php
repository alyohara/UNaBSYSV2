@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>

            <input type="hidden" name="persona_id" id="persona_id" value="{{$user->userData->id }}"/>
            <h1 class="h3 mb-3 fw-normal"></h1>
            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                <i class="fa-solid fa-user-lock"></i>&nbsp;&nbsp; Datos del Usuario
            </div>
            <dl class="row">

                <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Email (del usuario):</b></dt>
                <dd class="col-sm-9">{{$user->email}}</dd>

                <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Nombre de Usuario:</b></dt>
                <dd class="col-sm-9">{{$user->username}}</dd>
            </dl>



            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                <i class="fa-solid fa-user"></i>&nbsp;&nbsp; Datos Personales
            </div>

            <dl class="row">

                <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Documento:</b></dt>
                <dd class="col-sm-9">{{$user->userData->doc}}</dd>

                <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Nombre:</b></dt>
                <dd class="col-sm-9">{{$user->userData->name}}</dd>

                <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Apellido:</b></dt>
                <dd class="col-sm-9">{{$user->userData->lastname}}</dd>

                <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Email (profesional):</b></dt>
                <dd class="col-sm-9">{{$user->userData->email}}</dd>

                <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Email (personal):</b></dt>
                <dd class="col-sm-9">{{$user->userData->personal_email}}</dd>

                <dt class="col-sm-3"><i class="fa-solid fa-map-location-dot"></i><b>&nbsp;Dirección:</b></dt>
                <dd class="col-sm-9">{{$user->userData->address}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-phone"></i><b>&nbsp;Teléfono:</b></dt>
                <dd class="col-sm-9">{{$user->userData->phone}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-calendar"></i><b>&nbsp;Fecha de Nacimiento:</b></dt>
                <dd class="col-sm-9">{{$user->userData->birth}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-address-card"></i><b>&nbsp;Documento:</b></dt>
                <dd class="col-sm-9">{{$user->userData->doc}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-person-half-dress"></i><b>&nbsp;Género:</b></dt>
                <dd class="col-sm-9">{{$user->userData->gender}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-people-arrows"></i><b>&nbsp;Roles:</b></dt>
                <dd class="col-sm-9">
                    <ul>@foreach($user->userData->roles as $rol)
                            <li>{{ $rol->name }}</li>
                        @endforeach</ul>
                </dd>


            </dl>

            <div class="h5 pb-2 mb-4 text-success border-bottom border-success"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;
                Curriculum
            </div>
            <dl class="row">
                <dt class="col-sm-12"></b>
                    @if ($user->userData->cv_id)
                        <embed src="{{ asset($user->userData->curriculum->file_path) }}" height="500" width="100%"
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

                            <td>{{ $cargo->materia->code .' - '. $cargo->materia->name}}</td>

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
                                                   {{ route('cargo.cargoToggle2', $cargo->id) }}
                                                   @else
                                                       #
@endif
                                                       ">Deshabilitado</a>

                                            @endif
                                        @else
                                            <a class="btn btn-outline-info btn-sm"
                                               href="
                                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos'))
                                               {{ route('cargo.cargoToggle2', $cargo->id) }}
                                               @else
                                                   #
                                                @endif
                                                   ">Habilitado</a>
                                        @endif
                                    @else
                                        <a class="btn btn-outline-danger btn-sm"
                                           href="
                                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos'))
                                           {{ route('cargo.cargoToggle2', $cargo->id) }}
                                           @else
                                               #
@endif
                                               ">Deshabilitado</a>
                                    @endif
                                @else <a class="btn btn-outline-danger btn-sm"
                                         href="
                                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos'))
                                         {{ route('cargo.cargoToggle2', $cargo->id) }}
                                         @else
                                             #
@endif
                                             ">Deshabilitado</a> @endif</td>


                            </td>

                            <td>
                                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno'))
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

            @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno'))<a
                class="btn btn-success btn-sm"
                href="{{ route('register.user', $user->id) }}">Editar</a>
            @endif

            @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno'))

                <a class="btn btn-warning btn-sm"
                   href="{{ route('register.changePass', $user->id) }}">Cambiar Contraseña</a></td>
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

