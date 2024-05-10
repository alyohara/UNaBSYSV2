@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>

            <h1 class="h3 mb-3 fw-normal"></h1>
            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                <i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp; {{strtoupper($career->name)}}
            </div>

            <dl class="row">

                <dt class="col-sm-3"><i class="fa-solid fa-calendar"></i><b>&nbsp;Fecha Inicio Actividades:</b></dt>
                <dd class="col-sm-9">{{ $career->dateInit}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-address-card"></i><b>&nbsp;Data:</b></dt>
                <dd class="col-sm-9">{{ $career->data}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-building-columns"></i><b>&nbsp;Departamento:</b></dt>
                @if($career->college_id != NULL)
                    <dd class="col-sm-9"><a
                            href="{{ route('college.verFacultad',  $career->facultad->id) }}"> {{ $career->facultad->name}}
                            &nbsp; <i class="fa-solid fa-up-right-from-square"></i> </a></dd>

                @else
                    <dd class="col-sm-9">No tiene departamento asociado</dd>

                @endif

                <dt class="col-sm-3"><i class="fa-solid fa-calendar-alt"></i><b>&nbsp;Cantidad de Años:</b></dt>
                <dd class="col-sm-9">{{ $career->years}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-code"></i><b>&nbsp;Código SIU:</b></dt>
                <dd class="col-sm-9">{{ $career->CodigoSIU}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-header"></i><b>&nbsp;Denominacion de la Carrera:</b></dt>
                <dd class="col-sm-9">{{ $career->DenominacionCarrera}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-graduation-cap"></i><b>&nbsp;Titulo:</b></dt>
                <dd class="col-sm-9">{{ $career->Titulo}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-graduation-cap"></i><b>&nbsp;Resolución de Aprobación Consejo
                        Superior UNAB:</b></dt>
                <dd class="col-sm-9">{{ $career->ResolucionAprobacionCS}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-graduation-cap"></i><b>&nbsp;Resolución de Correlativas
                        Consejo Superior UNAB:</b></dt>
                <dd class="col-sm-9">{{ $career->ResolucionCorrelativasCS}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-graduation-cap"></i><b>&nbsp;Resolución Ministerial:</b></dt>
                <dd class="col-sm-9">{{ $career->ResolucionMinisterial}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-user-alt"></i><b>&nbsp;Coordinador/es:</b></dt>
                <dd class="col-sm-9">
                    @foreach($coords as $coordinador)
                        <a href="{{route('coordinador.verCoordinador', $coordinador->coordinador->id)}}">{{$coordinador->coordinador->user->userData->name.' '.$coordinador->coordinador->user->userData->lastname}}</a>
                        <br>
                    @endforeach
                </dd>


            </dl>


            <div class="h5 pb-2 mb-4 text-success border-bottom border-success"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;
                Materias <?php //TODO ver materias de la carrera ?>
            </div>
            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Año</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($subjects as $subject)

                        <tr>
                            <td>{{  $subject->code}}</td>
                            <td>{{  $subject->name}}</td>
                            <td>{{  $subject->year}}</td>
                            <td>{{  $subject->type}}</td>
                            <td>
                                @if(auth()->user()->userData->tipo->id  <= 2)
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('subject.subject', $subject->id) }}">Editar</a>
                                @endif
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('subject.verMateria', $subject->id) }}">Ver</a>

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

