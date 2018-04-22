<?php
/**
 * Created by PhpStorm.
 * User: Esteban Aguirre
 * Date: 22/04/2018
 * Time: 12:24 PM
 */

namespace App\Models;


class AssessmentSourceBasic
{

    public $NameAssessmentSource;
    public $AssessmentMethod;
    public $DateCollection;
    public $PersonInCharge;


    public function __construct($NameAssessmentSource, $AssessmentMethod, $DateCollection, $PersonInCharge)
    {
        $this->NameAssessmentSource = $NameAssessmentSource;
        $this->AssessmentMethod = $AssessmentMethod;
        $this->DateCollection = $DateCollection;
        $this->PersonInCharge = $PersonInCharge;

    }
}