<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Outcome;
use Illuminate\Support\Facades\DB;
use Illuminate\support\Facades\Response;


class OutcomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Outcome::all();
        $response = Response::json($programs, 200);
        //      header("Access-Control-Allow-Origin: *");
        return $response;
    }


    /**
     * Display a listing of outcomes by program.
     * @param  string $id , id del director de programa
     * @return \Illuminate\Http\Response
     */
    public function outcomesByDirector($id)
    {
        $program = DB::table('program_smc')->where([
            ['USER_CIP_ID_USER', '=', $id]
        ])->first();


        $outcomes = DB::table('outcome')->where([
            ['PROGRAM_ID_PROGRAM', '=', $program->ID_PROGRAM],
            //STATE_ID_STATE = '5' outcome  de estado activo
            ['STATE_ID_STATE', '=', '5'],
        ])->get();

        $response = Response::json($outcomes, 200);
        //      header("Access-Control-Allow-Origin: *");
        return $response;
    }

    /**
     * Change leader to outcome.
     * @param  string $idOutcome , string idUser , id del director de programa
     * @return \Illuminate\Http\Response
     */
    public function changeLeaderOutcome($idOutcome, $IdUser)
    {

        $outcome = Outcome::where('ID_ST_OUTCOME', '=', $idOutcome)->first();

        $outcome->USER_CIP_ID_USER = $IdUser;
        $outcome->save();


        $response = Response::json($outcome, 200);
        //      header("Access-Control-Allow-Origin: *");
        return $response;
    }





    /**
     * Display a listing of outcomes by program.
     * @param  string $id , id del program: sis,tel,ind
     * @return \Illuminate\Http\Response
     */
    public function outcomesByProgram($id)
    {

        $outcomes = DB::table('outcome')->where([
            ['PROGRAM_ID_PROGRAM', '=', $id],
            //STATE_ID_STATE = '5' outcome  de estado activo
            ['STATE_ID_STATE', '=', '5'],
        ])->get();

        $response = Response::json($outcomes, 200);
        //      header("Access-Control-Allow-Origin: *");
        return $response;
    }


    /**
     * Display a listing all outcomes .
     * @return \Illuminate\Http\Response
     */
    public function allOutcomes()
    {

        $outcomes = DB::table('outcome')->where([
            //STATE_ID_STATE = '5' outcome  de estado activo
            ['STATE_ID_STATE', '=', '5'],
        ])->get();

        $response = Response::json($outcomes, 200);
        return $response;
    }

    /**
     * Display a listing all outcomes .
     * @param  string $id , id del usuario encargado de un outcome
     * @return \Illuminate\Http\Response
     */
    public function changeStateOutcomeToCreated($id)
    {

        $outcome = Outcome::where('ID_ST_OUTCOME', '=', $id)->first();

        //  $outcome->STATE_ID_STATE='15';
        // $outcome->save();

        $response = Response::json($outcome, 200);
        return $response;
    }

    /**
     * Display a listing all outcomes .
     * @param  string $id , id del usuario encargado de un outcome
     * @return \Illuminate\Http\Response
     */
    public function outcomesByUser($id)
    {

        $outcomes = DB::table('outcome')->where([
            ['USER_CIP_ID_USER', '=', $id],
            //STATE_ID_STATE = '5' outcome  de estado activo
            ['STATE_ID_STATE', '=', '5'],
        ])->get();

        $response = Response::json($outcomes, 200);
        return $response;
    }


    /**
     * Display a listing all outcomes de un usuario en un programa .
     * @param  string $idUser , id del usuario encargado de un outcome,$idProgram id del programa
     * @return \Illuminate\Http\Response
     */
    public function outcomesByUserAndProgram($idUser, $idProgram)
    {

        $outcomes = DB::table('outcome')->where([
            ['USER_CIP_ID_USER', '=', $idUser],
            ['PROGRAM_ID_PROGRAM', '=', $idProgram],
            //STATE_ID_STATE = '5' outcome  de estado activo
            ['STATE_ID_STATE', '=', '5'],
        ])->get();

        $response = Response::json($outcomes, 200);
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
