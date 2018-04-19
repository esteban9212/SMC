<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsSrc;
use App\Models\Course;
use App\Models\PiSmc;
use Illuminate\support\Facades\Response;

class AssessmentSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Display a listing of assessment sources by Pi.
     * @param  string $id , id del director de programa
     * @return \Illuminate\Http\Response
     */
    public function assessmentSourceByPi($idPi)
    {
        $assessmentSources = AsSrc::where([
            ['PI_ID_PI', '=', $idPi]
        ])->get();

        $courses = array();

        for ($i = 0; $i < $assessmentSources->count(); $i++) {

            $idAssessmentSource = $assessmentSources[$i]->COURSE_ID_COURSE;
            $AssessmentSource = Course::where('ID_COURSE', '=', $idAssessmentSource)->first();
            $courses[$i] = $AssessmentSource;

        }

        $response = Response::json($courses, 200);
        //      header("Access-Control-Allow-Origin: *");
        return $response;
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
