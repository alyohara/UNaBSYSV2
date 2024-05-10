<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
       /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::get('/login', 'LoginController@show')->name('login');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::get('/registerDoc/{id}', 'RegisterController@show2')->name('register.show2');
        Route::get('/users', 'RegisterController@users')->name('register.users');
        Route::get('/user/{id}', 'RegisterController@user')->name('register.user');
        Route::get('/verUsuario/{id}', 'RegisterController@verUsuario')->name('register.verUsuario');
        Route::get('/changePass/{id}', 'RegisterController@changePass')->name('register.changePass');
        Route::post('/changePass', 'RegisterController@changePassUpdate')->name('register.changePassUpdate');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        Route::post('/registerDoc', 'RegisterController@registerDoc')->name('register.performDoc');
        Route::post('/update', 'RegisterController@update')->name('register.update');
        Route::delete('/delete/{id}', 'RegisterController@destroy')->name('register.destroy');

        /**
         * Perfil Routes
         */
        Route::get('/perfil', 'RegisterController@perfil')->name('register.perfil');
        Route::post('/perfil', 'RegisterController@updateProfile')->name('register.updateProfile');
        /**
         * Persona Routes
         */
        Route::get('/registerPersona', 'PersonaController@show')->name('persona.show');
        Route::get('/personas', 'PersonaController@personas')->name('persona.personas');
        Route::get('/persona/{id}', 'PersonaController@persona')->name('persona.persona');
        Route::get('/verPersona/{id}', 'PersonaController@verPersona')->name('persona.verPersona');
        Route::get('/verPersonaNotDocOnly/{id}', 'PersonaController@verPersonaNotDocOnly')->name('persona.verPersonaNotDocOnly');
        Route::post('/registerPersona', 'PersonaController@store')->name('persona.perform');
        Route::post('/updatePersona', 'PersonaController@update')->name('persona.update');
        Route::delete('/deletePersona/{id}', 'PersonaController@destroy')->name('persona.destroy');




        /**
         * College Routes
         */
        Route::get('/registrarFacultad', 'CollegeController@show')->name('college.show');
        Route::get('/facultades', 'CollegeController@colleges')->name('college.colleges');
        Route::get('/facultad/{id}', 'CollegeController@college')->name('college.college');
        Route::get('/verFacultad/{id}', 'CollegeController@verFacultad')->name('college.verFacultad');
        Route::post('/registrarFacultad', 'CollegeController@store')->name('college.perform');
        Route::post('/updateFacultad', 'CollegeController@update')->name('college.update');
        Route::delete('/deleteFacultad/{id}', 'CollegeController@destroy')->name('college.destroy');

        /**
         * Career Routes
         */
        Route::get('/registrarCarrera', 'CareerController@show')->name('career.show');
        Route::get('/carreras', 'CareerController@careers')->name('career.careers');
        Route::get('/carrera/{id}', 'CareerController@career')->name('career.career');
        Route::get('/verCarrera/{id}', 'CareerController@verCarrera')->name('career.verCarrera');
        Route::post('/registrarCarrera', 'CareerController@store')->name('career.perform');
        Route::post('/updateCarrera', 'CareerController@update')->name('career.update');
        Route::delete('/deleteCarrera/{id}', 'CareerController@destroy')->name('career.destroy');

        /**
         * Subjects Routes
         */
        Route::get('/registrarMateria', 'SubjectController@show')->name('subject.show');
        Route::get('/materias', 'SubjectController@subjects')->name('subject.subjects');
        Route::get('/materia/{id}', 'SubjectController@subject')->name('subject.subject');
        Route::get('/verMateria/{id}', 'SubjectController@verMateria')->name('subject.verMateria');
        Route::post('/registrarMateria', 'SubjectController@store')->name('subject.perform');
        Route::post('/updateMateria', 'SubjectController@update')->name('subject.update');
        Route::delete('/deleteMateria/{id}', 'SubjectController@destroy')->name('subject.destroy');

        /**
             * Coordinador Routes
         */
        Route::get('/registrarCoordinador/{id}', 'CoordinadorController@show')->name('coordinador.show');
        Route::get('/agregarCoordinador', 'CoordinadorController@show2')->name('coordinador.show2');
        Route::get('/coordinadores', 'CoordinadorController@index')->name('coordinador.coordinadores');
        Route::get('/coordinador/{id}', 'CoordinadorController@coordinador')->name('coordinador.coordinador');
        Route::get('/verCoordinador/{id}', 'CoordinadorController@verCoordinador')->name('coordinador.verCoordinador');
        Route::get('/statusCoordinador/{id}', 'CoordinadorController@statusCoordinador')->name('coordinador.statusCoordinador');
        Route::post('/registrarCoordinador', 'CoordinadorController@store')->name('coordinador.perform');
        Route::post('/updateCoordinador', 'CoordinadorController@update')->name('coordinador.update');
        Route::delete('/deleteCoordinador/{id}', 'CoordinadorController@destroy')->name('coordinador.destroy');

        Route::get('/coordinados/', 'CoordinadorController@coordinados')->name('coordinador.coordinados');
        Route::get('/profCoordinados/', 'CoordinadorController@profCoordinados')->name('coordinador.profCoordinados');





        /**
         * Cargos Routes
         */
        Route::get('/registrarCargo', 'CargoController@show')->name('cargo.show');
        Route::get('/cargos', 'CargoController@cargos')->name('cargo.cargos');
        Route::get('/cargosCoordinados', 'CargoController@cargosCoordinador')->name('cargo.cargosCoordinados');
        Route::get('/cargosSinValidar', 'CargoController@cargosSinValidar')->name('cargo.cargosSinValidar');
        Route::get('/cargosRenovados', 'CargoController@cargosRenovados')->name('cargo.cargosRenovados');
        Route::get('/cargoCoordinador/{id}', 'CargoController@cargoCoordinador')->name('cargo.cargoCoordinador');
        Route::get('/cargo/{id}', 'CargoController@cargo')->name('cargo.cargo');
        Route::get('/cargoCoord/{id}', 'CargoController@cargoCoord')->name('cargo.cargoCoord');
        Route::get('/cargoToggle/{id}', 'CargoController@toggle')->name('cargo.cargoToggle');
        Route::get('/cargoToggle2/{id}', 'CargoController@toggle2')->name('cargo.cargoToggle2');
        Route::get('/verCargo/{id}', 'CargoController@verCargo')->name('cargo.verCargo');
        Route::get('/renovarCargo/{id}', 'CargoController@renovarCargo')->name('cargo.renovarCargo');
        Route::get('/renovarCargoCoord/{id}', 'CargoController@renovarCargoCoord')->name('cargo.renovarCargoCoord');
        Route::post('/registrarCargo', 'CargoController@store')->name('cargo.perform');
        Route::post('/registrarCargoCoord', 'CargoController@storeCoord')->name('cargo.performCoord');
        Route::post('/updateCargo', 'CargoController@update')->name('cargo.update');
        Route::post('/updateCargoCoordinador', 'CargoController@updateCoord')->name('cargo.updateCoord');
        Route::post('/renovarCargos', 'CargoController@renovarCargos')->name('cargo.renovarCargos');
        Route::post('/validarCargos', 'CargoController@validarCargos')->name('cargo.validarCargos');
        Route::post('/renovarCargosCoord', 'CargoController@renovarCargosCoord')->name('cargo.renovarCargosCoord');
        Route::delete('/deleteCargo/{id}', 'CargoController@destroy')->name('cargo.destroy');


        Route::get('/descargaDatos', 'CargoController@exportData')->name('descargaDatos');

        /**
         * Bedel Routes
         */
        Route::get('/registrarAsistencia', 'AsistenciaController@show')->name('asistencia.show');
        Route::get('/asistencias', 'AsistenciaController@asistencias')->name('asistencia.asistencias');
        Route::get('/asistencia/{id}', 'AsistenciaController@asistencia')->name('asistencia.asistencia');
        Route::get('/verAsistencia/{id}', 'AsistenciaController@verAsistencia')->name('asistencia.verAsistencia');
        Route::post('/registrarAsistencia', 'AsistenciaController@store')->name('asistencia.perform');
        Route::post('/updateAsistencia', 'AsistenciaController@update')->name('asistencia.update');
        Route::delete('/deleteAsistencia/{id}', 'AsistenciaController@destroy')->name('asistencia.destroy');

        /**
         * Alerta Routes
         */
        Route::get('/registrarAlerta', 'AlertaController@show')->name('alerta.show');
        Route::get('/alertas', 'AlertaController@index')->name('alerta.alertas');
        Route::get('/alerta/{id}', 'AlertaController@alerta')->name('alerta.alerta');
        Route::get('/verAlerta/{id}', 'AlertaController@verAlerta')->name('alerta.verAlerta');
        Route::post('/registrarAlerta', 'AlertaController@store')->name('alerta.perform');
        Route::post('/updateAlerta', 'AlertaController@update')->name('alerta.update');
        Route::delete('/deleteAlerta/{id}', 'AlertaController@destroy')->name('alerta.destroy');


        /**
         * sedes de cursadas Routes
         */
        Route::resource('sede_de_cursada', 'SedeDeCursadaController');

        /**
         * Configs Routes
         */
        //Route::resource('/config', 'ConfigController@index')->name('config.index');

        /**
         * Cuatrimestre Routes
         */
        Route::resource('/cuatrimestres', 'CuatrimestreController');


        /**
         * Messages
         */
        Route::get('/messages', 'MessagesController@index')->name('messages.index');
        Route::get('/messages/create', 'MessagesController@create')->name('messages.create');
        Route::post('/messages', 'MessagesController@store')->name('messages.store');
        Route::get('/messages/{id}', 'MessagesController@show')->name('messages.show');
        Route::put('/messages/{id}', 'MessagesController@update')->name('messages.update');
