<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CdioSkillPi;
use App\Models\CdioSkill;
use App\Models\Outcome;
use App\Models\CdioOutcomeMtx;
use App\Models\CdioCourseMtx;
use App\Models\Course;
use Illuminate\support\Facades\Response;

class CdioPiController extends Controller
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
     * Display a listing all Cdio By Outcome .
     * @return \Illuminate\Http\Response
     */
    public function getCdioByOutcome($idOutcome)
    {
        $cdios2 = array();
        $cdios = CdioOutcomeMtx::where([
            //STATE_ID_STATE = '5' outcome  de estado activo
            ['ID_ST_OUTCOME', '=', $idOutcome],
        ])->get();;


        for ($i = 0; $i < $cdios->count(); $i++) {
            $idcdio = $cdios[$i]->CDIO_SKILL_ID_CDIO_SKILL;
            $cdioSkill = CdioSkill::where('CDIO_SKILL_ID_CDIO_SKILL', '=', $idcdio)->first();
            $cdios2[$i] = $cdioSkill;
        }


        $response = Response::json($cdios2, 200);
        return $response;
    }

    /**
     * Display a listing all Cdio By Outcome .
     * @return \Illuminate\Http\Response
     */
    public function getCoursesByCdio2($idCdio)
    {

        $courses = CdioCourseMtx::where([
            ['ID_CDIO_SKILL', '=', $idCdio],
        ])->get();

        $idCourses = array();
        for ($i = 0; $i < sizeof($courses); $i++) {

            $idCourse = $courses[$i]->ID_COURSE;


            $courses2 = Course::where([
                ['ID_COURSE', '=', $idCourse],
            ])->get()->toArray();

            $idCourses = array_merge($idCourses, $courses2);

        }
        $response = Response::json($idCourses, 200);
        return $response;
    }

    /**
     * Display a listing all cdioBy PI .
     * @return \Illuminate\Http\Response
     */
    public function getCdioByPiId($id)
    {
        $cdios2 = array();
        $cdios = CdioSkillPi::where([
            //STATE_ID_STATE = '5' outcome  de estado activo
            ['PI_ID_PI', '=', $id],
        ])->get();;


        for ($i = 0; $i < $cdios->count(); $i++) {
            $idcdio = $cdios[$i]->CDIO_SKILL_ID_CDIO_SKILL;
            $cdioSkill = CdioSkill::where('ID_CDIO_SKILL', '=', $idcdio)->first();
            $cdios2[$i] = $cdioSkill;
        }


        $response = Response::json($cdios2, 200);
        return $response;
    }


    /**
     * Display a listing all cdioBy PI .
     * @return \Illuminate\Http\Response
     */
    public function getCurricularMappinCDIOOutcome($idpi)
    {
        $courses = array();
        $mapeo = array();
        $cdios = CdioSkillPi::where([
            //STATE_ID_STATE = '5' outcome  de estado activo
            ['PI_ID_PI', '=', $idpi],
        ])->get();;

        for ($i = 0; $i < $cdios->count(); $i++) {
            $idcdio = $cdios[$i]->CDIO_SKILL_ID_CDIO_SKILL;

            $coursesmtx = CdioCourseMtx::where([
                ['ID_CDIO_SKILL', '=', $idcdio],
            ])->get();

            for ($i = 0; $i < count($coursesmtx); $i++) {
                $mapeo[] = $coursesmtx[$i];
            }
        }

        for ($i = 0; $i < count($mapeo); $i++) {
            $idcourse = $mapeo[$i]->ID_COURSE;
            $course = Course::where('ID_COURSE', '=', $idcourse)->first();

            $courses[$i] = $course;
        }

        $courses = array_slice($courses, 0, 6);
        $courses = array_unique($courses);

        $response = Response::json($courses, 200);
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
