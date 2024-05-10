@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('career.update') }}">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="career_id" id="career_id" value="{{ $career->id }}" />

                <h1 class="h3 mb-3 fw-normal">Editar Carrera: <span class="text-info">{{$career->name}}</span> </h1>

                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                    Datos de la Carrera
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="name" value="{{ $career->name ?? old('name') }}" placeholder="Nombre" autofocus>
                    <label for="floatingName">Nombre</label>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="date" class="form-control" name="dateInit" value="{{$career->dateInit ??  old('dateInit') }}" placeholder="Fecha de Inicio"autofocus>
                    <label for="floatingName">Fecha de Inicio de Actividades</label>
                    @if ($errors->has('dateInit'))
                        <span class="text-danger text-left">{{ $errors->first('dateInit') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="data" value="{{$career->data ??  old('data') }}" placeholder="Data Extra" autofocus>
                    <label for="floatingName">Data</label>
                    @if ($errors->has('data'))
                        <span class="text-danger text-left">{{ $errors->first('data') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="CodigoSIU" value="{{$career->CodigoSIU ?? old('CodigoSIU') }}" placeholder="Codigo SIU"  autofocus required>
                    <label for="floatingName">Codigo SIU</label>
                    @if ($errors->has('CodigoSIU'))
                        <span class="text-danger text-left">{{ $errors->first('CodigoSIU') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input required type="text" class="form-control" name="DenominacionCarrera" value="{{$career->DenominacionCarrera ?? old('DenominacionCarrera') }}" placeholder="Denominación de Carrera"  autofocus>
                    <label for="floatingName">Denominación de Carrera</label>
                    @if ($errors->has('DenominacionCarrera'))
                        <span class="text-danger text-left">{{ $errors->first('DenominacionCarrera') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="Titulo" value="{{$career->Titulo ?? old('Titulo') }}" placeholder="Título"  autofocus REQUIRED>
                    <label for="floatingName">Título</label>
                    @if ($errors->has('Titulo'))
                        <span class="text-danger text-left">{{ $errors->first('Titulo') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="ResolucionAprobacionCS" value="{{$career->ResolucionAprobacionCS ?? old('ResolucionAprobacionCS') }}" placeholder="Resolución de Aprobación Consejo Superior UNAB"  autofocus>
                    <label for="floatingName">Resolución de Aprobación Consejo Superior UNAB</label>
                    @if ($errors->has('ResolucionAprobacionCS'))
                        <span class="text-danger text-left">{{ $errors->first('ResolucionAprobacionCS') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="ResolucionCorrelativasCS" value="{{$career->ResolucionCorrelativasCS ?? old('ResolucionCorrelativasCS') }}" placeholder="Resolución de Correlativas Consejo Superior UNAB"  autofocus>
                    <label for="floatingName">Resolución de Correlativas Consejo Superior UNAB</label>
                    @if ($errors->has('ResolucionCorrelativasCS'))
                        <span class="text-danger text-left">{{ $errors->first('ResolucionCorrelativasCS') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="ResolucionMinisterial" value="{{$career->ResolucionMinisterial ?? old('ResolucionMinisterial') }}" placeholder="Resolución Ministerial"  autofocus>
                    <label for="floatingName">Resolución Ministerial</label>
                    @if ($errors->has('ResolucionMinisterial'))
                        <span class="text-danger text-left">{{ $errors->first('ResolucionMinisterial') }}</span>
                    @endif
                </div>







                <div class="form-group form-floating mb-3">
                    <select class="form-control" name="college_id"   autofocus>
                        <option value="" disabled @if(!$career->college_id) selected @endif>Seleccione</option>
                        @foreach($colleges as $college)
                            <option value="{{ $college->id }}" @if($college->id == $career->college_id) selected @endif>{{$college->name}}</option>
                        @endforeach

                    </select>
                    <label for="floatingName">Departamento</label>
                    @if ($errors->has('college_id'))
                        <span class="text-danger text-left">{{ $errors->first('college_id') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <select class="form-control" name="years" value="{{ old('years') }}"  autofocus>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="0.5" @if('0.5' == $career->years) selected @endif>1 Semestre (Medio Año)</option>
                        <option value="1" @if('1' == $career->years) selected @endif>2 Semestres (Un Año)</option>
                        <option value="1.5" @if('1.5' == $career->years) selected @endif>3 Semestres (Un Año y medio)</option>
                        <option value="2" @if('2' == $career->years) selected @endif>4 Semestres (Dos Años)</option>
                        <option value="2.5" @if('2.5' == $career->years) selected @endif>5 Semestres (Dos Años y medio)</option>
                        <option value="3" @if('3' == $career->years) selected @endif>6 Semestres (Tres Años)</option>
                        <option value="3.5" @if('3.5' == $career->years) selected @endif>7 Semestres (Tres Años y medio)</option>
                        <option value="4" @if('4' == $career->years) selected @endif>8 Semestres (Cuatro Años)</option>
                        <option value="4.5" @if('4.5' == $career->years) selected @endif>9 Semestres (Cuatro Años y medio)</option>
                        <option value="5" @if('5' == $career->years) selected @endif>10 Semestres (Cinco Años)</option>
                        <option value="5.5" @if('5.5' == $career->years) selected @endif>11 Semestres (Cinco Años y medio)</option>
                        <option value="6" @if('6' == $career->years) selected @endif>12 Semestres (Seis Años)</option>
                        <option value="6.5" @if('6.5' == $career->years) selected @endif>13 Semestres (Seis Años y medio)</option>

                    </select>
                    <label for="floatingName">Años de duración (en semestres)</label>
                    @if ($errors->has('years'))
                        <span class="text-danger text-left">{{ $errors->first('years') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <div class="h6 pb-2 mb-4 text-success border-bottom border-success">
                        Coordinador/es <span class="text-small small"> (puede seleccionar más de uno)</span>
                    </div>

                    <select class="multi" name="coordinador_id[]" autofocus id="coordinador_id[]" multiple="multiple" size="5"
                            style="width: 100%">

                        @foreach($coords as $coord)
                            <option value="{{ $coord->user->id }}"
                                    @foreach($coordscarrera as $coordcarrera)
                                        @if($coord->user->id == $coordcarrera->coordinador_id) selected @endif
                                @endforeach

                            >{{$coord->name.' '.$coord->lastname}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('coordinador_id'))
                        <span class="text-danger text-left">{{ $errors->first('coordinador_id') }}</span>
                    @endif
                </div>



                <button class="w-100 btn btn-lg btn-primary" type="submit">Guardar Cambios</button>

                @include('auth.partials.copy')
            </form>
            <script>
                $(document).ready(function () {
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

