<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of docenteDTO
 *
 * @author jerson
 */
class docenteDTO {
    private $id;
    private $codigo_persona;
    private $nombre_departamento;
    private $gruponumero;
    
    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getCodigo_persona() {
        return $this->codigo_persona;
    }

    function getNombre_departamento() {
        return $this->nombre_departamento;
    }

    function getGruponumero() {
        return $this->gruponumero;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo_persona($codigo_persona) {
        $this->codigo_persona = $codigo_persona;
    }

    function setNombre_departamento($nombre_departamento) {
        $this->nombre_departamento = $nombre_departamento;
    }

    function setGruponumero($gruponumero) {
        $this->gruponumero = $gruponumero;
    }


    
}
