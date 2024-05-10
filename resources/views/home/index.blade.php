@extends('layouts.app-master')

@section('content')

    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth

            <h1>Dashboard</h1>
            <div class="row row-cols-2 row-cols-md-3 g-4 text-center">
                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno'))
                    <div class="col">
                        <a href="{{ route('register.users') }}" style="text-decoration: none">
                            <div class="card">
                                <img src="/imgs/wp.png" class="card-img-top" alt="Usuarios">
                                <div class="card-body">
                                    <h5 class="card-title">Usuarios</h5>

                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                    @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos') || auth()->user()->userData->hasRole('coordinador'))

                <div class="col">
                    <a href="{{ route('persona.personas') }}" style="text-decoration: none">
                        <div class="card">
                            <img src="/imgs/peopl31.png" class="card-img-top" alt="Docentes">
                            <div class="card-body">
                                <h5 class="card-title">Docentes</h5>

                            </div>
                        </div>
                    </a>
                </div>
                    @endif
                    @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('acaUno') || auth()->user()->userData->hasRole('acaDos') )

                    <div class="col">
                    <a href="{{ route('college.colleges') }}" style="text-decoration: none">
                        <div class="card">
                            <img src="/imgs/college1.png" class="card-img-top" alt="Departamentos">
                            <div class="card-body">
                                <h5 class="card-title">Departamentos</h5>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('career.careers') }}" style="text-decoration: none">
                        <div class="card">
                            <img src="/imgs/career1.png" class="card-img-top" alt="Carreras">
                            <div class="card-body">
                                <h5 class="card-title">Carreras</h5>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('subject.subjects') }}" style="text-decoration: none">
                        <div class="card">
                            <img src="/imgs/creer1.png" class="card-img-top" alt="Materias">
                            <div class="card-body">
                                <h5 class="card-title">Materias</h5>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('cargo.cargos') }}" style="text-decoration: none">
                        <div class="card">
                            <img src="/imgs/teach1.png" class="card-img-top" alt="Cargos">
                            <div class="card-body">
                                <h5 class="card-title">Cargos</h5>

                            </div>
                        </div>
                    </a>
                </div>
                    @endif

                @if(auth()->user()->userData->hasRole('admin') || auth()->user()->userData->hasRole('bedel') || auth()->user()->userData->hasRole('coordinador'))
                    <div class="col">
                        <a href="{{ route('asistencia.asistencias') }}" style="text-decoration: none">
                            <div class="card">
                                <img src="/imgs/check.png" class="card-img-top" alt="Cargos">
                                <div class="card-body">
                                    <h5 class="card-title">Asistencias</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                    @if(auth()->user()->userData->hasRole('coordinador'))
                        <div class="col">
                            <a href="{{ route('coordinador.coordinados') }}" style="text-decoration: none">
                                <div class="card">
                                    <img src="/imgs/coord.png" class="card-img-top" alt="Cargos">
                                    <div class="card-body">
                                        <h5 class="card-title">Coordinaciones</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if(auth()->user()->userData->hasRole('admin')  )
                        <div class="col">
                            <a href="{{ route('coordinador.coordinadores') }}" style="text-decoration: none">
                                <div class="card">
                                    <img src="/imgs/coord.png" class="card-img-top" alt="Cargos">
                                    <div class="card-body">
                                        <h5 class="card-title">Coordinaciones</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

            </div>
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
