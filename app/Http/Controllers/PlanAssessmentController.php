<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use App\Models\StateSmc;
use App\Models\OutcomeCycleA;
use Illuminate\Http\Request;
use App\Models\PlanSmc;
use App\Models\PlanAssessmentBasic;
use App\Models\UserCip;
use App\Models\ProgramSmc;

use Illuminate\support\Facades\Response;
use function Sodium\add;

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
        $response = Response::json(['message' => 'todo bien']);


        //      header("Access-Control-Allow-Origin: *");
        return $response;
        //
    }


    public function getPlansList()
    {

        $plans = PlanSmc::all();
        $plans2 = array();

        for ($i = 0; $i < $plans->count(); $i++) {

            $outcoCycleid = $plans[$i]->ID_OUTCOME_CYCLE_AS;
            $outcomeCycleAs = OutcomeCycleA::where('ID_OUTCO_CYCLE', '=', $outcoCycleid)->first();
            $outcomeid = $outcomeCycleAs->OUTCOME_ID_ST_OUTCOME;

            $outcome = Outcome::where('ID_ST_OUTCOME', '=', $outcomeid)->first();


            $nombre = 'Plan Assessment Outcome ' . $outcome->CRITERION;
            $liderid = $outcome->USER_CIP_ID_USER;
            $lider = UserCip::where('ID_USER', '=', $liderid)->first();
            $programaid = $outcome->PROGRAM_ID_PROGRAM;
            $programa = ProgramSmc::where('ID_PROGRAM', '=', $programaid)->first();

            $estadoId = $outcome->STATE_ID_STATE;
            $estado = StateSmc::where('ID_STATE', '=', $estadoId)->first();
            $fechaCreacion = $outcome->created_at;
            $autorid = $plans[$i]->USER_CIP_ID_USER;
            $autor = UserCip::where('ID_USER', '=', $autorid)->first();


            $plans2[$i] = new PlanAssessmentBasic($nombre, $lider->NAME_USER . " " . $lider->LAST_NAME, $programa->NAME_PROGRAM, $estado->STATE_NAME, $fechaCreacion, $autor->NAME_USER . " " . $autor->LAST_NAME);

        }


        $response = Response::json($plans2, 200);

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
