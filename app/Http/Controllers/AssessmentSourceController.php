<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AsSrc;
use App\Models\Course;
use App\Models\PiSmc;
use Illuminate\support\Facades\Response;
use Illuminate\Support\Facades\DB;

class AssessmentSourceController extends Controller
{


    /**
     * Store a assessmentCourse in database.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function saveAssessmentCourse($idUser, $idCourse, $idPi, $idMethod, $dateFrecuency, $dateCollection)
    {
        $assrc = ['USER_CIP_ID_USER' => $idUser, 'COURSE_ID_COURSE' => $idCourse, 'PI_ID_PI' => $idPi,
            'METHOD_ID_AS_METHOD' => $idMethod, 'COLLECTION_FREQUENCY' => $dateFrecuency, 'COLLECTION_DATE' => $dateCollection];

        AsSrc::create($assrc);


        $coursesAssessments = AsSrc::all();
        $response = Response::json(['message' => 'todo bien']);


        //      header("Access-Control-Allow-Origin: *");
        return $response;
        //
    }



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

    public function assessmentSourcesByPi($idPi)
    {
        $assessmentSources = AsSrc::where([
            ['PI_ID_PI', '=', $idPi]
        ])->get();

        $response = Response::json($assessmentSources, 200);
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
    public function updateAS($idAsSrc, $idCourse, $colDate, $idMethod, $idProf)
    {
        $assessmentSource = AsSrc::where([
            ['ID_AS_SRC', '=', $idAsSrc]
        ])->first();

        $assessmentSource->COURSE_ID_COURSE = $idCourse;
        $assessmentSource->COLLECTION_DATE = $colDate;
        $assessmentSource->METHOD_ID_AS_METHOD = $idMethod;
        $assessmentSource->USER_CIP_ID_USER = $idProf;

        $assessmentSource->save();

        $message = "updated source of assessment";

        $response = Response::json($message, 200);
        return $response;
    }

    public function updateAS1($idAsSrc, $idCourse)
    {
        $assessmentSource = AsSrc::where([
            ['ID_AS_SRC', '=', $idAsSrc]
        ])->first();

        $assessmentSource->COURSE_ID_COURSE = $idCourse;

        $assessmentSource->save();

        $message = "updated source of assessment";

        $response = Response::json($message, 200);
        return $response;
    }

    public function updateAS2($idAsSrc, $colDate)
    {
        $assessmentSource = AsSrc::where([
            ['ID_AS_SRC', '=', $idAsSrc]
        ])->first();

        $assessmentSource->COLLECTION_DATE = $colDate;

        $assessmentSource->save();

        $message = "updated source of assessment";

        $response = Response::json($message, 200);
        return $response;
    }

    public function updateAS3($idAsSrc, $idMethod)
    {
        $assessmentSource = AsSrc::where([
            ['ID_AS_SRC', '=', $idAsSrc]
        ])->first();

        $assessmentSource->METHOD_ID_AS_METHOD = $idMethod;

        $assessmentSource->save();

        $message = "updated source of assessment";

        $response = Response::json($message, 200);
        return $response;
    }

    public function updateAS4($idAsSrc, $idProf)
    {
        $assessmentSource = AsSrc::where([
            ['ID_AS_SRC', '=', $idAsSrc]
        ])->first();

        $assessmentSource->USER_CIP_ID_USER = $idProf;

        $assessmentSource->save();

        $message = "updated source of assessment";

        $response = Response::json($message, 200);
        return $response;
    }

    public function createAS($idPi, $idCourse, $colDate, $idMethod, $idProf)
    {
        $assessmentSource = new AsSrc();

        $assessmentSource->PI_ID_PI = $idPi;
        $assessmentSource->COURSE_ID_COURSE = $idCourse;
        $assessmentSource->COLLECTION_DATE = $colDate;
        $assessmentSource->METHOD_ID_AS_METHOD = $idMethod;
        $assessmentSource->USER_CIP_ID_USER = $idProf;
        $assessmentSource->COLLECTION_FREQUENCY="1 dia";

        $assessmentSource->save();

        $message = "Created source of assessment";

        $response = Response::json($message, 200);
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAsSrc)
    {

        DB::table('as_src')->where('ID_AS_SRC', '=', $idAsSrc)->delete();

        $message = "Deleted source of assessment";

        $response = Response::json($message, 200);
        return $response;

    }
}
