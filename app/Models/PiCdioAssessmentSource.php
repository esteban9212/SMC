<?php
/**
 * Created by PhpStorm.
 * User: Esteban Aguirre
 * Date: 20/04/2018
 * Time: 9:42 AM
 */

namespace App\Models;


class PiCdioAssessmentSource
{
    public $Idpi;
    public $CodePi;
    public $DescriptionPi;
    public $Cdios;
    public $MappingCourses;
    public $AssessmentCourses = array();


    // Constructor
    public function __construct($Idpi, $CodePi, $DescriptionPi)
    {
        $this->Idpi = $Idpi;
        $this->CodePi = $CodePi;
        $this->DescriptionPi = $DescriptionPi;
        $this->Cdios = array();
        $this->MappingCourses = array();
        $this->AssessmentCourses = array();

    }
}