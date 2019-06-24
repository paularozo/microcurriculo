<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pruebaDTO
 *
 * @author Camilo J
 */
class pruebaDTO {
    //put your code here
    private $id;
    private $fecha;
    private $porcentaje;
    private $id_tema;
    private $id_prueba;
    private $id_unidad;
    
    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getPorcentaje() {
        return $this->porcentaje;
    }

    function getId_tema() {
        return $this->id_tema;
    }

    function getId_prueba() {
        return $this->id_prueba;
    }

    function getId_unidad() {
        return $this->id_unidad;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setPorcentaje($porcentaje) {
        $this->porcentaje = $porcentaje;
    }

    function setId_tema($id_tema) {
        $this->id_tema = $id_tema;
    }

    function setId_prueba($id_prueba) {
        $this->id_prueba = $id_prueba;
    }

    function setId_unidad($id_unidad) {
        $this->id_unidad = $id_unidad;
    }


}
