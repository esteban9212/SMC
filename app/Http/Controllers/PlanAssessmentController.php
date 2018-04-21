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
use App\Models\MainCycle;
use App\Models\AsSrc;

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
     * Display a plan by id plan.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPlanById($idPlan)
    {
        $plan = PlanSmc::where('ID_PLAN', '=', $idPlan)->first();

        $outcoCycleid = $plan->ID_OUTCOME_CYCLE_AS;
        $outcomeCycleAs = OutcomeCycleA::where('ID_OUTCO_CYCLE', '=', $outcoCycleid)->first();
        $cicloPlanid = $outcomeCycleAs->MAIN_CYCLE_ID_CYCLE;
        $ciclo = MainCycle::where('ID_CYCLE', '=', $cicloPlanid)->first();
        $mainCicloid = $ciclo->MAIN_CYCLE_ID_CYCLE;
        $mainCiclo = MainCycle::where('ID_CYCLE', '=', $mainCicloid)->first();


        $outcomeid = $outcomeCycleAs->OUTCOME_ID_ST_OUTCOME;

        $outcome = Outcome::where('ID_ST_OUTCOME', '=', $outcomeid)->first();


        $Name = 'Plan Assessment ' . $outcome->CRITERION;
        $liderid = $outcome->USER_CIP_ID_USER;
        $Leader = UserCip::where('ID_USER', '=', $liderid)->first();
        $programaid = $outcome->PROGRAM_ID_PROGRAM;
        $Program = ProgramSmc::where('ID_PROGRAM', '=', $programaid)->first();

        $estadoId = $outcome->STATE_ID_STATE;
        $State = StateSmc::where('ID_STATE', '=', $estadoId)->first();
        $DateCreation = $outcome->created_at;
        $autorid = $plan->USER_CIP_ID_USER;
        $Author = UserCip::where('ID_USER', '=', $autorid)->first();


        $plans2 = new PlanAssessmentBasic($idPlan, $Name, $mainCiclo->CYCLE_NAME, $ciclo->CYCLE_NAME,
            $Leader->NAME_USER . " " . $Leader->LAST_NAME, $Program->NAME_PROGRAM, $State->STATE_NAME, $DateCreation,
            $Author->NAME_USER . " " . $Author->LAST_NAME, $outcome->CRITERION . " ", $outcome->DESCRIPTION . " ");


        $response = Response::json($plans2, 200);
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
            $cicloPlanid = $outcomeCycleAs->MAIN_CYCLE_ID_CYCLE;
            $ciclo = MainCycle::where('ID_CYCLE', '=', $cicloPlanid)->first();
            $mainCicloid = $ciclo->MAIN_CYCLE_ID_CYCLE;
            $mainCiclo = MainCycle::where('ID_CYCLE', '=', $mainCicloid)->first();


            $outcomeid = $outcomeCycleAs->OUTCOME_ID_ST_OUTCOME;

            $outcome = Outcome::where('ID_ST_OUTCOME', '=', $outcomeid)->first();


            $Name = 'Plan Assessment ' . $outcome->CRITERION;
            $liderid = $outcome->USER_CIP_ID_USER;
            $Leader = UserCip::where('ID_USER', '=', $liderid)->first();
            $programaid = $outcome->PROGRAM_ID_PROGRAM;
            $Program = ProgramSmc::where('ID_PROGRAM', '=', $programaid)->first();

            $estadoId = $outcome->STATE_ID_STATE;
            $State = StateSmc::where('ID_STATE', '=', $estadoId)->first();
            $DateCreation = $outcome->created_at;
            $autorid = $plans[$i]->USER_CIP_ID_USER;
            $Author = UserCip::where('ID_USER', '=', $autorid)->first();

            $Idplan = $i + 1;
            $plans2[$i] = new PlanAssessmentBasic($Idplan, $Name, $mainCiclo->CYCLE_NAME, $ciclo->CYCLE_NAME, $Leader->NAME_USER . " " . $Leader->LAST_NAME, $Program->NAME_PROGRAM, $State->STATE_NAME, $DateCreation,
                $Author->NAME_USER . " " . $Author->LAST_NAME, $outcome->CRITERION . " ", $outcome->DESCRIPTION . " ");

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
