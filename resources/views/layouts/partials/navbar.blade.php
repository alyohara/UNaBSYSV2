<style>
    .nav-item {
        border-right: 1px solid rgba(255, 255, 255, 0.65);
    }

    .nav-item:last-child {
        border-right: none;
    }

    .logout-link {
        color: rgba(226, 233, 255, 0.69); /* almost white */
    }

    .logout-link:hover {
        color: #ffffff; /* white */
    }
</style>
<header class="text-white bg-unab">
    <div class="container" style="display: inline-block; max-width: 100% !important">
        <!-- Use any element to open the sidenav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-unab">
            <a href="{{route('login')}}" class="nav-link px-2 text-white"><img src="/imgs/logo3.png" height="50px"
                                                                               style="border-radius: 50%;"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    @auth
                        @php
                            $userRoles = auth()->user()->userData->roles->pluck('name')->toArray();
                            $currentRouteName = Route::currentRouteName();
                        @endphp
                        @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ in_array($currentRouteName, ['register.show', 'register.users', 'register.user', 'persona.show', 'persona.personas', 'persona.persona', 'coordinadores.show', 'coordinadores.coordinadores', 'coordinadores.coordinador']) ? 'active' : '' }}"
                                   id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown">
                                    <i class="fas fa-users"></i> Gestión de Usuarios
                                </a>

                                <ul class="dropdown-menu">
                                    <p class="dropdown-header">Usuarios</p>

                                    <li><a class="dropdown-item" href="{{ route('register.perform') }}">Agregar
                                            Usuario</a></li>
                                    <li><a class="dropdown-item" href="{{ route('register.users') }}">Ver Usuarios</a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <p class="dropdown-header">Docentes</p>

                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles) || in_array('acaDos', $userRoles) )
                                        <li><a class="dropdown-item" href="{{ route('persona.show') }}">Agregar
                                                Docente</a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('persona.personas') }}">Ver
                                                Docentes</a>
                                        </li>
                                    @endif
                                    <hr class="dropdown-divider">
                                    <p class="dropdown-header">Coordinadores</p>
                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles))
                                        <li><a class="dropdown-item" href="{{ route('coordinador.show2') }}">Agregar
                                                Coordinación</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('coordinador.coordinadores') }}">
                                            Ver Coordinadores</a></li>
                                </ul>
                            </li>
                        @endif






                        @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles) || in_array('acaDos', $userRoles) )
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ in_array($currentRouteName, ['messenger.show', 'messenger.index', 'messenger.create']) ? 'active' : '' }}"
                                   id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                                >
                                    <i class="fas fa-envelope"></i> Mensajes @include('auth.messenger.unread-count')
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="/messages">Ver Mensajes</a></li>
                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles) )
                                        <li><a class="dropdown-item" href="/messages/create">Crear un Nuevo Mensaje</a>
                                        </li>
                                    @endif

                                </ul>
                            </li>



                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ in_array($currentRouteName, ['college.show', 'college.colleges', 'college.college', 'career.show', 'career.careers', 'career.career', 'subject.show', 'subject.subjects', 'subject.career', 'sede_de_cursada.show', 'sede_de_cursada.index', 'sede_de_cursada.create']) ? 'active' : '' }}"
                                   id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                                ><i class="fas fa-university"></i> Gestión Universitaria
                                </a>
                                <ul class="dropdown-menu">

                                    <p class="dropdown-header">Departamentos</p>
                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles))
                                        <li><a class="dropdown-item" href="{{ route('college.show') }}">Agregar
                                                Departamento</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('college.colleges') }}">Ver
                                            Departamentos</a></li>

                                    <hr class="dropdown-divider">
                                    <p class="dropdown-header">Carreras</p>
                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles))
                                        <li><a class="dropdown-item" href="{{ route('career.show') }}">Agregar
                                                Carrera</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('career.careers') }}">Ver
                                            Carreras</a>
                                    </li>

                                    <hr class="dropdown-divider">
                                    <p class="dropdown-header">Materias</p>
                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles))
                                        <li><a class="dropdown-item" href="{{ route('subject.show') }}">Agregar
                                                Materia</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('subject.subjects') }}">Ver
                                            Materias</a>
                                    </li>

                                    <hr class="dropdown-divider">
                                    <p class="dropdown-header">Sedes de Cursada</p>
                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles))
                                        <li><a class="dropdown-item" href="{{ route('sede_de_cursada.create') }}">Agregar
                                                Sede de Cursada</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('sede_de_cursada.index') }}">Ver
                                            Sedes</a>
                                    </li>

                                    <hr class="dropdown-divider">
                                    <p class="dropdown-header">Cuatrimestre</p>
                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles))
                                        <li><a class="dropdown-item" href="{{ route('cuatrimestres.create') }}">Agregar
                                                Cuatrimestre</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('cuatrimestres.index') }}">Ver
                                            Cuatrimestres</a>
                                    </li>


                                </ul>
                            </li>




                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ in_array($currentRouteName, ['cargo.show', 'cargo.cargos', 'cargo.cargo']) ? 'active' : '' }}"
                                   id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                                >
                                    <i class="fas fa-briefcase"></i> Cargos
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ route('cargo.show') }}">Agregar Cargo</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('cargo.cargos') }}">Ver Cargos</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('descargaDatos') }}">Exportar
                                            Datos</a>
                                    </li>
                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles))
                                        <li><a class="dropdown-item" href="{{ route('cargo.cargosSinValidar') }}">Ver
                                                Cargos Sin Validar</a></li>
                                        <li><a class="dropdown-item" href="{{ route('cargo.cargosRenovados') }}">Ver
                                                Cargos Renovados</a></li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles) || in_array('coordinador', $userRoles) || in_array('bedel', $userRoles))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ in_array($currentRouteName, ['asistencia.show', 'asistencia.asistencias', 'asistencia.asistencia']) ? 'active' : '' }}"
                                   id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                                >
                                    <i class="fas fa-clipboard-list"></i> Asistencias
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @if(in_array('admin', $userRoles) || in_array('acaUno', $userRoles) || in_array('bedel', $userRoles))
                                        <li><a class="dropdown-item" href="{{ route('asistencia.show') }}">Tomar
                                                Asistencias</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ route('asistencia.asistencias') }}">Ver
                                            Asistencia</a></li>
                                </ul>
                            </li>
                        @endif

                        @if(in_array('coordinador', $userRoles))
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ in_array($currentRouteName, ['persona.show', 'persona.personas', 'persona.persona']) ? 'active' : '' }}"
                                   id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                                >
                                    <i class="fas fa-user"></i> Docentes
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ route('persona.show') }}">Agregar
                                            Docente</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('persona.personas') }}">Ver
                                            Docentes</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ in_array($currentRouteName, ['coordinador.coordinados', 'coordinador.profCoordinados']) ? 'active' : '' }}"
                                   id="dropdownMenuButton" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                                >
                                    <i class="fas fa-users"></i>
                                    Coordinaciones
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ route('coordinador.coordinados') }}">Ver
                                            Coordinaciones</a></li>
                                    <li><a class="dropdown-item"
                                           href="{{ route('coordinador.profCoordinados') }}">Ver
                                            Coordinados</a></li>
                                    <li><a class="dropdown-item" href="{{ route('cargo.cargosCoordinados') }}">Ver
                                            Cargos</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="dropdownMenuButton"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false" data-bs-toggle="dropdown"
                                >
                                    <i class="fas fa-calendar-alt"></i>
                                    Alertas <span
                                        class="badge text-bg-secondary {{ in_array($currentRouteName, ['alerta.alertas']) ? 'active' : '' }}">{{ \App\Http\Controllers\AjaxController::getAlerts(Auth::user()->id) }}</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{ route('alerta.alertas') }}">Ver
                                            Alertas</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('register.perfil') }}"
                               class="nav-link  {{ ($currentRouteName == 'register.perfil') ? 'active' : '' }} me-2"><i
                                    class="fas fa-user"></i> Mi
                                Perfil</a>
                        </li>

                    @endauth

                </ul>


            </div>
            @auth
                <div class="badge bg-secondary " style="padding: 10px">
                    @if ($cuatrimestre_actual)
                        <div>Cuatrimestre:
                            {{ $cuatrimestre_actual->nombre }}</div>
                        <div>
                            <small style="font-size: xx-small">{{ $cuatrimestre_actual->fecha_inicio }}
                                al {{ $cuatrimestre_actual->fecha_fin }}</small></div>

                    @else
                        <span class="badge alert-danger">No hay cuatrimestre activo</span>
                    @endif


                </div>
                <div class="text-end">
                    <a href="{{ route('logout.perform') }}" class="nav-link  me-2 logout-link"><i
                            class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            @endauth
            @guest
                <div class="text-end">
                    <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2 ">Login</a>

                </div>
            @endguest
        </nav>


    </div>
</header>

{{--<div id="mySidenav" class="sidenav">--}}
{{--    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>--}}
{{--    <a href="#">About</a>--}}

{{--</div>--}}


{{--<script>--}}
{{--/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */--}}
{{--function openNav() {--}}
{{--document.getElementById("mySidenav").style.width = "250px";--}}
{{--document.getElementById("main").style.marginLeft = "250px";--}}
{{--}--}}

{{--/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */--}}
{{--function closeNav() {--}}
{{--document.getElementById("mySidenav").style.width = "0";--}}
{{--document.getElementById("main").style.marginLeft = "0";--}}
{{--}--}}
{{--</script>--}}
