<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of planEstudiosDTO
 *
 * @author Camilo J
 */
class planEstudiosDTO {
    //put your code here
    private $nombre;
    private $codigo;
            
    function __construct() {
        
    }
    
    function getNombre() {
        return $this->nombre;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }


}
