<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of asignaturaDTO
 *
 * @author Camilo J
 */
class asignaturaDTO {

    //put your code here
    private $codigo;
    private $nombre;
    private $nombre_planestudio;
    private $semestre;
    private $intencidad_horaria;
    private $creditos;

    function __construct() {
        
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getNombre_planestudio() {
        return $this->nombre_planestudio;
    }

    function getSemestre() {
        return $this->semestre;
    }

    function getIntencidad_horaria() {
        return $this->intencidad_horaria;
    }

    function getCreditos() {
        return $this->creditos;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setNombre_planestudio($nombre_planestudio) {
        $this->nombre_planestudio = $nombre_planestudio;
    }

    function setSemestre($semestre) {
        $this->semestre = $semestre;
    }

    function setIntencidad_horaria($intencidad_horaria) {
        $this->intencidad_horaria = $intencidad_horaria;
    }

    function setCreditos($creditos) {
        $this->creditos = $creditos;
    }

}
