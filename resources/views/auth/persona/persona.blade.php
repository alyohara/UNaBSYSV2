@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('persona.update') }}" enctype="multipart/form-data">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="persona_id" id="persona_id" value="{{ $persona->id }}"/>

                <h1 class="h3 mb-3 fw-normal">Editar Docente: <span
                        class="text-info">{{$persona->name.', '.$persona->lastname}}</span></h1>


                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                    Datos del Docente
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="email" class="form-control" name="email" value="{{ $persona->email ?? old('email') }}"
                           placeholder="name@example.com" required="required" autofocus>
                    <label for="floatingEmail">Email address</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input  type="personal_email" class="form-control" name="personal_email"
                           id="personal_email"
                           value="{{$persona->personal_email ?? old('personal_email') }}"
                           placeholder="name@example.com" autofocus>
                    <label for="floatingpersonal_Email">Email personal</label>
                    @if ($errors->has('personal_email'))
                        <span class="text-danger text-left">{{ $errors->first('personal_email') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="name" value="{{ $persona->name ?? old('name') }}"
                           placeholder="Nombre" required="required" autofocus>
                    <label for="floatingName">Nombre</label>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="lastname"
                           value="{{$persona->lastname ??  old('lastname') }}" placeholder="Apellido"
                           required="required" autofocus>
                    <label for="floatingName">Apellido</label>
                    @if ($errors->has('lastname'))
                        <span class="text-danger text-left">{{ $errors->first('lastname') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="address"
                           value="{{$persona->address ??  old('address') }}" placeholder="Dirección" required="required"
                           autofocus>
                    <label for="floatingName">Dirección</label>
                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="phone" value="{{$persona->phone ??  old('phone') }}"
                           placeholder="Teléfono" required="required" autofocus>
                    <label for="floatingName">Teléfono</label>
                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="date" class="form-control" name="birth" value="{{$persona->birth ??  old('birth') }}"
                           placeholder="Fecha de Nacimiento" required="required" autofocus>
                    <label for="floatingName">Fecha de Nacimiento</label>
                    @if ($errors->has('birth'))
                        <span class="text-danger text-left">{{ $errors->first('birth') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="number" class="form-control" name="doc" value="{{ $persona->doc ?? old('doc') }}"
                           placeholder="Documento" required="required" autofocus>
                    <label for="floatingName">Documento</label>
                    @if ($errors->has('doc'))
                        <span class="text-danger text-left">{{ $errors->first('doc') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <select class="form-control" name="gender" value="{{ old('gender') }}" required="required"
                            autofocus>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Femenino" @if($persona->gender == 'Femenino') selected @endif>Femenino</option>
                        <option value="Masculino" @if($persona->gender == 'Masculino') selected @endif>Masculino
                        </option>
                        <option value="No Binarie" @if($persona->gender == 'No Binarie') selected @endif>No Binarie
                        </option>
                        <option value="Otro" @if($persona->gender == 'Otro') selected @endif>Otro</option>
                        <option value="No Contesta" @if($persona->gender == 'No Contesta') selected @endif>No Contesta
                        </option>
                    </select>
                    <label for="floatingName">Género</label>
                    @if ($errors->has('gender'))
                        <span class="text-danger text-left">{{ $errors->first('gender') }}</span>
                    @endif
                </div>
                <label for="floatingName" class="form-label">CV:</label>
                @if ($persona->cv_id)

                    <a href="{{asset($persona->curriculum->file_path)}}" target=”_blank”>Curriculum cargado</a>
                @else
                    No tiene Curriculum cargado
                @endif
                <div class="form-group mb-3">
                    <input type="file" class="form-control" name="file" value="" autofocus>

                    @if ($errors->has('file'))
                        <span class="text-danger text-left">{{ $errors->first('file') }}</span>
                    @endif

                </div>

                <input type="hidden" name="userType_id" id="userType_id" value="4">
                <div class="form-group form-floating mb-3">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Docencia" value="" name="Docencia"
                               @if ($persona->Docencia == 'Si') checked @endif>
                        <label class="form-check-label" for="Docencia">Docencia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Investigacion" value="" name="Investigacion"
                               @if ($persona->Investigacion == 'Si') checked @endif>
                        <label class="form-check-label" for="Investigacion">Investigacion</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Extension" value="" name="Extension"
                               @if ($persona->Extension == 'Si') checked @endif >
                        <label class="form-check-label" for="Extension">Extension</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="Gestion" value="" name="Gestion"
                               @if ($persona->Gestion == 'Si') checked @endif>
                        <label class="form-check-label" for="Gestion">Gestion</label>
                    </div>

                </div>

                <div class="form-group form-floating mb-3">
                    <select class="form-control" name="diplomatura" id="diplomatura" value="{{ old('diplomatura') }}"
                            required="required" autofocus>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="Especialización" @if($persona->diplomatura == 'Especialización') selected @endif >
                            Especialización </option>
                        <option value="PostGrado" @if($persona->diplomatura == 'PostGrado') selected @endif >PostGrado </option>
                        <option value="Máster" @if($persona->diplomatura == 'Máster') selected @endif >Máster</option>
                        <option value="Doctorado" @if($persona->diplomatura == 'Doctorado') selected @endif >Doctorado</option>
                    </select>
                    <label for="floatingName">Diplomatura</label>
                    @if ($errors->has('diplomatura'))
                        <span class="text-danger text-left">{{ $errors->first('diplomatura') }}</span>
                    @endif
                </div>


                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="area" id="area"
                           value="{{ $persona->area ?? old('area') }}"
                           placeholder="Area" >
                    <label for="area">Area</label>
                    @if ($errors->has('area'))
                        <span class="text-danger text-left">{{ $errors->first('area') }}</span>
                    @endif
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Guardar Cambios</button>

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
@endsection

