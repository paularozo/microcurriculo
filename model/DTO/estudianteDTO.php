<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estudianteDTO
 *
 * @author jerson
 */
class estudianteDTO {
    private $id;
    private $codigo_persona;
    private $id_matricula;
 
    
    function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getCodigo_persona() {
        return $this->codigo_persona;
    }

    function getId_matricula() {
        return $this->id_matricula;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo_persona($codigo_persona) {
        $this->codigo_persona = $codigo_persona;
    }

    function setId_matricula($id_matricula) {
        $this->id_matricula = $id_matricula;
    }


    
}
