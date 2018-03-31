<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanSmc;

use Illuminate\support\Facades\Response;

class PlanAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = PlanSmc::all();
        $response = Response::json($plans, 200);
        return $response;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a plan in database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function savePlan($idUser, $idOutcomeCycleAs)
    {
        $plan = ['USER_CIP_ID_USER' => $idUser, 'CREATION_DATE' => '2018-03-29 07:12:10', 'PERIOD_ID_PERIOD' => '201810', 'STATE_ID_STATE' => '9', 'ID_OUTCOME_CYCLE_AS' => $idOutcomeCycleAs];

        PlanSmc::create($plan);
        //  console.log("algo");

        $plans = PlanSmc::all();
        $response = Response::json($plans, 200);
        //      header("Access-Control-Allow-Origin: *");
        return $response;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
