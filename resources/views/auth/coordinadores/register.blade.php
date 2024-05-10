@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('coordinador.perform') }}">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                <h1 class="h3 mb-3 fw-normal">Nueva Coordinacion </h1>




                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                   Datos del Coordinador
                </div>
                <div class="form-group">
                    <h3>{{$user->userData->lastname}}, <small>{{$user->userData->name}}</small></h3>
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                </div>

                <div class="form-group form-floating mb-3">
                    <div class="h6 pb-2 mb-4 text-success border-bottom border-success">
                        Departamento/s <span class="text-small small"> (puede seleccionar más de una)</span>
                    </div>

                    <select class="multi" name="depto_id[]" autofocus id="depto_id[]" multiple="multiple" size="5" style="width: 100%">

                        @foreach($deptos as $depto)
                            <option value="{{ $depto->id }}">{{$depto->name}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('depto_id'))
                        <span class="text-danger text-left">{{ $errors->first('depto_id') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <div class="h6 pb-2 mb-4 text-success border-bottom border-success">
                        Carrera/s <span class="small text-small"> (puede seleccionar más de una)</span>
                    </div>

                    <select class="multi" name="career_id[]" autofocus id="career_id[]" multiple="multiple" size="5" style="width: 100%">

                        @foreach($carreras as $career)
                            <option value="{{ $career->id }}">{{$career->CodigoSIU.' - '.$career->DenominacionCarrera}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('career_id'))
                        <span class="text-danger text-left">{{ $errors->first('career_id') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <div class="h6 pb-2 mb-4 text-success border-bottom border-success">
                        Materia/s <span class="small text-small"> (puede seleccionar más de una)</span>
                    </div>

                    <select class="multi" name="materia_id[]" autofocus id="materia_id[]" multiple="multiple" size="5" style="width: 100%">

                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}">{{$materia->code.' - '.$materia->name}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('materia_id'))
                        <span class="text-danger text-left">{{ $errors->first('materia_id') }}</span>
                    @endif
                </div>





                <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>

                @include('auth.partials.copy')
            </form>
            <script>
                $(document).ready(function() {
                    $('.multi').select2();
                });

            </script>
        @endauth

        @guest
            <h1>¡Bienvenido!</h1>
            <div class="d-flex justify-content-center">
                <iframe width="923" height="519" src="https://www.youtube.com/embed/REnyeTuFR98" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
            </div>

        @endguest
    </div>
@endsection

