@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>

            <h1 class="h3 mb-3 fw-normal"></h1>
            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                <i class="fa-solid fa-user-graduate"></i>&nbsp;&nbsp; Cargo
            </div>

            <dl class="row">

                <dt class="col-sm-5 text-primary"><i class="fa-solid fa-chalkboard-user"></i><b>&nbsp;Tipo de Cargo:</b></dt>
                <dd class="col-sm-7">{{ $cargo->tipo}} </dd>
                <dt class="col-sm-5 text-primary"><i class="fa-solid fa-calendar-check"></i><b>&nbsp;Fecha de Alta:</b></dt>
                <dd class="col-sm-7">{{ $cargo->fecha_alta}} </dd>
                <dt class="col-sm-5 text-primary"><i class="fa-solid fa-calendar-xmark"></i><b>&nbsp;Fecha de Baja:</b></dt>
                <dd class="col-sm-7">{{ $cargo->fecha_baja}} </dd>
                <dt class="col-sm-5 text-primary"><i class="fa-solid fa-user-graduate"></i><b>&nbsp;Categoría:</b></dt>
                <dd class="col-sm-7">{{ $cargo->categoria}} </dd>
                <dt class="col-sm-5 text-primary"><i class="fa-solid fa-clock"></i><b>&nbsp;Dedicación Horaria:</b></dt>
                <dd class="col-sm-7">{{ $cargo->dedicacion_horaria}} </dd>
                <dt class="col-sm-5 text-primary"><i class="fa-solid fa-file-signature"></i><b>&nbsp;Acto Administrativo / Designación:</b></dt>
                <dd class="col-sm-7">{{ $cargo->act_des}} </dd>


                <dt class="col-sm-5 text-primary"><i class="fa-solid fa-user-cog"></i><b>&nbsp;Materia:</b></dt>
                <dd class="col-sm-7"><a
                        href="{{ route('subject.verMateria',  $cargo->materia->id) }}"> {{ $cargo->materia->name}}
                        &nbsp; <i class="fa-solid fa-up-right-from-square"></i> </a></dd>
                <dt class="col-sm-5 text-primary"><i class="fa-solid fa-user-check"></i><b>&nbsp;Profesor:</b></dt>
                <dd class="col-sm-7"><a
                        href="{{ route('persona.verPersona',  $cargo->persona_id) }}"> {{ strtoupper($cargo->persona->lastname).', '.$cargo->persona->name}}
                        &nbsp; <i class="fa-solid fa-up-right-from-square"></i> </a></dd>


            </dl>




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

