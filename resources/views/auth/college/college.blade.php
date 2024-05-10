@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('college.update') }}">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="college_id" id="college_id" value="{{ $college->id }}" />

                <h1 class="h3 mb-3 fw-normal">Editar Departamento: <span class="text-info">{{$college->name}}</span> </h1>




                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                    Datos del Departamento
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="name" value="{{ $college->name ?? old('name') }}" placeholder="Nombre" required="required" autofocus>
                    <label for="floatingName">Nombre</label>
                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="email" class="form-control" name="email" value="{{ $college->email ?? old('email') }}" placeholder="name@example.com" required="required" autofocus>
                    <label for="floatingEmail">Email</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="address" value="{{$college->address ??  old('address') }}" placeholder="Dirección" required="required" autofocus>
                    <label for="floatingName">Dirección</label>
                    @if ($errors->has('address'))
                        <span class="text-danger text-left">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="date" class="form-control" name="dateInit" value="{{$college->dateInit ??  old('dateInit') }}" placeholder="Fecha de Inicio" required="required" autofocus>
                    <label for="floatingName">Fecha de Inicio de Actividades</label>
                    @if ($errors->has('dateInit'))
                        <span class="text-danger text-left">{{ $errors->first('dateInit') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="data" value="{{$college->data ??  old('data') }}" placeholder="Data Extra"  autofocus>
                    <label for="floatingName">Data</label>
                    @if ($errors->has('data'))
                        <span class="text-danger text-left">{{ $errors->first('data') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="phone" value="{{$college->phone ??   old('phone') }}" placeholder="Teléfono"  autofocus>
                    <label for="floatingName">Teléfono</label>
                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="website" value="{{$college->website ??   old('website') }}" placeholder="Sitio Web" autofocus>
                    <label for="floatingName">Sitio Web</label>
                    @if ($errors->has('website'))
                        <span class="text-danger text-left">{{ $errors->first('website') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_de_sede" id="inlineRadio1" value="Presencial" @if($college->tipo_de_sede == 'Presencial') checked @endif>
                        <label class="form-check-label" for="inlineRadio1">Presencial</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tipo_de_sede" id="inlineRadio2" value="Virtual" @if($college->tipo_de_sede == 'Virtual') checked @endif>
                        <label class="form-check-label" for="inlineRadio2">Virtual</label>
                    </div>

                </div>
                <div class="form-group form-floating mb-3">
                    <div class="h6 pb-2 mb-4 text-success border-bottom border-success">
                        Coordinador/es <span class="text-small small"> (puede seleccionar más de uno)</span>
                    </div>

                    <select class="multi" name="coordinador_id[]" autofocus id="coordinador_id[]" multiple="multiple" size="5"
                            style="width: 100%">

                        @foreach($coords as $coord)
                            <option value="{{ $coord->user->id }}"
                                    @foreach($coordsdeptos as $coorddepto)
                                        @if($coord->user->id == $coorddepto->coordinador_id) selected @endif
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

