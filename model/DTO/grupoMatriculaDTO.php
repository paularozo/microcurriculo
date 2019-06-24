<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of grupoMatriculaDTO
 *
 * @author Camilo J
 */
class grupoMatriculaDTO {
    //put your code here
    private $id;
    private $grupo;
    
    function __construct() {
        
    }
    
    function getId() {
        return $this->id;
    }

    function getGrupo() {
        return $this->grupo;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }


}
