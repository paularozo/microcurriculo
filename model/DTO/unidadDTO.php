<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of unidadDTO
 *
 * @author Camilo J
 */
class unidadDTO {
    //put your code here
    private $id;
    private $nombre;
    private $id_microcurriculo;
    private $hora_presencial;
    private $hora_independiente;
    private $hora_total;
    
    
    function __construct() {
        
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getId_microcurriculo() {
        return $this->id_microcurriculo;
    }

    function getHora_presencial() {
        return $this->hora_presencial;
    }

    function getHora_independiente() {
        return $this->hora_independiente;
    }

    function getHora_total() {
        return $this->hora_total;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setId_microcurriculo($id_microcurriculo) {
        $this->id_microcurriculo = $id_microcurriculo;
    }

    function setHora_presencial($hora_presencial) {
        $this->hora_presencial = $hora_presencial;
    }

    function setHora_independiente($hora_independiente) {
        $this->hora_independiente = $hora_independiente;
    }

    function setHora_total($hora_total) {
        $this->hora_total = $hora_total;
    }


}
