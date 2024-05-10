@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form id="formulario" method="post" action="{{ route('persona.perform') }}" enctype="multipart/form-data">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="edit" id="edit" value=""/>

                <h1 class="h3 mb-3 fw-normal">Registro Nuevo Docente</h1>


                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                    Datos del Docente
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group form-floating mb-3">

                            <input type="number" class="form-control " name="doc" id="doc"
                                   value="{{old('doc') }}" placeholder="Documento"
                                   required="required" autofocus>

                            <label for="floatingName">Documento</label>
                            <span class="text-danger text-left" name="epned" id="epned"></span>
                            @if ($errors->has('doc'))
                                <span class="text-danger text-left">{{ $errors->first('doc') }}</span>
                            @endif

                        </div>
                    </div>

                    <div class="col-md-1">
                        <a style="margin-top: 5px" class="btn btn-outline-primary btn-lg" onclick="getDocente()">Verificar</a>
                    </div>


                </div>
                <div class="form-group form-floating mb-3">
                    <input disabled="disabled" type="email" class="form-control" name="email" id="email"
                           value="{{ old('email') }}"
                           placeholder="name@example.com" required="required" autofocus>
                    <label for="floatingEmail">Email address</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input disabled="disabled" type="personal_email" class="form-control" name="personal_email"
                           id="personal_email"
                           value="{{ old('personal_email') }}"
                           placeholder="name@example.com" autofocus>
                    <label for="floatingpersonal_Email">Email personal</label>
                    @if ($errors->has('personal_email'))
                        <span class="text-danger text-left">{{ $errors->first('personal_email') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input disabled="disabled" type="text" class="form-control" name="name" id="name"
                           value="{{ old('name') }}"
                           placeholder="Nombre" required="required" autofocus>
                    <label for="floatingName">Nombre</label>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input disabled="disabled" type="text" class="form-control" name="lastname" id="lastname"
                           value="{{ old('lastname') }}" placeholder="Apellido" required="required" autofocus>
                    <label for="floatingName">Apellido</label>
                    @if ($errors->has('lastname'))
                        <span class="text-danger text-left">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input disabled="disabled" type="text" class="form-control" name="address" id="address"
                           value="{{ old('address') }}" placeholder="Dirección" required="required" autofocus>
                    <label for="floatingName">Dirección</label>
                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input disabled="disabled" type="text" class="form-control" name="phone" id="phone"
                           value="{{ old('phone') }}"
                           placeholder="Teléfono" required="required" autofocus>
                    <label for="floatingName">Teléfono</label>
                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input disabled="disabled" type="date" class="form-control" name="birth" id="birth"
                           value="{{ old('birth') }}"
                           placeholder="Fecha de Nacimiento" required="required" autofocus>
                    <label for="floatingName">Fecha de Nacimiento</label>
                    @if ($errors->has('birth'))
                        <span class="text-danger text-left">{{ $errors->first('birth') }}</span>
                    @endif
                </div>


                <div class="form-group form-floating mb-3">
                    <select disabled="disabled" class="form-control" name="gender" id="gender"
                            value="{{ old('gender') }}"
                            required="required" autofocus>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="No Binarie">No Binarie</option>
                        <option value="Otro">Otro</option>
                        <option value="No Contesta">No Contesta</option>
                    </select>
                    <label for="floatingName">Género</label>
                    @if ($errors->has('gender'))
                        <span class="text-danger text-left">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
                <label for="floatingName" class="form-label">CV:</label>
                <span id="cv_show1"></span>
                <div class="form-group mb-3" name="cv_show" id="cv_show">

                    <input disabled="disabled" type="file" class="form-control" name="file" id="file" value=""
                           autofocus>

                    @if ($errors->has('file'))
                        <span class="text-danger text-left">{{ $errors->first('file') }}</span>
                    @endif

                </div>
                <input type="hidden" name="userType_id" id="userType_id" value="4">
                <div class="form-group form-floating mb-3">

                    <div class="form-check form-check-inline" >
                        <input class="form-check-input" type="checkbox" disabled="disabled" id="Docencia" value="" name="Docencia">
                        <label class="form-check-label" for="Docencia">Docencia</label>
                    </div>
                    <div class="form-check form-check-inline" >
                        <input class="form-check-input" type="checkbox" disabled="disabled" id="Investigacion" value=""
                               name="Investigacion">
                        <label class="form-check-label" for="Investigacion">Investigacion</label>
                    </div>
                    <div class="form-check form-check-inline" >
                        <input class="form-check-input" type="checkbox" disabled="disabled" id="Extension" value="" name="Extension">
                        <label class="form-check-label" for="Extension">Extension</label>
                    </div>
                    <div class="form-check form-check-inline" >
                        <input class="form-check-input" type="checkbox" disabled="disabled" id="Gestion" value="" name="Gestion">
                        <label class="form-check-label" for="Gestion">Gestion</label>
                    </div>

                </div>
                <div class="form-group form-floating mb-3" >
                    <select class="form-control" name="diplomatura" id="diplomatura" disabled="disabled">
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Especialización">Especialización</option>
                        <option value="PostGrado">PostGrado</option>
                        <option value="Máster">Máster</option>
                        <option value="Doctorado">Doctorado</option>
                    </select>
                    <label for="diplomatura">Diplomatura</label>
                    @if ($errors->has('diplomatura'))
                        <span class="text-danger text-left">{{ $errors->first('diplomatura') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3" >
                    <input type="text" class="form-control" name="area" id="area" value="{{ old('area') }}"
                           placeholder="Area" disabled>
                    <label for="area">Area</label>
                    @if ($errors->has('area'))
                        <span class="text-danger text-left">{{ $errors->first('area') }}</span>
                    @endif
                </div>


                <div class="row">

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="cargoSwitch"
                               name="cargoSwitch">
                        <label class="form-check-label" for="cargoSwitch">¿Agregar cargo?</label>
                    </div>
                </div>
                <div id="cargoSectionContainer">
                    <div class="h5 pb-2 mb-4 text-success border-bottom border-success" id="titulo">
                        Datos del Cargo
                    </div>
                    <div class="row">

                        <div class="form-group form-floating mb-4 col">
                            <select class="form-control" name="tipo" id="tipo" autofocus required disabled="disabled">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="Ordinario/Concursado">Ordinario/Concursado</option>
                                <option value="Interino">Interino</option>
                                <option value="Contratado">Contratado</option>
                            </select>
                            <label for="floatingName">Tipo</label>
                            @if ($errors->has('cargo'))
                                <span class="text-danger text-left">{{ $errors->first('cargo') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-floating mb-4 col">
                            <input type="date" class="form-control" name="fecha_alta" id="fecha_alta"
                                   value="{{ old('fecha_alta') }}" required disabled>
                            <label for="fecha_alta">Fecha de Alta</label>
                            @if ($errors->has('fecha_alta'))
                                <span class="text-danger text-left">{{ $errors->first('fecha_alta') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-floating mb-4 col">
                            <input type="date" class="form-control" name="fecha_baja" id="fecha_baja"
                                   value="{{ old('fecha_baja') }}" disabled>
                            <label for="fecha_baja">Fecha de Baja</label>
                            @if ($errors->has('fecha_baja'))
                                <span class="text-danger text-left">{{ $errors->first('fecha_baja') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-floating mb-12 col" style="margin-bottom: 25px">
                            <input type="text" class="form-control" name="act_des" id="act_des"
                                   value="{{ old('act_des') }}" disabled>
                            <label for="act_des">Acto Administrativo / Designación</label>
                            @if ($errors->has('act_des'))
                                <span class="text-danger text-left">{{ $errors->first('act_des') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-floating mb-3 col">
                            <select class="form-control" name="categoria" id="categoria" autofocus
                                    disabled="disabled">
                                <option value="" disabled selected>Seleccione</option>

                                <option value="Profesor Titular (TIT)">Profesor Titular (TIT)</option>
                                <option value="Profesor Asociado (ASO)">Profesor Asociado (ASO)</option>
                                <option value="Profesor Adjunto (ADJ)">Profesor Adjunto (ADJ)</option>
                                <option value="Auxiliar Jefe de Trabajos Prácticos (JTP)">Auxiliar Jefe de Trabajos
                                    Prácticos (JTP)
                                </option>
                                <option value="Auxiliar Ayudante (AuxA)">Auxiliar Ayudante (AuxA)</option>
                                <option value="Auxiliar Ayudante Alumno (AuxAA)">Auxiliar Ayudante Alumno (AuxAA)
                                </option>


                            </select>
                            <label for="floatingName">Categoria</label>
                            @if ($errors->has('status'))
                                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-floating mb-3 col">
                            <select class="form-control" name="dedicacion_horaria" id="dedicacion_horaria" autofocus
                                    disabled="disabled">
                                <option value="" disabled selected>Seleccione</option>
                                <option value="Dedicación Exclusiva">Dedicación Exclusiva</option>
                                <option value="Dedicación Semi Exclusiva">Dedicación Semi Exclusiva</option>
                                <option value="Dedicación Simple">Dedicación Simple</option>
                                <option value="Ad Honorem">Ad Honorem</option>
                            </select>
                            <label for="floatingName">Dedicación Horaria</label>
                            @if ($errors->has('dedicacion_horaria'))
                                <span class="text-danger text-left">{{ $errors->first('dedicacion_horaria') }}</span>
                            @endif


                        </div>
                        <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                            Materia
                        </div>
                        <div class="row">

                            <div class="form-group form-floating mb-3 col">
                                <select class="form-control" name="college_id" id="college_id" autofocus
                                        disabled="disabled">
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach($colleges as $college)
                                        <option value="{{ $college->id }}">{{$college->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingName">Departamento</label>
                                @if ($errors->has('college_id'))
                                    <span class="text-danger text-left">{{ $errors->first('college_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-floating mb-3 col">
                                <select class="form-control" name="career_id" autofocus id="career_id"
                                        disabled="disabled">
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach($carreras as $carrera)
                                        <option
                                            value="{{ $carrera->id }}">{{$carrera->CodigoSIU . ' - ' . $carrera->DenominacionCarrera}}</option>
                                    @endforeach

                                </select>
                                <label for="floatingName">Carrera</label>
                                @if ($errors->has('career_id'))
                                    <span class="text-danger text-left">{{ $errors->first('career_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group form-floating mb-3 col">
                                <select class="form-control" name="subject_id" autofocus id="subject_id" required
                                        disabled="disabled">
                                    <option value="" disabled selected>Seleccione</option>
                                    @foreach($materias as $subject)
                                        <option
                                            value="{{ $subject->id }}">{{$subject->code . ' - ' . $subject->name}}</option>
                                    @endforeach


                                </select>
                                <label for="floatingName">Materia</label>
                                @if ($errors->has('subject_id'))
                                    <span class="text-danger text-left">{{ $errors->first('subject_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cargoSectionContainerPlus"></div>
                <input type="hidden" id="cargos" name="cargos">


                <button type="button" id="addCargoButton" class="btn btn-primary mt-3" style="margin-bottom: 10px"
                        disabled>Agregar otro cargo?
                </button>

                <script>
                    $(document).ready(function () {
                        numCargo = 0;

                        $('#addCargoButton').on('click', function () {
                            var cargoSection = $('#cargoSectionContainer').clone();
                            cargoSection.find('input, select').val('');
                            cargoSection.find('input[type="checkbox"]').prop('checked', false);
                            //find the titulo id and add a top border
                            cargoSection.find('#titulo').css('border-top', '3px dashed  #ced4da');
                            cargoSection.find('#titulo').css('margin-top', '30px');
                            cargoSection.find('#titulo').css('padding-top', '30px');
                            cargoSection.find('#titulo').html('Datos del Cargo ' + (numCargo + 2));
                            cargoSection.append('<button type="button" class="deleteCargoButton btn btn-danger mt-3" style="margin-bottom: 10px">Remove</button>');
                            numCargo++;

                            cargoSection.appendTo('#cargoSectionContainerPlus');
                        });

                        $(document).on('click', '.deleteCargoButton', function () {
                            $(this).closest('#cargoSectionContainer').remove();
                            numCargo--;
                        });
                    });


                </script>


                <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>

                @include('auth.partials.copy')
            </form>
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

    <script>
        function getDocente() {
            let type = "GET";
            let cuit = jQuery('#doc').val();
            if (jQuery('#doc').val() == '') {
                jQuery('#email').val('');
                jQuery('#personal_email').val('');
                jQuery('#name').val('');
                jQuery('#lastname').val('');
                jQuery('#address').val('');
                jQuery('#phone').val('');
                jQuery('#birth').val('');
                jQuery('#gender').val('');
                jQuery('#file').val('');
                jQuery('#diplomatura').val('');
                jQuery('#area').val('');

                jQuery('#email').prop('disabled', false);
                jQuery('#personal_email').prop('disabled', false);
                jQuery('#name').prop('disabled', false);
                jQuery('#lastname').prop('disabled', false);
                jQuery('#address').prop('disabled', false);
                jQuery('#phone').prop('disabled', false);
                jQuery('#birth').prop('disabled', false);
                jQuery('#gender').prop('disabled', false);
                jQuery('#file').prop('disabled', false);
                jQuery('#Docencia').prop('checked', false);
                jQuery('#Docencia').prop('disabled', false);
                jQuery('#Investigacion').prop('checked', false);
                jQuery('#Investigacion').prop('disabled', false);
                jQuery('#Extension').prop('checked', false);
                jQuery('#Extension').prop('disabled', false);
                jQuery('#Gestion').prop('checked', false);
                jQuery('#Gestion').prop('disabled', false);
                jQuery('#diplomatura').prop('disabled', false);
                jQuery('#area').prop('disabled', false);
                $('#epned').html('');
            }

            if (cuit) {
                let url = '{{ route('getDocente', ":id") }}';
                url = url.replace(':id', cuit);
                let ajaxurl = url;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    success: function (data) {

                        if (data['docente']) {
                            if (data['docente'] == 'epned') {
                                jQuery('#Docencia').prop('checked', false);
                                jQuery('#Investigacion').prop('checked', false);
                                jQuery('#Extension').prop('checked', false);
                                jQuery('#Gestion').prop('checked', false);
                                $('#epned').html('Ya existe una persona dada de alta con ese dni que NO es docente');
                            } else {
                                $('#epned').html('Ya existe un docente con ese dni');

                                // let docente = data['docente'];
                                // $('#epned').html('');
                                // $('#edit').val(docente.id);
                                // jQuery('#email').val(docente['email']);
                                // jQuery('#personal_email').val(docente['personal_email']);
                                // jQuery('#name').val(docente['name']);
                                // jQuery('#lastname').val(docente['lastname']);
                                // jQuery('#address').val(docente['address']);
                                // jQuery('#phone').val(docente['phone']);
                                // jQuery('#birth').val(docente['birth']);
                                // jQuery('#gender').val(docente['gender']);
                                // if (docente['cv_id'] != null) {
                                //     $('#cv_show1').html('<a href="' + data['cv_path'] + '"  target=”_blank”>Curriculum cargado</a>');
                                // } else {
                                //     $('#cv_show1').html('');
                                // }
                                // jQuery('#file').val(docente['file']);
                                //
                                // jQuery('#email').prop('disabled', false);
                                // jQuery('#personal_email').prop('disabled', false);
                                // jQuery('#name').prop('disabled', false);
                                // jQuery('#lastname').prop('disabled', false);
                                // jQuery('#address').prop('disabled', false);
                                // jQuery('#phone').prop('disabled', false);
                                // jQuery('#birth').prop('disabled', false);
                                // jQuery('#gender').prop('disabled', false);
                                // jQuery('#file').prop('disabled', false);
                                // if (docente['Docencia'] == 'Si') {
                                //     jQuery('#Docencia').prop('checked', true);
                                // } else {
                                //     jQuery('#Docencia').prop('checked', false);
                                // }
                                // if (docente['Investigacion'] == 'Si') {
                                //     jQuery('#Investigacion').prop('checked', true);
                                // } else {
                                //     jQuery('#Investigacion').prop('checked', false);
                                // }
                                // if (docente['Extension'] == 'Si') {
                                //     jQuery('#Extension').prop('checked', true);
                                // } else {
                                //     jQuery('#Extension').prop('checked', false);
                                // }
                                // if (docente['Gestion'] == 'Si') {
                                //     jQuery('#Gestion').prop('checked', true);
                                // } else {
                                //     jQuery('#Gestion').prop('checked', false);
                                // }
                            }
                        } else {
                            console.log('no existe');
                            $('#edit').val('');
                            jQuery('#email').val('');
                            jQuery('#personal_email').val('');
                            jQuery('#name').val('');
                            jQuery('#lastname').val('');
                            jQuery('#address').val('');
                            jQuery('#phone').val('');
                            jQuery('#birth').val('');
                            jQuery('#gender').val('');
                            jQuery('#file').val('');
                            jQuery('#diplomatura').val('');
                            jQuery('#area').val('');
                            jQuery('#Docencia').prop('checked', false);
                            jQuery('#Docencia').prop('disabled', false);
                            jQuery('#Investigacion').prop('checked', false);
                            jQuery('#Investigacion').prop('disabled', false);
                            jQuery('#Extension').prop('checked', false);
                            jQuery('#Extension').prop('disabled', false);
                            jQuery('#Gestion').prop('checked', false);
                            jQuery('#Gestion').prop('disabled', false);

                            jQuery('#personal_email').prop('disabled', false);
                            jQuery('#email').prop('disabled', false);
                            jQuery('#name').prop('disabled', false);
                            jQuery('#lastname').prop('disabled', false);
                            jQuery('#address').prop('disabled', false);
                            jQuery('#phone').prop('disabled', false);
                            jQuery('#birth').prop('disabled', false);
                            jQuery('#gender').prop('disabled', false);
                            jQuery('#file').prop('disabled', false);
                            jQuery('#diplomatura').prop('disabled', false);
                            jQuery('#area').prop('disabled', false);
                            $('#epned').html('');
                            $('#cv_show1').html('');
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            }


        }
    </script>
    <script>
        $(document).ready(function () {
            $("#doc").change(function () {
                $('#edit').val('');
                jQuery('#email').val('');
                jQuery('#personal_email').val('');
                jQuery('#name').val('');
                jQuery('#lastname').val('');
                jQuery('#address').val('');
                jQuery('#phone').val('');
                jQuery('#birth').val('');
                jQuery('#gender').val('');
                jQuery('#file').val('');
                jQuery('#diplomatura').val('');
                jQuery('#area').val('');

                jQuery('#email').prop('disabled', true);
                jQuery('#personal_email').prop('disabled', true);
                jQuery('#name').prop('disabled', true);
                jQuery('#lastname').prop('disabled', true);
                jQuery('#address').prop('disabled', true);
                jQuery('#phone').prop('disabled', true);
                jQuery('#birth').prop('disabled', true);
                jQuery('#gender').prop('disabled', true);
                jQuery('#file').prop('disabled', true);
                jQuery('#Docencia').prop('disabled', true);
                jQuery('#Investigacion').prop('disabled', true);
                jQuery('#Extension').prop('disabled', true);
                jQuery('#Gestion').prop('disabled', true);
                jQuery('#diplomatura').prop('disabled', true);
                jQuery('#area').prop('disabled', true);


                $('#cv_show1').html('');
            });
            $("#cargoSwitch").change(function () {
                if (this.checked) {
                    $('#addCargoButton').prop('disabled', false);
                    $('#tipo').prop('disabled', false);
                    $('#fecha_alta').prop('disabled', false);
                    $('#fecha_baja').prop('disabled', false);
                    $('#act_des').prop('disabled', false);
                    $('#categoria').prop('disabled', false);
                    $('#dedicacion_horaria').prop('disabled', false);
                    $('#college_id').prop('disabled', false);
                    $('#career_id').prop('disabled', false);
                    $('#subject_id').prop('disabled', false);
                } else {
                    $('#addCargoButton').prop('disabled', true);
                    $('#tipo').prop('disabled', true);
                    $('#fecha_alta').prop('disabled', true);
                    $('#fecha_baja').prop('disabled', true);
                    $('#act_des').prop('disabled', true);
                    $('#categoria').prop('disabled', true);
                    $('#dedicacion_horaria').prop('disabled', true);
                    $('#college_id').prop('disabled', true);
                    $('#career_id').prop('disabled', true);
                    $('#subject_id').prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        $(function () {
            $('#college_id').change(function () {

                let type = "GET";
                let college = $(this).val();
                $('#career_id').empty().append('');
                $('#subject_id').empty().append('');

                let url = '{{ route('getCarreras', ":id") }}';
                url = url.replace(':id', college);
                let ajaxurl = url;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    success: function (data) {
                        let carreras = data['careers'];
                        let options = '';
                        options += '<option value="" disabled selected>Seleccione</option>';
                        $('#subject_id').append(options);
                        for (let i = 0; i < carreras.length; i++) { // Loop through the data & construct the options
                            options += '<option value="' + carreras[i].id + '">' + carreras[i].name + '</option>';
                        }
                        $('#career_id').append(options);
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });


            });
        });
        $(function () {
            $('#career_id').change(function () {

                let type = "GET";
                let career = $(this).val();
                $('#subject_id').empty().append('');

                let url = '{{ route('getMaterias', ":id") }}';
                url = url.replace(':id', career);
                let ajaxurl = url;
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    success: function (data) {
                        let materias = data['materias'];
                        let options = '';
                        options += '<option value="" disabled selected>Seleccione</option>';
                        for (let i = 0; i < materias.length; i++) { // Loop through the data & construct the options
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


    </script>
    <script>
        $('#formulario').on('submit', function (e) {
            e.preventDefault();

            // Get all of the cargoSectionContainer elements
            const cargoSectionContainers = document.querySelectorAll('#cargoSectionContainer');

// Create an empty array to store the cargo data
            const cargoData = [];

// Iterate over the cargoSectionContainer elements and add the cargo data to the array
            cargoSectionContainers.forEach(cargoSectionContainer => {
                const cargo = {
                    tipo: cargoSectionContainer.querySelector('select[name="tipo"]').value,
                    fecha_alta: cargoSectionContainer.querySelector('input[name="fecha_alta"]').value,
                    fecha_baja: cargoSectionContainer.querySelector('input[name="fecha_baja"]').value,
                    act_des: cargoSectionContainer.querySelector('input[name="act_des"]').value,
                    categoria: cargoSectionContainer.querySelector('select[name="categoria"]').value,
                    dedicacion_horaria: cargoSectionContainer.querySelector('select[name="dedicacion_horaria"]').value,
                    college_id: cargoSectionContainer.querySelector('select[name="college_id"]').value,
                    career_id: cargoSectionContainer.querySelector('select[name="career_id"]').value,
                    subject_id: cargoSectionContainer.querySelector('select[name="subject_id"]').value,
                };

                cargoData.push(cargo);
            });
            console.log(cargoData);
            //add the cargo data to a post variable to be read by the controller
            $('#cargos').val(JSON.stringify(cargoData));

            // Submit the form
            this.submit();
        });

    </script>

@endsection

