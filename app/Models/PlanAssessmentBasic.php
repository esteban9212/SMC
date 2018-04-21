<?php
/**
 * Created by PhpStorm.
 * User: Esteban Aguirre
 * Date: 4/04/2018
 * Time: 11:01 PM
 */

namespace App\Models;


class PlanAssessmentBasic
{
    public $Idplan;
    public $Name;
    public $Ciclo;
    public $SubCiclo;
    public $Leader;
    public $Program;
    public $State;
    public $DateCreation;
    public $Author;
    public $Criterion;
    public $Description;


    // Constructor
    public function __construct($Idplan, $Name, $Ciclo, $SubCiclo, $Leader, $Program, $State, $DateCreation, $Author, $Criterion, $Description)
    {
        $this->Idplan = $Idplan;
        $this->Name = $Name;
        $this->Ciclo = $Ciclo;
        $this->SubCiclo = $SubCiclo;
        $this->Leader = $Leader;
        $this->Program = $Program;
        $this->State = $State;
        $this->DateCreation = $DateCreation;
        $this->Author = $Author;
        $this->Criterion = $Criterion;
        $this->Description = $Description;
    }


    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getLider()
    {
        return $this->lider;
    }

    /**
     * @param mixed $lider
     */
    public function setLider($lider)
    {
        $this->lider = $lider;
    }

    /**
     * @return mixed
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * @param mixed $programa
     */
    public function setPrograma($programa)
    {
        $this->programa = $programa;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param mixed $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }


}