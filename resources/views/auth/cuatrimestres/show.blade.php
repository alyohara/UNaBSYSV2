@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>

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
                    <p><b>Fecha de Inicio:</b><span class="text-info"> {{ $cuatrimestre->fecha_inicio }}</span></p>
                </div>
                <div class="form-group
                form-floating mb-3" style="width: 45%;">
                    <p><b>Fecha de Fin:</b><span class="text-info"> {{ $cuatrimestre->fecha_fin }}</span></p>
                </div>
            </div>
            <div class="form-group form-floating mb-3">
                <p><b>Nombre:</b><span class="text-info"> {{ $cuatrimestre->nombre }}</span></p>
            </div>
            <div class="form-group form-floating mb-3">
                <p><b>Descripción:</b><span class="text-info"> {{ $cuatrimestre->descripcion }}</span></p>
            </div>
            <div class="form-group form-floating mb-3">
                <p><b>Estado:</b><span class="text-info"> {{ $cuatrimestre->estado }}</span></p>
            </div>
            <div class="form-group form-floating mb-3">
                <p><b>Fecha de Creación:</b><span class="text-info"> {{ $cuatrimestre->created_at }}</span></p>
            </div>




            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>




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

