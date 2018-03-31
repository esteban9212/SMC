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

Route::group(['prefix' => 'v1', 'middleware' => 'cors'], function () {
    Route::resource('programs', 'ProgramController');
    Route::resource('outcomes', 'OutcomesController');
    Route::resource('parameters', 'ParameterController');
    Route::resource('planesAssessment', 'PlanAssessmentController');
    Route::resource('outcomeCycleAs', 'OutcomeCycleAs');
});


Route::get('outcomesByDirector/{id}', 'OutcomesController@outcomesByDirector')->middleware('cors');
Route::get('allOutcomes', 'OutcomesController@allOutcomes')->middleware('cors');
Route::get('outcomesByUser/{id}', 'OutcomesController@outcomesByUser')->middleware('cors');
Route::get('outcomesByUserAndProgram/{idUser}/{idProgram}', 'OutcomesController@outcomesByUserAndProgram')->middleware('cors');
Route::get('outcomes/{id}', 'OutcomesController@outcomesByProgram')->middleware('cors');


Route::get('outcomeCycleAsByOutcomeCycle/{idOutcome}/{idCycle}', 'OutcomeCycleAs@outcomeCycleAsByOutcomeCycle')->middleware('cors');

Route::get('parameterCycle/{id}', 'ParameterController@subCycleActiveByProgram')->middleware('cors');

Route::get('savePlan/{idUser}/{idOutcomeCycleAs}', 'PlanAssessmentController@savePlan')->middleware('cors');
