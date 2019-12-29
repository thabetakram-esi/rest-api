<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/EspaceAdministrateur/Enseignant','enseignantController@index');
Route::get('/EspaceAdministrateur/Enseignant/{id}','enseignantController@show');
Route::post('/EspaceAdministrateur/Enseignant','enseignantController@store');
Route::put('/EspaceAdministrateur/Enseignant/{id}','enseignantController@update');
Route::delete('/EspaceAdministrateur/Enseignant/{id}','enseignantController@destroy');



Route::get('/EspaceAdministrateur/Etudiant','etudiantController@index');
Route::get('/EspaceAdministrateur/Etudiant/{id}','etudiantController@show');
Route::post('/EspaceAdministrateur/Etudiant','etudiantController@store');
Route::put('/EspaceAdministrateur/Etudiant/{id}','etudiantController@update');
Route::delete('/EspaceAdministrateur/Etudiant/{id}','etudiantController@destroy');



Route::get('/EspaceEnseignant/Cours','CoursController@index');
Route::post('/EspaceEnseignant/Cours','CoursController@store');



Route::get('/EspaceEtudiant','Controller@ConsulterCours');
Route::get('/EspaceEtudiant/file/{id}','Controller@downloadfile');




Route::get('/', function () {

    $result = ['result' => 'OK',
               'data' => 'No Data Yet'];
  
    $response = \Response::json($result)->setStatusCode(200, 'Success');
  
    return $response;
  
  });