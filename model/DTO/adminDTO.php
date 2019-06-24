<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminDTO
 *
 * @author jerson
 */
class adminDTO {
    
   private $id;
   private $codigo_persona;
   
   function __construct() {
       
   }
   
   function getId() {
       return $this->id;
   }

   function getCodigo_persona() {
       return $this->codigo_persona;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setCodigo_persona($codigo_persona) {
       $this->codigo_persona = $codigo_persona;
   }

        
}
