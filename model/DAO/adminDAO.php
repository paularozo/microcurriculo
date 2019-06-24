<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/adminDTO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminDAO
 *
 * @author jerson
 */
class adminDAO {

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

    /*
     * busca con base a la id
     */

    public function consultar($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM administrador WHERE id= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();


        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        if (count($tabla_datos) == 1) {

            foreach ($tabla_datos as $con => $valor) {
                $ces = new adminDTO();
                $ces->setId($tabla_datos[$con]["id"]);
                $ces->setCodigo_persona($tabla_datos[$con]["codigo_persona"]);
            }
            return $ces;
        } else {
            return null;
        }
    }

    /*
     * elimina con base a la id
     */

    public function eliminar($id) {
        $mensaje = "Fallido";
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM administrador WHERE id= :idc');
        $consulta->bindParam(':idc', $id);
        if ($consulta->execute()) {
            $mensaje = "exitoso";
        }
        return $mensaje;
    }

    /*
     * devuelve un array con los objetos
     * puede usar un foreach para acceder a los vlores
     *
     */

    public function listar() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM administrador');
        $consulta->execute();
        $ces = null;

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $asct = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new adminDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setIdPlanProd($tabla_datos[$con]["codigo_persona"]);
            array_push($asct, $ces);
        }
        return $asct;
    }

}
