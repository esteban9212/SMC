<?php

use Illuminate\Http\Request;
use App\Models\UserCip;
use App\Models\UserCipRoleCip;
use App\Models\RoleCip;

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

Route::group(['prefix' => 'v1', 'middleware' => 'cors'], function () {
    Route::resource('programs', 'ProgramController');
    Route::resource('outcomes', 'OutcomesController');
    Route::resource('parameters', 'ParameterController');
    Route::resource('planesAssessment', 'PlanAssessmentController');
    Route::resource('outcomeCycleAs', 'OutcomeCycleAsController');
    Route::resource('pis', 'PiController');
});


Route::get('allMethods', 'MethodController@getAllMethods')->middleware('cors');
Route::get('savePlan/{idUser}/{idOutcomeCycleAs}', 'PlanAssessmentController@savePlan')->middleware('cors');
Route::get('getPlansList', 'PlanAssessmentController@getPlansList')->middleware('cors');
Route::get('allOutcomes', 'OutcomesController@allOutcomes')->middleware('cors');
Route::get('outcomesByDirector/{id}', 'OutcomesController@outcomesByDirector')->middleware('cors');
Route::get('allOutcomes', 'OutcomesController@allOutcomes')->middleware('cors');
Route::get('outcomesByUser/{id}', 'OutcomesController@outcomesByUser')->middleware('cors');
Route::get('outcomesByUserAndProgram/{idUser}/{idProgram}', 'OutcomesController@outcomesByUserAndProgram')->middleware('cors');
Route::get('outcomesByProgram/{id}', 'OutcomesController@outcomesByProgram')->middleware('cors');
Route::get('outcomeCycleAsByOutcomeCycle/{idOutcome}/{idCycle}', 'OutcomeCycleAsController@outcomeCycleAsByOutcomeCycle')->middleware('cors');
Route::get('outcomesByCycleActiveByProgram/{idProgram}', 'OutcomeCycleAsController@outcomesByCycleActiveByProgram')->middleware('cors');

Route::get('changeStateOutcomeToCreated/{id}', 'OutcomesController@changeStateOutcomeToCreated')->middleware('cors');
Route::get('getPisByPlanId/{id}', 'PiController@getPisByPlanId')->middleware('cors');
Route::get('getPiByPlanIdPiId/{idPlan}/{idPi}', 'PiController@getPiByPlanIdPiId')->middleware('cors');
Route::get('getCdioByPiId/{id}', 'CdioPiController@getCdioByPiId')->middleware('cors');
Route::get('getCurricularMappinCDIOOutcome/{idpi}', 'CdioPiController@getCurricularMappinCDIOOutcome')->middleware('cors');
Route::get('assessmentSourceByPi/{idPi}', 'AssessmentSourceController@assessmentSourceByPi')->middleware('cors');
Route::get('getPlanById/{idPlan}', 'PlanAssessmentController@getPlanById')->middleware('cors');
Route::get('getMappingCourses/{id}', 'PiController@getMappingCourses')->middleware('cors');

Route::get('updateAS/{idAsSrc}/{idCourse}/{colDate}/{idMethod}/{idProf}', 'AssessmentSourceController@updateAS')->middleware('cors');
Route::get('assessmentSourcesByPi/{idPi}', 'AssessmentSourceController@assessmentSourcesByPi')->middleware('cors');


Route::get('getAllProfessors', 'UsersCipController@getAllProfesors')->middleware('cors');
Route::get('getAllUserCip', 'UsersCipController@getAllUserCip')->middleware('cors');

Route::get('changeLeaderOutcome/{idOutcome}/{IdUser}', 'OutcomesController@changeLeaderOutcome')->middleware('cors');
Route::get('parameterCycle/{id}', 'ParameterController@subCycleActiveByProgram')->middleware('cors');
Route::get('userById/{id}', function ($id) {
    $user = UserCip::where('IDENTIFICATION', '=', $id)->first();

    $response = Response::json($user, 200);

    //      header("Access-Control-Allow-Origin: *");
    return $response;
})->middleware('cors');

Route::post('/auth/login', 'AuthController@login')->middleware('cors');
Route::post('/auth/logout', 'AuthController@logout')->middleware('cors');
Route::post('/auth/refresh', 'AuthController@refresh')->middleware('cors');
Route::post('/auth/me', 'AuthController@me')->middleware('cors');
Route::get('/auth/register/{name}/{last_name}/{username}/{email}/{password}/{identification}', 'AuthController@register')->middleware('cors');


Route::get('rolsByUserId/{id}', function ($id) {
    $rols = UserCipRoleCip::where('USER_CIP_ID_USER', '=', $id)->get();

    $response = Response::json($rols, 200);

    //      header("Access-Control-Allow-Origin: *");
    return $response;
})->middleware('cors');

Route::get('getRol/{id}', function ($id) {
    $rol = RoleCip::where('ID_ROLE', '=', $id)->first();

    $response = Response::json($rol, 200);

    //      header("Access-Control-Allow-Origin: *");
    return $response;
})->middleware('cors');


Route::group([
       'prefix' => 'v1',
        'namespace' => 'Api'
    ], function () {
        Route::post('/auth/register', [
            'as' => 'auth.register',
            'uses' => 'AuthController@register'
      ])->middleware('cors');
});