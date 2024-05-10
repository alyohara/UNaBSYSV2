@extends('layouts.app-master')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <form method="post" action="{{ route('register.updateProfile') }}">
                <a style="margin-bottom: 5px; float: right" href="#" class="  btn btn-secondary "
                   onclick="window.history.back();">Volver</a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <h1 class="h3 mb-3 fw-normal">Mi Perfil <span class="text-info">{{auth()->user()->username}}</span></h1>

                <input type="hidden" name="userid" id="userid" value="{{$user->id}}">
                <div class="form-group form-floating mb-3">
                    <input type="email" required class="form-control" name="email" placeholder="name@example.com"
                           autofocus value="{{$user->email}}">
                    <label for="floatingEmail">Email address</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>


                <div class="form-group form-floating mb-3">
                    <input type="text" required class="form-control" name="username" placeholder="Username" autofocus
                           value="{{$user->username}}">
                    <label for="floatingName">Username</label>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <div class="form-check form-switch ">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                               name="changePass" onclick="enable()">
                        <label class="form-check-label" for="flexSwitchCheckDefault">¿Cambiar contraseña?</label>
                    </div>
                </div>


                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                           placeholder="Password" disabled="disabled" id="password">
                    <label for="floatingPassword">Password</label>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirmation"
                           value="{{ old('password_confirmation') }}" placeholder="Confirm Password"
                           disabled="disabled" id="password_confirmation">
                    <label for="floatingConfirmPassword">Confirm Password</label>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </div>
                <script>
                    function enable() {

                        if ($("#password").prop('disabled')) {
                            $("#password").prop('disabled', false);
                            $("#password_confirmation").prop('disabled', false);
                            $("#password").prop('required', true);
                            $("#password_confirmation").prop('required', true);
                        } else {
                            $("#password").prop('disabled', true);
                            $("#password_confirmation").prop('disabled', true);
                            $("#password").prop('required', false);
                            $("#password_confirmation").prop('required', false);
                        }

                    }
                </script>


                <div class="h5 pb-2 mb-4 text-success border-bottom border-success">
                    Datos Personales
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
                    <input type="personal_email"  class="form-control" name="personal_email" placeholder="name@example.com"
                           autofocus value="{{$user->userData->personal_email}}">
                    <label for="floatingPersonal_Email">Email personal</label>
                    @if ($errors->has('personal_email'))
                        <span class="text-danger text-left">{{ $errors->first('personal_email') }}</span>
                    @endif
                </div>
                <div class="form-group form-floating mb-3">
                    <input type="text" class="form-control" name="doc" value="{{ $user->userData->doc }}"
                           placeholder="Documento" required="required" autofocus>
                    <label for="floatingName">Documento</label>
                    @if ($errors->has('doc'))
                        <span class="text-danger text-left">{{ $errors->first('doc') }}</span>
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




                <button class="w-100 btn btn-lg btn-primary" type="submit">Guardar Edición</button>

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

