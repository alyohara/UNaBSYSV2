@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('subject.perform') }}">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>


                <h1 class="h3 mb-3 fw-normal">Alta Materia</span> </h1>


                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                    Datos de la Materia
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="code" value="{{ $subject->code ?? old('code') }}"
                           placeholder="Código" required="required" autofocus>
                    <label for="floatingName">Código de la Materia</label>
                    @if ($errors->has('code'))
                        <span class="text-danger text-left">{{ $errors->first('code') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="name" value="{{ $subject->name ?? old('name') }}"
                           placeholder="Nombre" required="required" autofocus>
                    <label for="floatingName">Nombre</label>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="abrev_name" value="{{ $subject->abrev_name ?? old('abrev_name') }}"
                           placeholder="Nombre Abreviado" required="required" autofocus>
                    <label for="floatingName">Nombre Abreviado</label>
                    @if ($errors->has('abrev_name'))
                        <span class="text-danger text-left">{{ $errors->first('abrev_name') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <div class="form-check form-check-inline">

                        <label class="form-check-label" for="">
                            Tipo de Materia:
                        </label>
                    </div>


                    <div class="form-check form-check-inline" onclick="disableSemester()">
                        <input class="form-check-input" type="radio" name="type" id="Anual" value="Anual">
                        <label class="form-check-label" for="Anual">
                            Anual
                        </label>
                    </div>

                    <div class="form-check form-check-inline" onclick="enableSemester()">
                        <input class="form-check-input" type="radio" name="type" id="Semestral" checked
                               value="Semestral">
                        <label class="form-check-label" for="Semestral">
                            Semestral
                        </label>
                    </div>
                    <div class="form-check form-check-inline" onclick="enableSemester()">
                        <input class="form-check-input" type="radio" name="type" id="Mensual" checked
                               value="Mensual">
                        <label class="form-check-label" for="Mensual">
                            Mensual
                        </label>
                    </div>
                    @if ($errors->has('type'))
                        <span class="text-danger text-left">{{ $errors->first('type') }}</span>
                    @endif

                </div>
                <div class="form-group form-floating mb-3">
                    <select class="form-control" name="year" value="{{ old('year') }}" required="required" autofocus>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Primero">1° Año</option>
                        <option value="Segundo">2° Año</option>
                        <option value="Tercero">3° Año</option>
                        <option value="Cuarto">4° Año</option>
                        <option value="Quinto">5° Año</option>
                        <option value="Sexto">6° Año</option>
                    </select>
                    <label for="floatingName">Año en que se dicta</label>
                    @if ($errors->has('year'))
                        <span class="text-danger text-left">{{ $errors->first('year') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <select class="form-control" name="semester" id="semester" value="{{ old('semester') }}"
                            required="required"
                            autofocus>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Primero">Primer Semestre</option>
                        <option value="Segundo">Segundo Semestre</option>
                    </select>
                    <label for="floatingName">Semestre en que se dicta</label>
                    @if ($errors->has('semester'))
                        <span class="text-danger text-left">{{ $errors->first('semester') }}</span>
                    @endif
                </div>

{{--                <div class="form-group form-floating mb-3">--}}
{{--                    <select class="form-control" name="college_id" autofocus id="college_id">--}}
{{--                        <option value="" disabled selected>Seleccione</option>--}}
{{--                        @foreach($colleges as $college)--}}
{{--                            <option value="{{ $college->id }}">{{$college->name}}</option>--}}
{{--                        @endforeach--}}

{{--                    </select>--}}
{{--                    <label for="floatingName">Departamento</label>--}}
{{--                    @if ($errors->has('college_id'))--}}
{{--                        <span class="text-danger text-left">{{ $errors->first('college_id') }}</span>--}}
{{--                    @endif--}}
{{--                </div>--}}

                <div class="form-group form-floating mb-3">
                    <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                        Carrera/s <span class="small"> (puede seleccionar más de una)</span>
                    </div>

                    <select class="multi" name="career_id[]" autofocus id="career_id[]" multiple size="5" style="width: 100%">

                        @foreach($careers as $career)
                            <option value="{{ $career->id }}">{{$career->DenominacionCarrera}}</option>
                        @endforeach

                    </select>

                    @if ($errors->has('career_id'))
                        <span class="text-danger text-left">{{ $errors->first('career_id') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                        Coordinador/es <span class="text-small small"> (puede seleccionar más de uno)</span>
                    </div>

                    <select class="multi" name="coordinador_id[]" autofocus id="coordinador_id[]" multiple="multiple" size="5"
                            style="width: 100%">

                        @foreach($coords as $coord)
                            <option value="{{ $coord->user->id }}"
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
            <script>


                function enableSemester() {
                    $("#semester").prop('disabled', false);
                    $("#semester").prop('required', true);
                }

                function disableSemester() {
                    $("#semester").prop('disabled', true);
                    $("#semester").prop('required', false);
                }

                $(function () {
                    $('#college_id').change(function () {
                        //console.log($(this).val()); // $(this).val() -> returns an  array of all of the selected values
                        //alert($(this).val());

                        let type = "GET";
                        let college = $(this).val();
                        $('#career_id').empty().append('');

                        let url = '{{ route('getCarreras', ":id") }}';
                        url = url.replace(':id', college);
                        let ajaxurl = url;
                        $.ajax({
                            type: type,
                            url: ajaxurl,
                            success: function (data) {
                                let carreras = data['careers'];
                                let options = '';
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

