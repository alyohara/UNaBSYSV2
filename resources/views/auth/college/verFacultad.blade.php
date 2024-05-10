@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>

            <h1 class="h3 mb-3 fw-normal"></h1>




            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                <i class="fa-solid fa-building-columns"></i>&nbsp;&nbsp; {{strtoupper($college->name)}}
            </div>

            <dl class="row">
                <dt class="col-sm-3"><i class="fa-solid fa-envelope"></i><b>&nbsp;Email:</b></dt>
                <dd class="col-sm-9">{{ $college->email}}</dd>

                <dt class="col-sm-3"><i class="fa-solid fa-map-location-dot"></i><b>&nbsp;Dirección:</b></dt>
                <dd class="col-sm-9">{{ $college->address}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-calendar"></i><b>&nbsp;Fecha Inicio Actividades:</b></dt>
                <dd class="col-sm-9">{{ $college->dateInit}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-address-card"></i><b>&nbsp;Data:</b></dt>
                <dd class="col-sm-9">{{ $college->data}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-phone"></i><b>&nbsp;Teléfono:</b></dt>
                <dd class="col-sm-9">{{ $college->phone}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-chrome"></i><b>&nbsp;Sitio Web:</b></dt>
                <dd class="col-sm-9">{{ $college->website}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-building-columns"></i><b>&nbsp;Tipo de Sede:</b></dt>
                <dd class="col-sm-9">{{ $college->tipo_de_sede}} </dd>

                <dt class="col-sm-3"><i class="fa-solid fa-user-alt"></i><b>&nbsp;Coordinador/es:</b></dt>
                <dd class="col-sm-9">
                    @foreach($coords as $coordinador)
                        <a href="{{route('coordinador.verCoordinador', $coordinador->coordinador->id)}}">{{$coordinador->coordinador->user->userData->name.' '.$coordinador->coordinador->user->userData->lastname}}</a>
                        <br>
                    @endforeach
                </dd>




            </dl>


            <div class="h5 pb-2 mb-4 text-success border-bottom border-success"><i class="fa-solid fa-file"></i>&nbsp;&nbsp;
                Carreras
            </div>
            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Titulo</th>



                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($careers as $career)

                        <tr>
                            <td>{{$career->CodigoSIU.' - '.  $career->DenominacionCarrera}}</td>
                            <td>{{  $career->Titulo}}</td>


                            <td>
                                @if(auth()->user()->userData->tipo->id  <= 2)
                                    <a class="btn btn-success btn-sm"
                                       href="{{ route('career.career', $career->id) }}">Editar</a>
                                @endif
                                <a class="btn btn-primary btn-sm"
                                   href="{{ route('career.verCarrera', $career->id) }}">Ver</a>
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

