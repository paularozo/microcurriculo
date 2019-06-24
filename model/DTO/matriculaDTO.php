<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of matriculaDTO
 *
 * @author Camilo J
 */
class matriculaDTO {

    //put your code here
    private $id;
    private $semestre;
    private $codigo_programa;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getSemestre() {
        return $this->semestre;
    }

    function getCodigo_programa() {
        return $this->codigo_programa;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setSemestre($semestre) {
        $this->semestre = $semestre;
    }

    function setCodigo_programa($codigo_programa) {
        $this->codigo_programa = $codigo_programa;
    }

}
