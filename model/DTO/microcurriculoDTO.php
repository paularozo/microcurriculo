<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of microcurriculoDTO
 *
 * @author Camilo J
 */
class microcurriculoDTO {
    //put your code here
    private $id;
    private $nombre;
    private $peso;
    private $formato;
    private $archivo;
    private $id_grupo;
    
    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPeso() {
        return $this->peso;
    }

    function getFormato() {
        return $this->formato;
    }

    function getArchivo() {
        return $this->archivo;
    }

    function getIdGrupo() {
        return $this->id_grupo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setFormato($formato) {
        $this->formato = $formato;
    }

    function setArchivo($archivo) {
        $this->archivo = $archivo;
    }

    function setIdGrupo($idgrup) {
        $this->id_grupo= $idgrup;
    }


}
