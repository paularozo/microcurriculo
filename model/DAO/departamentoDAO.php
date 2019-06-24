<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/facultadDTO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of departamentoDAO
 *
 * @author jerson
 */
class departamentoDAO {

    /**
     *  funcion para guardar en la base de datos
     *  en caso de haber podido guardar apropiadamente devolvera el mensaje "exitoso"
     */
    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";
        $nom = $ces->getNombre();
        $nomf = $ces->getNombre_facultad();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO departamento(nombre , nombre_facultad) VALUES(:nom, :nomf)');
            $consulta->bindParam(':nom', $nom);
            $consulta->bindParam(':nomf', $nomf);

            if ($consulta->execute()) {
                $mensaje = "exitoso";
            }
        }
        $conexion = null;
        return $mensaje;
    }

    /*
     * busca con base a la facultad
     */

    public function consultarporFacultad($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM departamento WHERE nombre_facultad =:idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new departamentoDTO();
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setNombre_facultad($tabla_datos[$con]["nombre_facultad"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

    /*
     * busca con base a la id
     */

    public function consultar($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM departamento WHERE nombre =:idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        foreach ($tabla_datos as $con => $valor) {
            $ces = new departamentoDTO();
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setNombre_facultad($tabla_datos[$con]["nombre_facultad"]);
        }
        return $ces;
    }

    /*
     * elimina con base a la id
     */

    public function eliminar($id) {
        $mensaje = "Fallido";
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM departamento WHERE nombre= :idc');
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
        $consulta = $conexion->prepare('SELECT * FROM departamento');
        $consulta->execute();
        $ces = null;

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $astraba = array();


        foreach ($tabla_datos as $con => $valor) {
            $ces = new departamentoDTO();
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setNombre_facultad($tabla_datos[$con]["nombre_facultad"]);

            array_push($astraba, $ces);
        }
        return $astraba;
    }

}
