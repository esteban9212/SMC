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

});
Route::get('outcomes/{id}', 'OutcomesController@outcomesByProgram')->middleware('cors');
Route::resource('planesAssessment', 'PlanAssessmentController');
