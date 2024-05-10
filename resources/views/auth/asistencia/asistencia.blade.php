@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('asistencia.update') }}">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>


                <h1 class="h3 mb-3 fw-normal">Modificación de Asistencia</h1>



                <div class="row">
                    <div class="text-center">
                        <input type="radio" class="btn-check" name="forma" id="porProfesor" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="porProfesor">Por Profesor</label>

                        <input type="radio" class="btn-check" name="forma" id="porMateria" autocomplete="off">
                        <label class="btn btn-outline-primary" for="porMateria">Por Materia</label>
                    </div>
                </div>
                <div id="BusPorProf">
                    <div class="h6 pb-2 mb-4 text-success border-bottom border-success" id="porProfBus">
                        Datos de la Asistencia <small>(Búsqueda por profesor)</small>
                    </div>

                    <div class="row">

                        <div class="form-group  mb-3 col">
                            <label for="inputName" class="text-success">Profesor</label>
                            <select class="form-control selectpicker" data-live-search="true" name="profesor_id"
                                    id="profesor_id"
                                    autofocus required>
                                <option value="" disabled >Seleccione</option>
                                @foreach($profesores as $profesor)
                                    <option value="{{ $profesor->id }}"
                                            data-tokens="{{ $profesor->name }}"
                                            @if($profesor->id == $asistencia->profesor_id) selected @endif>{{ $profesor->name.', '.$profesor->lastname }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('profesor_id'))
                                <span class="text-danger text-left">{{ $errors->first('profesor_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group  mb-3 col">
                            <label for="inputName" class="text-success">Materia</label>

                            <select class="form-control" name="subject_id" autofocus id="subject_id" required>
                                <option value="" disabled>Seleccione</option>
                                @foreach($cargosMat as $subject)

                                    <option value="{{ $subject->materia->id }}"
                                            data-tokens="{{ $subject->materia->name }}"
                                            @if($subject->materia->id == $asistencia->subject_id) selected @endif>{{ $subject->materia->code.' - '.$subject->materia->name }}</option>
                                @endforeach


                            </select>

                            @if ($errors->has('subject_id'))
                                <span class="text-danger text-left">{{ $errors->first('subject_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="BusPorMat" style="display: none">
                    <div class="h6 pb-2 mb-4 text-success border-bottom border-success" id="porMatBus">
                        Datos de la Asistencia <small>(Búsqueda por materia)</small>
                    </div>
                    <div class="row">


                        <div class="form-group  mb-3 col">
                            <label for="inputName" class="text-success">Materia</label>
                            <select class="form-control" name="subject_id" autofocus id="subject_id2" required disabled>
                                <option value="" disabled>Seleccione</option>
                                @foreach($materias as $subject)
                                    <option value="{{ $subject->id }}"
                                            data-tokens="{{ $subject->name }}"
                                            @if($subject->id == $asistencia->subject_id) selected @endif>{{ $subject->code.' - '.$subject->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('subject_id'))
                                <span class="text-danger text-left">{{ $errors->first('subject_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group  mb-3 col">
                            <label for="inputName" class="text-success">Profesor</label>
                            <select class="form-control selectpicker" data-live-search="true" name="profesor_id"
                                    disabled
                                    id="profesor_id2"
                                    autofocus required>
                                <option value="" disabled >Seleccione</option>
                                @foreach($cargosProf as $profesor)
                                    <option value="{{ $profesor->persona->id }}"
                                            data-tokens="{{ $profesor->persona->name }}"
                                            @if($profesor->persona->id == $asistencia->profesor_id) selected @endif>{{ $profesor->persona->name.', '.$profesor->persona->lastname }}</option>
                                @endforeach

                            </select>

                            @if ($errors->has('profesor_id'))
                                <span class="text-danger text-left">{{ $errors->first('profesor_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <input type="radio" class="btn-check" name="tipo" id="porFecha" autocomplete="off" value="porFecha" @if($asistencia->tipo == 'porFecha') checked @endif>
                        <label class="btn btn-outline-primary" for="porFecha">Por Fecha</label>

                        <input type="radio" class="btn-check" name="tipo" id="porPeríodo" autocomplete="off" value="porPeriodo" @if($asistencia->tipo == 'porPeriodo') checked @endif>
                        <label class="btn btn-outline-primary" for="porPeríodo">Por Período</label>
                    </div>
                </div>
                <div id="dataFecha"   @if($asistencia->tipo == 'porPeriodo') style="display: none" @endif>
                    <div class="h6 pb-2 mb-4 text-success border-bottom border-success" id="porMatBus">
                        Fecha de la Asistencia
                    </div>
                    <div class="row">
                        <div class="form-group form-floating mb-3 col">
                            <input type="date" class="form-control" name="fecha" id="fecha" value="{{$asistencia->fecha ?? old('fecha') }}"
                                   placeholder="Fecha" required  @if($asistencia->tipo == 'porPeriodo') disabled @endif>
                            <label for="fecha">Fecha</label>

                            @if ($errors->has('fecha'))
                                <span class="text-danger text-left">{{ $errors->first('fecha') }}</span>
                            @endif
                        </div>


                    </div>

                </div>
                <div id="dataPeriodo"  @if($asistencia->tipo == 'porFecha') style="display: none" @endif>
                    <div class="h6 pb-2 mb-4 text-success border-bottom border-success" id="porMatBus">
                        Período de la Asistencia
                    </div>
                    <div class="row">
                        <div class="form-group form-floating mb-3 col">
                            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="{{$asistencia->fecha_inicio ?? old('fecha_inicio') }}"
                                   placeholder="Fecha Desde" required  @if($asistencia->tipo == 'porFecha') disabled @endif>
                            <label for="fecha_inicio">Fecha Desde</label>
                            @if ($errors->has('fecha_inicio'))
                                <span class="text-danger text-left">{{ $errors->first('fecha_inicio') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-floating mb-3 col">
                            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{$asistencia->fecha_fin ?? old('fecha_fin')}}"  @if($asistencia->tipo == 'porFecha') disabled @endif"
                                   placeholder="Fecha Hasta" required  @if($asistencia->tipo == 'porFecha') disabled @endif>
                            <label for="fecha_fin">Fecha Hasta</label>
                            @if ($errors->has('fecha_fin'))
                                <span class="text-danger text-left">{{ $errors->first('fecha_fin') }}</span>
                            @endif
                        </div>

                    </div>

                </div>
                <div class="form-group form-floating mb-3 col">
                    <select class="form-control" name="status" id="status" autofocus required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="1" @if($asistencia->status == 1) selected @endif>Presente</option>
                        <option value="0" @if($asistencia->status == 0) selected @endif>Ausente</option>

                    </select>
                    <label for="floatingName">Estado</label>
                    @if ($errors->has('status'))
                        <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3 col">
                    <select class="form-control" name="sede_de_cursada" id="sede_de_cursada" autofocus required>
                        <option value="" disabled selected>Seleccione</option>
                       @foreach($sedes as $sede)
                            <option value="{{$sede->id}}" @if($asistencia->sede_de_cursada == $sede->id) selected @endif>{{$sede->nombre}}</option>
                        @endforeach
                    </select>
                    <label for="floatingName">Sede de Cursada</label>
                    @if ($errors->has('sede_de_cursada'))
                        <span class="text-danger text-left">{{ $errors->first('sede_de_cursada') }}</span>
                    @endif
                </div>

                <input type="hidden" value="{{$asistencia->id}}" name="cargo_id" id="cargo_id">



                    <input type="hidden" name="bedel_id" id="bedel_id" value="{{ $asistencia->bedel_id }}">
                    <input type="hidden" name="id" id="id" value="{{ $asistencia->id }}">



                <button class="w-100 btn btn-lg btn-primary" type="submit">Actualizar</button>

                @include('auth.partials.copy')
            </form>
            <script>

                $("#porMateria").click(function () {
                    $('#BusPorProf').delay(0).fadeOut('fast');
                    $('#BusPorMat').delay(10).fadeIn('fast');
                    $('#subject_id').prop('disabled', true);
                    $('#profesor_id').prop('disabled', true);
                    $('#subject_id2').prop('disabled', false);
                    $('#profesor_id2').prop('disabled', false);

                });
                $("#porProfesor").click(function () {
                    $('#BusPorMat').delay(0).fadeOut('fast');
                    $('#BusPorProf').delay(10).fadeIn('fast');
                    $('#subject_id').prop('disabled', false);
                    $('#profesor_id').prop('disabled', false);
                    $('#subject_id2').prop('disabled', true);
                    $('#profesor_id2').prop('disabled', true);

                });
                $("#porFecha").click(function () {
                    $('#dataPeriodo').delay(0).fadeOut('fast');
                    $('#dataFecha').delay(10).fadeIn('fast');
                    $('#fecha_inicio').prop('disabled', true);
                    $('#fecha_inicio').prop('required', false);
                    $('#fecha_fin').prop('disabled', true);
                    $('#fecha_fin').prop('required', false);
                    $('#fecha').prop('disabled', false);
                    $('#fecha').prop('required', true);

                });
                $("#porPeríodo").click(function () {
                    $('#dataFecha').delay(0).fadeOut('fast');
                    $('#dataPeriodo').delay(10).fadeIn('fast');
                    $('#fecha_inicio').prop('disabled', false);
                    $('#fecha_inicio').prop('required', true);
                    $('#fecha_fin').prop('disabled', false);
                    $('#fecha_fin').prop('required', true);
                    $('#fecha').prop('disabled', true);
                    $('#fecha').prop('required', false);

                });

                $(function () {
                    $('#subject_id2').change(function () {

                        let type = "GET";
                        let materia = $(this).val();
                        $('#profesor_id2').empty().append('');
                        $.ajax({
                            type: type,
                            url: '/getProfesoresByMateria/' + materia,
                            success: function (data) {
                                console.log(
                                    data
                                );

                                let profesores = data['profesores'];
                                let options = '';
                                $('#profesor_id2').empty().append('<option value="" disabled selected>Seleccione</option>');
                                for (let i = 0; i < data['cantidad']; i++) { // Loop through the data & construct the options
                                    options += '<option value="' + profesores[i].id + '">' + profesores[i].name +', '+ profesores[i].lastname  + '</option>';
                                }
                                $('#profesor_id2').append(options);
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });

                    });
                });
                $(function () {
                    $('#profesor_id').change(function () {
                        let type = "GET";
                        let profesor = $(this).val();
                        $('#subject_id').empty().append('');

                        let url = '{{ route('getMateriasByProfesor', ":id") }}';
                        url = url.replace(':id', profesor);
                        let ajaxurl = url;
                        $.ajax({
                            type: type,
                            url: ajaxurl,
                            success: function (data) {

                                let materias = data['materias'];
                                let options = '';
                                options += '<option value="" disabled selected>Seleccione</option>';
                                for (let i = 0; i < data['cantidad']; i++) { // Loop through the data & construct the options
                                    options += '<option value="' + materias[i].id + '">' + materias[i].name + '</option>';
                                }
                                $('#subject_id').append(options);
                            },
                            error: function (data) {
                                console.log(data);
                            }
                        });


                    });
                });
                $(document).ready(function () {
                    $('#profesor_id').select2({
                        theme: "bootstrap"
                    });
                    $('#subject_id').select2({
                        theme: "bootstrap"
                    });
                    $('#profesor_id2').select2({
                        theme: "bootstrap"
                    });
                    $('#subject_id2').select2({
                        theme: "bootstrap"
                    });

                });


            </script>
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

