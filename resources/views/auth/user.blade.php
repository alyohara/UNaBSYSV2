@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('register.update') }}" enctype="multipart/form-data">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <h1 class="h3 mb-3 fw-normal">Editar Usuario</h1>
                <input type="hidden" name="userid" id="userid" value="{{$user->id}}">
                <input type="hidden" name="personaid" id="personaid" value="{{$user->persona_id}}">
                <div class="form-group form-floating mb-3">
                    <input type="email" disabled class="form-control" name="email" placeholder="name@example.com"
                           autofocus value="{{$user->email}}">
                    <label for="floatingEmail">Email address</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="text" disabled class="form-control" name="username" placeholder="Username" autofocus
                           value="{{$user->username}}">
                    <label for="floatingName">Username</label>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                {{--                <div class="form-group form-floating mb-3">--}}
                {{--                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">--}}
                {{--                    <label for="floatingPassword">Password</label>--}}
                {{--                    @if ($errors->has('password'))--}}
                {{--                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>--}}
                {{--                    @endif--}}
                {{--                </div>--}}

                {{--                <div class="form-group form-floating mb-3">--}}
                {{--                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">--}}
                {{--                    <label for="floatingConfirmPassword">Confirm Password</label>--}}
                {{--                    @if ($errors->has('password_confirmation'))--}}
                {{--                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>--}}
                {{--                    @endif--}}
                {{--                </div>--}}


                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                    Datos Personales
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text"  class="form-control" name="doc" autofocus
                           value="{{$user->userData->doc}}">
                    <label for="floatingName">Documento</label>
                </div>

                <div class="form-group form-floating mb-3">
                    <div class="h6  pb-2 mb-4 text-success  form-check-inline">
                        Rol:
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="admin" value="admin"
                               name="admin" @if($user->userData->hasRole('admin')) checked @endif)>
                        <label class="form-check-label" for="admin">Administrador</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="acaUno" value="acaUno"
                               name="acaUno" @if($user->userData->hasRole('acaUno')) checked @endif)>
                        <label class="form-check-label" for="acaUno">Académico Nivel 1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="acaDos" value="acaDos"
                               name="acaDos" @if($user->userData->hasRole('acaDos')) checked @endif)>
                        <label class="form-check-label" for="acaDos">Académico Nivel 2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="bedel" value="bedel"
                               name="bedel" @if($user->userData->hasRole('bedel')) checked @endif)>
                        <label class="form-check-label" for="bedel">Bedel</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="coordinador" value="coordinador"
                               name="coordinador" @if($user->userData->hasRole('coordinador')) checked @endif)>
                        <label class="form-check-label" for="coordinador">Coordinador</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="profesor" value="profesor"
                               name="profesor" @if($user->userData->hasRole('profesor')) checked @endif)>
                        <label class="form-check-label" for="profesor">Docente</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="basic" value="basic"
                               name="basic" @if($user->userData->hasRole('basic')) checked @endif)>
                        <label class="form-check-label" for="basic">Básico</label>
                    </div>

                </div>
                <div class="form-group form-floating mb-3">
                    <input type="email" class="form-control" name="profesional_email" id="profesional_email"
                           value="{{ $user->userData->email ?? old('profesional_email') }}"
                           placeholder="name@example.com" required="required" autofocus>
                    <label for="floatingEmail">Email Profesional</label>
                    @if ($errors->has('profesional_email'))
                        <span class="text-danger text-left">{{ $errors->first('profesional_email') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="personal_email" class="form-control" name="personal_email" id="personal_email"
                           value="{{ $user->userData->personal_email ?? old('personal_email') }}"
                           placeholder="name@example.com"  autofocus>
                    <label for="floatingpersonal_Email">Email Personal</label>
                    @if ($errors->has('personal_email'))
                        <span class="text-danger text-left">{{ $errors->first('personal_email') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="name" value="{{ $user->userData->name }}"
                           placeholder="Nombre" required="required" autofocus>
                    <label for="floatingName">Nombre</label>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="lastname" value="{{ $user->userData->lastname }}"
                           placeholder="Apellido" required="required" autofocus>
                    <label for="floatingName">Apellido</label>
                    @if ($errors->has('lastname'))
                        <span class="text-danger text-left">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="address" value="{{ $user->userData->address }}"
                           placeholder="Dirección" required="required" autofocus>
                    <label for="floatingName">Dirección</label>
                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="phone" value="{{ $user->userData->phone}}"
                           placeholder="Teléfono" required="required" autofocus>
                    <label for="floatingName">Teléfono</label>
                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="date" class="form-control" name="birth" value="{{ $user->userData->birth }}"
                           placeholder="Fecha de Nacimiento" required="required" autofocus>
                    <label for="floatingName">Fecha de Nacimiento</label>
                    @if ($errors->has('birth'))
                        <span class="text-danger text-left">{{ $errors->first('birth') }}</span>
                    @endif
                </div>


                <div class="form-group form-floating mb-3">
                    <select class="form-control" name="gender" value="{{ old('gender') }}" required="required"
                            autofocus>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Femenino" @if('Femenino' == $user->userData->gender) selected @endif>Femenino
                        </option>
                        <option value="Masculino" @if('Masculino' == $user->userData->gender) selected @endif>
                            Masculino
                        </option>
                        <option value="No Binarie" @if('No Binarie' == $user->userData->gender) selected @endif>No
                            Binarie
                        </option>
                        <option value="Otro" @if('Otro' == $user->userData->gender) selected @endif>Otro</option>
                        <option value="No Contesta" @if('No Contesta' == $user->userData->gender) selected @endif>No
                            Contesta
                        </option>
                    </select>
                    <label for="floatingName">Género</label>
                    @if ($errors->has('gender'))
                        <span class="text-danger text-left">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
                <label for="floatingName" class="form-label">CV:</label>
                @if ($user->userData->cv_id)
                    <a href="{{asset($user->userData->curriculum->file_path)}}" target=”_blank”>Curriculum cargado</a>
                @else
                    No tiene Curriculum cargado
                @endif
                <div class="form-group mb-3">
                    <input type="file" class="form-control" name="file" value="" autofocus>

                    @if ($errors->has('file'))
                        <span class="text-danger text-left">{{ $errors->first('file') }}</span>
                    @endif

                </div>

                <div id="docen" style="display: @if($user->userData->hasRole('profesor')) block @else none @endif">
                    <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                        Datos extra del Docente
                    </div>


                    <div class="form-group form-floating mb-3">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Docencia" value="" name="Docencia" @if($user->userData->Docencia == 'Si') checked @endif>
                            <label class="form-check-label" for="Docencia">Docencia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Investigacion" value=""
                                   name="Investigacion" @if($user->userData->Investigacion == 'Si') checked @endif>
                            <label class="form-check-label" for="Investigacion">Investigacion</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Extension" value="" name="Extension" @if($user->userData->Extension == 'Si') checked @endif>
                            <label class="form-check-label" for="Extension">Extension</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="Gestion" value="" name="Gestion" @if($user->userData->Gestion == 'Si') checked @endif>
                            <label class="form-check-label" for="Gestion">Gestion</label>
                        </div>

                    </div>
                    <div class="row">

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="cargoSwitch"
                                   name="cargoSwitch">
                            <label class="form-check-label" for="cargoSwitch">¿Agregar cargo?</label>
                        </div>
                    </div>

                    <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                        Datos del Cargo
                    </div>
                    <div class="row">

                        <div class="form-group form-floating mb-3 col">
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
                        <div class="form-group form-floating mb-3 col">
                            <input type="date" class="form-control" name="fecha_alta" id="fecha_alta"
                                   value="{{ old('fecha_alta') }}" required disabled>
                            <label for="fecha_alta">Fecha de Alta</label>
                            @if ($errors->has('fecha_alta'))
                                <span class="text-danger text-left">{{ $errors->first('fecha_alta') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-floating mb-3 col">
                            <input type="date" class="form-control" name="fecha_baja" id="fecha_baja"
                                   value="{{ old('fecha_baja') }}" disabled>
                            <label for="fecha_baja">Fecha de Baja</label>
                            @if ($errors->has('fecha_baja'))
                                <span class="text-danger text-left">{{ $errors->first('fecha_baja') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-floating mb-3 col">
                            <input type="text" class="form-control" name="act_des" id="act_des"
                                   value="{{ old('act_des') }}" required disabled>
                            <label for="act_des">Acto Administrativo / Designación</label>
                            @if ($errors->has('act_des'))
                                <span class="text-danger text-left">{{ $errors->first('act_des') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-floating mb-3 col">
                            <select class="form-control" name="categoria" id="categoria" autofocus required
                                    disabled="disabled">
                                <option value="" disabled selected>Seleccione</option>
                                @if (Auth::user()->userData->userType_id < 3)
                                    <option value="Profesor Titular (TIT)">Profesor Titular (TIT)</option>
                                    <option value="Profesor Asociado (ASO)">Profesor Asociado (ASO)</option>
                                    <option value="Profesor Adjunto (ADJ)">Profesor Adjunto (ADJ)</option>
                                    <option value="Auxiliar Jefe de Trabajos Prácticos (JTP)">Auxiliar Jefe de Trabajos
                                        Prácticos (JTP)
                                    </option>
                                    <option value="Auxiliar Ayudante (AuxA)">Auxiliar Ayudante (AuxA)</option>
                                    <option value="Auxiliar Ayudante Alumno (AuxAA)">Auxiliar Ayudante Alumno (AuxAA)
                                    </option>

                                @endif

                            </select>
                            <label for="floatingName">Categoria</label>
                            @if ($errors->has('status'))
                                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                        <div class="form-group form-floating mb-3 col">
                            <select class="form-control" name="dedicacion_horaria" id="dedicacion_horaria" autofocus
                                    required disabled="disabled">
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
                                    @foreach($careers as $carrera)
                                        <option
                                            value="{{ $carrera->id }}">{{$carrera->CodigoSIU .' - '.$carrera->DenominacionCarrera}}</option>
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
                                    @foreach($subjects as $materia)
                                        <option
                                            value="{{ $materia->id }}">{{$materia->code .' - '.$materia->name}}</option>
                                    @endforeach

                                </select>

                                <label for="floatingName">Materia</label>
                                @if ($errors->has('subject_id'))
                                    <span class="text-danger text-left">{{ $errors->first('subject_id') }}</span>
                                @endif
                            </div>
                            <input type="hidden" name="edit" id="edit" value=""/>
                        </div>
                    </div>
                </div>




                <button class="w-100 btn btn-lg btn-primary" type="submit">Guardar Edición</button>

                @include('auth.partials.copy')
            </form>

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

                        jQuery('#email').prop('disabled', true);
                        jQuery('#personal_email').prop('disabled', true);
                        jQuery('#name').prop('disabled', true);
                        jQuery('#lastname').prop('disabled', true);
                        jQuery('#address').prop('disabled', true);
                        jQuery('#phone').prop('disabled', true);
                        jQuery('#birth').prop('disabled', true);
                        jQuery('#gender').prop('disabled', true);
                        jQuery('#file').prop('disabled', true);
                        jQuery('#admin').prop('disabled', true);
                        jQuery('#acaUno').prop('disabled', true);
                        jQuery('#acaDos').prop('disabled', true);
                        jQuery('#bedel').prop('disabled', true);
                        jQuery('#coordinador').prop('disabled', true);
                        jQuery('#profesor').prop('disabled', true);
                        jQuery('#basic').prop('disabled', true);
                        jQuery('#admin').prop('checked', false);
                        jQuery('#acaUno').prop('checked', false);
                        jQuery('#acaDos').prop('checked', false);
                        jQuery('#bedel').prop('checked', false);
                        jQuery('#coordinador').prop('checked', false);
                        jQuery('#profesor').prop('checked', false);
                        jQuery('#basic').prop('checked', false);

                        $('#cv_show1').html('');
                    });
                    $("#cargoSwitch").change(function () {
                        if (this.checked) {
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
                    $("#profesor").change(function () {
                        if ($('#profesor')[0].checked) {
                            $('#docen').delay(0).fadeIn('fast');
                            $('#cargoSwitch').prop('disabled', false);
                            $('#cargoSwitch').prop('checked', false);
                        } else {
                            $('#docen').delay(0).fadeOut('fast');
                            $('#cargoSwitch').prop('disabled', true);
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

