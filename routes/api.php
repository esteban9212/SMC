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

Route::get('savePlan/{idUser}/{idOutcomeCycleAs}', 'PlanAssessmentController@savePlan')->middleware('cors');
Route::get('getPlansList', 'PlanAssessmentController@getPlansList')->middleware('cors');
Route::get('allOutcomes', 'OutcomesController@allOutcomes')->middleware('cors');
Route::get('outcomesByDirector/{id}', 'OutcomesController@outcomesByDirector')->middleware('cors');
Route::get('allOutcomes', 'OutcomesController@allOutcomes')->middleware('cors');
Route::get('outcomesByUser/{id}', 'OutcomesController@outcomesByUser')->middleware('cors');
Route::get('outcomesByUserAndProgram/{idUser}/{idProgram}', 'OutcomesController@outcomesByUserAndProgram')->middleware('cors');
Route::get('outcomesByProgram/{id}', 'OutcomesController@outcomesByProgram')->middleware('cors');
Route::get('outcomeCycleAsByOutcomeCycle/{idOutcome}/{idCycle}', 'OutcomeCycleAsController@outcomeCycleAsByOutcomeCycle')->middleware('cors');
Route::get('changeStateOutcomeToCreated/{id}', 'OutcomesController@changeStateOutcomeToCreated')->middleware('cors');
Route::get('getPisByPlanId/{id}', 'PiController@getPisByPlanId')->middleware('cors');
Route::get('getCdioByPiId/{id}', 'CdioPiController@getCdioByPiId')->middleware('cors');
Route::get('getCurricularMappinCDIOOutcome/{idpi}', 'CdioPiController@getCurricularMappinCDIOOutcome')->middleware('cors');

Route::get('parameterCycle/{id}', 'ParameterController@subCycleActiveByProgram')->middleware('cors');
Route::get('userById/{id}', function ($id) {
    $user = UserCip::where('ID_USER', '=', $id)->first();

    $response = Response::json($user, 200);

    //      header("Access-Control-Allow-Origin: *");
    return $response;
})->middleware('cors');

Route::post('/auth/login', 'AuthController@login')->middleware('cors');
Route::post('logout', 'AuthController@logout')->middleware('cors');
Route::post('refresh', 'AuthController@refresh')->middleware('cors');
Route::post('me', 'AuthController@me')->middleware('cors');


Route::group([
    'prefix' => 'api/v1',
    'namespace' => 'Api'
], function () {
    Route::post('/auth/register', [
        'as' => 'auth.register',
        'uses' => 'AuthController@register'
    ]);
    Route::post('/auth/login', [
        'as' => 'auth.login',
        'uses' => 'AuthController@login'
    ]);
});

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