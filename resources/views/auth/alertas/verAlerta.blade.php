@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <a style="margin-bottom: 5px; float: right" href="{{ route('alerta.alertas') }}" class="  btn btn-secondary ">Volver</a>

            <h1 class="h3 mb-3 fw-normal"></h1>
            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                <i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp; {{strtoupper($alerta->titulo)}}
            </div>

            <dl class="row">

                <dt class="col-sm-3"><i class="fa-solid fa-calendar"></i><b>&nbsp;Descripción:</b></dt>
                <dd class="col-sm-9">{{ $alerta->descripcion}} </dd>
                <dt class="col-sm-3"><i class="fa-solid fa-calendar"></i><b>&nbsp;Tipo:</b></dt>
                <dd class="col-sm-9">
                    @if($alerta->tipo == 1)
                        Alta
                    @endif
                    @if($alerta->tipo == 2)
                        Baja
                    @endif
                    @if($alerta->tipo == 3)
                        Modificación
                    @endif</dd>
                <dt class="col-sm-3"><i class="fa-solid fa-calendar"></i><b>&nbsp;Origen:</b></dt>
                <dd class="col-sm-9">
                    @if($alerta->origen == 1)
                        Proceso automático del sistema.
                    @endif
                    @if($alerta->origen == 2)
                        Usuario: {{$alerta->user->userData->name.' '.$alerta->user->userData->lastname}}
                    @endif </dd>


            </dl>
    <dl class="row">
        <div class="h6 pb-2 mb-4 text-primary border-bottom border-primary">Cargo:</div>

                <dt class="col-sm-5 text-black-50"><i class="fa-solid fa-chalkboard-user"></i><b>&nbsp;Tipo de Cargo:</b>
                </dt>
                <dd class="col-sm-7">{{ $alerta->tipo}} </dd>
                <dt class="col-sm-5 text-black-50"><i class="fa-solid fa-calendar-check"></i><b>&nbsp;Fecha de Alta:</b>
                </dt>
                <dd class="col-sm-7">{{ $alerta->fecha_alta}} </dd>
                <dt class="col-sm-5 text-black-50"><i class="fa-solid fa-calendar-xmark"></i><b>&nbsp;Fecha de Baja:</b>
                </dt>
                <dd class="col-sm-7">{{ $alerta->fecha_baja}} </dd>
                <dt class="col-sm-5 text-black-50"><i class="fa-solid fa-user-graduate"></i><b>&nbsp;Categoría:</b></dt>
                <dd class="col-sm-7">{{ $alerta->categoria}} </dd>
                <dt class="col-sm-5 text-black-50"><i class="fa-solid fa-clock"></i><b>&nbsp;Dedicación Horaria:</b></dt>
                <dd class="col-sm-7">{{ $alerta->dedicacion_horaria}} </dd>
                <dt class="col-sm-5 text-black-50"><i class="fa-solid fa-file-signature"></i><b>&nbsp;Acto Administrativo
                        / Designación:</b></dt>
                <dd class="col-sm-7">{{ $alerta->act_des}} </dd>


                <dt class="col-sm-5 text-black-50"><i class="fa-solid fa-user-cog"></i><b>&nbsp;Materia:</b></dt>
                <dd class="col-sm-7"><a
                        href="{{ route('subject.verMateria',  $alerta->materia->id) }}"> {{ $alerta->materia->name}}
                        &nbsp; <i class="fa-solid fa-up-right-from-square"></i> </a></dd>
                <dt class="col-sm-5 text-black-50"><i class="fa-solid fa-user-check"></i><b>&nbsp;Profesor:</b></dt>
                <dd class="col-sm-7"><a
                        href="{{ route('persona.verPersona',  $alerta->user_id) }}"> {{ strtoupper($alerta->user->lastname).', '.$alerta->user->name}}
                        &nbsp; <i class="fa-solid fa-up-right-from-square"></i> </a></dd>

                </dd>


            </dl>





            <a style="margin-bottom: 5px; float: right" href="{{ route('alerta.alertas') }}" class="  btn btn-secondary "
              >Volver</a>




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

