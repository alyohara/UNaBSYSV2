@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('cuatrimestres.update', $cuatrimestre->id) }}">
                @method('PUT')
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="cuatrimestre_id" id="cuatrimestre_id" value="{{ $cuatrimestre->id }}"/>

                <h1 class="h3 mb-3 fw-normal">Editar Cuatrimestre: <span class="text-info">
                        {{ $cuatrimestre->name }}</span></h1>
                </span> </h1>


                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                    Datos del cuatrimestre
                </div>
                @if(isset($last_Cuatrimestre))
                    <div class="card">
                        <div class="card-header">
                            Información del último cuatrimestre declarado
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-info">{{ $last_Cuatrimestre->nombre }}</h5>

                            <p class="card-text">
                                Fecha Inicio: {{ $last_Cuatrimestre->fecha_inicio }} <br>
                                Fecha Fin: {{ $last_Cuatrimestre->fecha_fin }} <br>
                                Descripción: {{ $last_Cuatrimestre->descripcion }}
                            </p>
                        </div>
                    </div>
                @endif
                <hr>
                <div style="display: flex; justify-content: space-between;">
                    <div class="form-group
                    form-floating mb-3" style="width: 45%;">
                        <input type="date" class="form-control" name="fecha_inicio" value="{{ $cuatrimestre->fecha_inicio }}"
                               placeholder="Fecha de Inicio" required="required" autofocus>
                        <label for="floatingName">Fecha de Inicio</label>
                        @if ($errors->has('fecha_inicio'))
                            <span class="text-danger text-left">{{ $errors->first('fecha_inicio') }}</span>
                        @endif
                    </div>
                    <div class="form-group
                    form-floating mb-3" style="width: 45%;">
                        <input type="date" class="form-control" name="fecha_fin" value="{{ $cuatrimestre->fecha_fin }}"
                               placeholder="Fecha de Fin" required="required" autofocus>
                        <label for="floatingName">Fecha de Fin</label>
                        @if ($errors->has('fecha_fin'))
                            <span class="text-danger text-left">{{ $errors->first('fecha_fin') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group
                form-floating mb-3">
                    <input type="text" class="form-control" name="nombre" value="{{ $cuatrimestre->nombre }}"
                           placeholder="Nombre" required="required" autofocus>
                    <label for="floatingName">Nombre</label>
                    @if ($errors->has('nombre'))
                        <span class="text-danger text-left">{{ $errors->first('nombre') }}</span>
                    @endif
                </div>
                <div class="form-group
                form-floating mb-3">
                    <textarea class="form-control" name="descripcion" value="{{ $cuatrimestre->descripcion }}"
                              placeholder="Descripción" rows="5">{{ $cuatrimestre->descripcion }}</textarea>
                    <label for="floatingName">Descripción</label>
                    @if ($errors->has('descripcion'))
                        <span class="text-danger text-left">{{ $errors->first('descripcion') }}</span>
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

