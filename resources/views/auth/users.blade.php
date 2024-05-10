@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive">

                <table class="table" id="tabla">
                    <thead>
                    <tr>
                        <th>Nombre de Usuario</th>
                        <th>Nombre y Apellido</th>
                        <th>Email</th>
                        <th>Rol/es</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        @if(Auth::user()->userData->hasRole('admin') || Auth::user()->userData->hasRole('acaUno'))
                            <tr>
                                <td style="vertical-align: middle;">{{  $user->username}}</td>
                                <td style="vertical-align: middle;">{{  $user->userData->lastname.', '.$user->userData->name}}</td>
                                <td style="vertical-align: middle;">{{  $user->email}}</td>
                                <td style="vertical-align: middle;">
                                    <ul>@foreach($user->userData->roles as $rol)
                                            <li>{{ $rol->name }}</li>
                                        @endforeach</ul>
                                </td>
                                <td style="vertical-align: middle;">
                                    @if(Auth::user()->userData->hasRole('admin') || Auth::user()->userData->hasRole('acaUno'))
                                        <a class="btn btn-success btn-sm"
                                           href="{{ route('register.user', $user->id) }}">Editar</a>
                                        <a href="{{ route('register.destroy', $user->id) }}" class="btn btn-danger btn-sm" data-confirm-delete="true">Borrar</a>


                                    @endif
                                    <a class="btn btn-primary btn-sm"
                                       href="{{ route('register.verUsuario', $user->id) }}">Ver</a>
                                    @if(auth()->user()->userData->userType_id <= 1)

                                        <a class="btn btn-warning btn-sm"
                                           href="{{ route('register.changePass', $user->id) }}">Cambiar Contraseña</a>
                                </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    </tbody>

                </table>

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

