@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
               onclick="window.history.back();">Volver</a>
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

            <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                Datos de la Sede
            </div>
            <div class="form-group form-floating mb-3">
                <p><b>{{$sede->nombre}}:</b></p>
                <label for="floatingName">Nombre</label>
            </div>
            <div class="form-group form-floating mb-3">
                <p><b>{{$sede->descripcion}}:</b></p>
                <label for="floatingName">Descripción</label>
            </div>
            <div class="form-group form-floating mb-3">
                <p><b>{{$sede->direccion}}:</b></p>
                <label for="floatingName">Dirección</label>
            </div>



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

