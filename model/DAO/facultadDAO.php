<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/facultadDTO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of facultadDAO
 *
 * @author jerson
 */
class facultadDAO {

    /**
     *  funcion para guardar en la base de datos
     *  en caso de haber podido guardar apropiadamente devolvera el mensaje "exitoso"
     */
    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";
        $fac = $ces->getNombre();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO facultad(nombre) VALUES(:nom)');
            $consulta->bindParam(':nom', $fac);

            if ($consulta->execute()) {
                $mensaje = "exitoso";
            }
        }
        $conexion = null;
        return $mensaje;
    }

    /*
     * elimina con base a la id
     */

    public function eliminar($id) {
        $mensaje = "Fallido";
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM facultad WHERE nombre= :idc');
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
        $consulta = $conexion->prepare('SELECT * FROM facultad');
        $consulta->execute();
        $ces = null;

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $astraba = array();


        foreach ($tabla_datos as $con => $valor) {
            $ces = $tabla_datos[$con]["nombre"];

            array_push($astraba, $ces);
        }
        return $astraba;
    }

}
