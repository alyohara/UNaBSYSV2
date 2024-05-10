@extends('layouts.app-master-export')



@section('content')
    @include('layouts.partials.messages')
    <div class="bg-light p-5 rounded">
        @auth
            <div class="table-responsive  nowrap" style="width:100%">
                <div class="card" style="position: relative; float: right; margin-bottom: 10px;">
                    <div class="card-body">
{{--                        <div id="">--}}
{{--                            <label><input type="checkbox" value="docencia">Docencia</label>--}}
{{--                            <label><input type="checkbox" value="extension">Extensión</label>--}}
{{--                            <label><input type="checkbox" value="gestion">Gestión</label>--}}
{{--                            <label><input type="checkbox" value="investigacion">Investigación</label>--}}
{{--                        </div>--}}
                        <h5>Filtrar por Función:</h5>
                        <div class=" btn-group" id="columnFilter" role="group" aria-label="Basic checkbox toggle button group">

                            <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" value="docencia">
                            <label class="btn btn-outline-primary" for="btncheck1">Docencia</label>

                            <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" value="extension">
                            <label class="btn btn-outline-primary" for="btncheck2">Extensión</label>

                            <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" value="gestion">
                            <label class="btn btn-outline-primary" for="btncheck3">Gestión</label>

                            <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off"  value="investigacion">
                            <label class="btn btn-outline-primary" for="btncheck4">Investigación</label>
                        </div>
                    </div>
                </div>



                <table class="table" id="tabla">

                    <thead style="background-color: #f6f7f8 !important; margin-top: 5px">
                    <tr>
                        <th>Profesor <small style="font-size: 10px">Apellido</small></th>
                        <th><small style="font-size: 10px">Nombre</small></th>
                        <th>Materia</th>
                        <th>DNI</th>
                        <th>Condición</th>
                        <th>Categoria</th>
                        <th>Dedicación Horaria</th>
                        <th>Fecha Alta</th>
                        <th>Fecha Baja</th>
                        <th>Acto Administrativo / Designación</th>
                        <th>Función</th>
                        <th>Coordinador</th>
                        <th>Estado</th>
                    </tr>
                    <tr id="filterRow">
                        <th>Profesor <small style="font-size: 10px">Apellido</small></th>
                        <th><small style="font-size: 10px">Nombre</small></th>
                        <th>Materia</th>
                        <th>DNI</th>
                        <th>Condición</th>
                        <th>Categoria</th>
                        <th>Dedicación Horaria</th>
                        <th>Fecha Alta</th>
                        <th>Fecha Baja</th>
                        <th>Acto Administrativo / Designación</th>
                        <th>
                        </th>
                        <th>Coordinador</th>
                        <th>Estado</th>
                    </tr>

                    </thead>

                    <tfoot>
                    <tr id="filterRowFooter">
                        <th>Profesor <small style="font-size: 10px">Apellido</small></th>
                        <th><small style="font-size: 10px">Nombre</small></th>
                        <th>Materia</th>
                        <th>DNI</th>
                        <th>Condición</th>
                        <th>Categoria</th>
                        <th>Dedicación Horaria</th>
                        <th>Fecha Alta</th>
                        <th>Fecha Baja</th>
                        <th>Acto Administrativo / Designación</th>
                        <th></th>
                        <th>Coordinador</th>
                        <th>Estado</th>
                    </tr>

                    </tfoot>
                    <tbody>
                    @foreach ($cargos as $cargo)

                        <tr>

                            <td><b>{{  ucfirst($cargo->persona->lastname)}}</b></td>
                            <td>{{  $cargo->persona->name}}</td>
                            <td>{{ $cargo->materia->code .' - '. $cargo->materia->name}}</td>
                            <td>{{  $cargo->persona->doc}}</td>
                            <td>{{  $cargo->tipo}}</td>
                            <td>{{  $cargo->categoria}}</td>
                            <td>{{  $cargo->dedicacion_horaria}}</td>
                            <td>{{  $cargo->fecha_alta}}</td>
                            <td>{{  $cargo->fecha_baja}}</td>
                            <td>{{  $cargo->act_des}}</td>
                            {{--                            <td></td>--}}
                            <td>
                                <ul>
                                    @if ($cargo->persona->Docencia == "Si")
                                        <li>Docencia</li>
                                    @endif
                                    @if ($cargo->persona->Investigacion == "Si")
                                        <li>Investigacion</li>
                                    @endif
                                    @if ($cargo->persona->Extension == "Si")
                                        <li>Extension</li>
                                    @endif
                                    @if ($cargo->persona->Gestion == "Si")
                                        <li>Gestion</li>
                                    @endif
                                </ul>
                            </td>
                            <td>
                                <?php
                                    $coords2 = \App\Http\Controllers\SubjectController::allCoord($cargo->materia->id);
                                ?>



                                @foreach ($coords2 as $coord)
                                    @if ($coord != null)

                                    <ul>
                                        <li>{{  ucfirst($coord->user->userData->lastname).', '.ucfirst($coord->user->userData->name)}}</li>
                                    </ul>
                                    @endif
                                @endforeach

                            </td>


                            <td>@if($cargo->status == 1)
                                    @if($cargo->fecha_alta < date('Y-m-d'))
                                        @if ($cargo->fecha_baja)
                                            @if( date('Y-m-d')< $cargo->fecha_baja)
                                                <span class="btn btn-outline-info btn-sm">&#10003;</span>
                                            @else
                                                <span class="btn btn-outline-danger btn-sm"
                                                      href="">&#10539;</span>

                                            @endif
                                        @else
                                            <span class="btn btn-outline-info btn-sm"
                                                  href="">&#10003;</span>
                                        @endif
                                    @else
                                        <a class="btn btn-outline-danger btn-sm"
                                           href="">&#10539;</a>
                                    @endif
                                @else
                                    <span class="btn btn-outline-danger btn-sm"
                                          href="">&#10539;</span>
                                @endif</td>


                            </td>


                        </tr>
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

