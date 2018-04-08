<?php

use Illuminate\Http\Request;
use App\Models\UserCip;

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
});

Route::get('savePlan/{idUser}/{idOutcomeCycleAs}', 'PlanAssessmentController@savePlan')->middleware('cors');
Route::get('getPlansList', 'PlanAssessmentController@getPlansList')->middleware('cors');
Route::get('allOutcomes', 'OutcomesController@allOutcomes')->middleware('cors');
Route::get('outcomesByDirector/{id}', 'OutcomesController@outcomesByDirector')->middleware('cors');
Route::get('allOutcomes', 'OutcomesController@allOutcomes')->middleware('cors');
Route::get('outcomesByUser/{id}', 'OutcomesController@outcomesByUser')->middleware('cors');
Route::get('outcomesByUserAndProgram/{idUser}/{idProgram}', 'OutcomesController@outcomesByUserAndProgram')->middleware('cors');
Route::get('outcomes/{id}', 'OutcomesController@outcomesByProgram')->middleware('cors');
Route::get('outcomeCycleAsByOutcomeCycle/{idOutcome}/{idCycle}', 'OutcomeCycleAsController@outcomeCycleAsByOutcomeCycle')->middleware('cors');
Route::get('changeStateOutcomeToCreated/{id}', 'OutcomesController@changeStateOutcomeToCreated')->middleware('cors');


Route::get('parameterCycle/{id}', 'ParameterController@subCycleActiveByProgram')->middleware('cors');
Route::get('userById/{id}', function ($id) {
    $user = UserCip::where('ID_USER', '=', $id)->first();

    $response = Response::json($user, 200);

    //      header("Access-Control-Allow-Origin: *");
    return $response;
})->middleware('cors');

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