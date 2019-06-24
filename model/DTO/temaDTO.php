<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of temaDTO
 *
 * @author Camilo J
 */
class temaDTO {

    //put your code here
    private $id;
    private $idunidad;
    private $calificacion;

    private $nombre;
    private $actividad_presencial;
    private $trabajo_independiente;

    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getIdunidad() {
        return $this->idunidad;
    }

    function getCalificacion() {
        return $this->calificacion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getActividad_presencial() {
        return $this->actividad_presencial;
    }

    function getTrabajo_independiente() {
        return $this->trabajo_independiente;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setIdunidad($idunidad) {
        $this->idunidad = $idunidad;
    }
    function setCalificacion($calificacion) {
        $this->calificacion = $calificacion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setActividad_presencial($actividad_presencial) {
        $this->actividad_presencial = $actividad_presencial;
    }

    function setTrabajo_independiente($trabajo_independiente) {
        $this->trabajo_independiente = $trabajo_independiente;
    }

}