//
//        Route::group(['prefix' => 'messages'], function () {
//            Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
//            Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
//            Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
//            Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
//            Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
//        });

        /**
         * NewStyle Routes
         */
        Route::get('/nuevoEstilo', 'CargoController@Stilo')->name('cargo.stilo');
    });


});

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Only to handle all request for provinces, departments, dates, etc
|
*/

Route::get('/getCarreras/{id}', 'App\Http\Controllers\AjaxController@getCarreras')->name('getCarreras');
Route::get('/getMaterias/{id}', 'App\Http\Controllers\AjaxController@getMaterias')->name('getMaterias');
Route::get('/getMateriasByProfesor/{id}', 'App\Http\Controllers\AjaxController@getMateriasByProfesor')->name('getMateriasByProfesor');
Route::get('/getProfesoresByMateria/{id}', 'App\Http\Controllers\AjaxController@getProfesoresByMateria')->name('getProfesoresByMateria');
Route::get('/getDocente/{id}', 'App\Http\Controllers\AjaxController@getDocente')->name('getDocente');
Route::get('/getDocenteNotUser/{id}', 'App\Http\Controllers\AjaxController@getDocenteNotUser')->name('getDocenteNotUser');

Route::get('/getPersonaData/{id}', 'App\Http\Controllers\AjaxController@getPersonaData')->name('getPersonaData');




