<?php

namespace App\Http\Controllers;

use App\Models\PiCdioAssessmentSource;
use Illuminate\Http\Request;
use App\Models\PiSmc;
use Illuminate\support\Facades\Response;
use App\Models\CdioSkillPi;
use App\Models\CdioSkill;
use App\Models\CdioCourseMtx;
use App\Models\Course;
use App\Models\AsSrc;

class PiController extends Controller
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
     * Display a listing all pi .
     * @return \Illuminate\Http\Response
     */
    public function getPisByPlanId($id)
    {
        $pis2 = array();
        $pis = PiSmc::where([
            //STATE_ID_STATE = '5' outcome  de estado activo
            ['PLAN_ID_PLAN', '=', $id],
        ])->get();;

        for ($i = 0; $i < $pis->count(); $i++) {

            $Idpi = $pis[$i]->ID_PI;
            $CodePi = $pis[$i]->CODE;
            $DescriptionPi = $pis[$i]->DESCRIPTION;
            $pis2[$i] = new PiCdioAssessmentSource($Idpi, $CodePi, $DescriptionPi);


            $cdios2 = array();
            $cdios = CdioSkillPi::where([
                ['PI_ID_PI', '=', $Idpi],
            ])->get();;

            for ($j = 0; $j < $cdios->count(); $j++) {
                $idcdio = $cdios[$j]->CDIO_SKILL_ID_CDIO_SKILL;
                $cdioSkill = CdioSkill::where('ID_CDIO_SKILL', '=', $idcdio)->first();
                $cdios2[$j] = $cdioSkill;

            }

            $pis2[$i]->Cdios = $cdios2;

            $courses = array();
            $mapeo = array();
            $cdios = CdioSkillPi::where([
                ['PI_ID_PI', '=', $Idpi],
            ])->get();;

            for ($j = 0; $j < count($cdios); $j++) {
                $idcdio = $cdios[$j]->CDIO_SKILL_ID_CDIO_SKILL;

                $coursesmtx = CdioCourseMtx::where([
                    ['ID_CDIO_SKILL', '=', $idcdio],
                ])->get();

                for ($k = 0; $k < count($coursesmtx); $k++) {
                    $mapeo[] = $coursesmtx[$k];
                }
            }

            for ($j = 0; $j < count($mapeo); $j++) {
                $idcourse = $mapeo[$j]->ID_COURSE;
                $course = Course::where('ID_COURSE', '=', $idcourse)->first();

                $courses[$j] = $course;
            }

            //      $courses = array_slice($courses, 0, 6);
            //    $courses = array_unique($courses);
            $pis2[$i]->MappingCourses = $courses;


            $assessmentSources = AsSrc::where([
                ['PI_ID_PI', '=', $Idpi]
            ])->get();

            $courses = array();

            for ($j = 0; $j < $assessmentSources->count(); $j++) {

                $idAssessmentSource = $assessmentSources[$j]->COURSE_ID_COURSE;
                $AssessmentSource = Course::where('ID_COURSE', '=', $idAssessmentSource)->first();
                $courses[$j] = $AssessmentSource;

            }

            $pis2[$i]->AssessmentCourses = $courses;


        }

        $response = Response::json($pis2, 200);
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
