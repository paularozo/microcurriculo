<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/matriculaDTO.php';
/**
 * Description of matriculaDAO
 *
 * @author jerson
 */
class matriculaDAO {
     public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";
        $codper = $ces->getCodigo_persona();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO administrador(codigo_persona )'
                    . ' VALUES(:codper )');
            $consulta->bindParam(':codper', $codper);
            if ($consulta->execute()) {
                $mensaje = "exitoso";
            }
        }
        $conexion = null;
        return $mensaje;
    }
}
