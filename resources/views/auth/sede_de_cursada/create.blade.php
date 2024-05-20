@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('sede_de_cursada.store') }}">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />


                <h1 class="h3 mb-3 fw-normal">Nueva Sede </h1>




                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                    Datos de la Sede
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="nombre" value="{{old('name') }}" placeholder="Nombre" autofocus required>
                    <label for="floatingName">Nombre</label>
                    @if ($errors->has('nombre'))
                        <span class="text-danger text-left">{{ $errors->first('nombre') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="descripcion" value="{{old('descripcion') }}" placeholder="Descripcion" autofocus required>
                    <label for="floatingName">Descripcion</label>
                    @if ($errors->has('descripcion'))
                        <span class="text-danger text-left">{{ $errors->first('descripcion') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="direccion" value="{{old('direccion') }}" placeholder="Direccion" autofocus required>
                    <label for="floatingName">Direccion</label>
                    @if ($errors->has('direccion'))
                        <span class="text-danger text-left">{{ $errors->first('direccion') }}</span>
                    @endif
                </div>





                <button class="w-100 btn btn-lg btn-primary" type="submit">Registrar</button>

                @include('auth.partials.copy')
            </form>

        @endauth

        @guest
            <h1>¡Bienvenido!</h1>
            <div class="d-flex justify-content-center">
                <iframe width="923" height="519" src="https://www.youtube.com/embed/REnyeTuFR98" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
            </div>

        @endguest
    </div>
@endsection

