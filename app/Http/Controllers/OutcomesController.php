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
     * @param  string $id , id del program: sis,tel,ind
     * @return \Illuminate\Http\Response
     */
    public function outcomesByProgram($id)
    {

        $outcomes = DB::table('outcome')->where([
            ['PROGRAM_ID_PROGRAM', '=', $id],
            ['STATE_ID_STATE', '=', '5'],
        ])->get();
        $response = Response::json($outcomes, 200);
        //      header("Access-Control-Allow-Origin: *");
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
