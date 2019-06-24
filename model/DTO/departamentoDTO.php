<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of departamentoDTO
 *
 * @author Camilo J
 */
class departamentoDTO {

    //put your code here
    private $nombre;
    private $nombre_facultad;

    function __construct() {
        
    }

    function getNombre() {
        return $this->nombre;
    }

    function getNombre_facultad() {
        return $this->nombre_facultad;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setNombre_facultad($nombre_facultad) {
        $this->nombre_facultad = $nombre_facultad;
    }

}
