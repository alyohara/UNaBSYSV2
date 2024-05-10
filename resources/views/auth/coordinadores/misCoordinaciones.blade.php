@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>


            <h1 class="h3 mb-3 fw-normal">Ver Coordinación </h1>



            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                Datos de la Coordinación
            </div>
            <div class="form-group form-floating mb-3">
                <div class="h6 pb-2 mb-4 ">
                    Departamento/s:
                </div>

                <dl class="row">
                    @foreach($deptos_coordinados as $depto)
                        <dd class="col-sm-9"> <a href="{{route('college.verFacultad', $depto->depto->id)}}">{{$depto->depto->name}}</a></dd>
                    @endforeach
                </dl>

            </div>
            <div class="form-group form-floating mb-3">
                <div class="h6 pb-2 mb-4 ">
                    Carrera/s:
                </div>
                <dl class="row">
                    @foreach($carreras_coordinadas as $carrera)
                        <dd class="col-sm-9"><a href="{{route('career.verCarrera', $carrera->carrera->id)}}">{{$carrera->carrera->CodigoSIU.' - '.$carrera->carrera->DenominacionCarrera}}</a></dd>
                    @endforeach
                </dl>


            </div>
            <div class="form-group form-floating mb-3">
                <div class="h6 pb-2 mb-4 ">
                    Materia/s:
                </div>
                <dl class="row">
                    @foreach($materias_coordinadas as $materia)
                        <dd class="col-sm-9"><a href="{{route('subject.verMateria', $materia->materia->id)}}">{{$materia->materia->code.' - '.$materia->materia->name}}</a></dd>
                    @endforeach
                </dl>


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

