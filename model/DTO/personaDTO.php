<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of personaDTO
 *
 * @author jerson
 */
class personaDTO {
    //put your code here
    private $codigo;
    private $nombre;
    private $apellido;
    private $correo;
    private $contrasena;
    private $tipo;
    
    function __construct() {
        
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }


  
}
