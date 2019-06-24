<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/programaDTO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of programaDAO
 *
 * @author jerson
 */
class programaDAO {

    /**
     *  funcion para guardar en la base de datos
     *  en caso de haber podido guardar apropiadamente devolvera el mensaje "exitoso"
     */
    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";

        $nom = $ces->getNombre();
        $cod = $ces->getCodigo();
        $fac = $ces->getNombre_facultad();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO programa(nombre,codigo, nombre_facultad) VALUES(:nom, :cod , :fac)');

            $consulta->bindParam(':nom', $nom);
            $consulta->bindParam(':cod', $cod);
            $consulta->bindParam(':fac', $fac);
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
        $consulta = $conexion->prepare('SELECT * FROM programa WHERE codigo= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();


        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        if (count($tabla_datos) == 1) {

            foreach ($tabla_datos as $con => $valor) {
                $ces = new programaDTO();
                $ces->setNombre($tabla_datos[$con]["nombre"]);
                $ces->setCodigo($tabla_datos[$con]["codigo"]);
                $ces->setNombre_facultad($tabla_datos[$con]["nombre_facultad"]);
            }
            return $ces;
        } else {
            return null;
        }
    }

    /*
     * busca con base a la facultad
     */

    public function consultarFacultad($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM programa WHERE nombre_facultad= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();


        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;

        $astraba = array();
        foreach ($tabla_datos as $con => $valor) {
            $ces = new programaDTO();
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setCodigo($tabla_datos[$con]["codigo"]);
            $ces->setNombre_facultad($tabla_datos[$con]["nombre_facultad"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

    /*
     * elimina con base a la id
     */

    public function eliminar($id) {
        $mensaje = "Fallido";
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM programa WHERE codigo= :idc');
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
        $consulta = $conexion->prepare('SELECT * FROM programa');
        $consulta->execute();
        $ces = null;

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        $astraba = array();


        foreach ($tabla_datos as $con => $valor) {
            $ces = new programaDTO();
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setCodigo($tabla_datos[$con]["codigo"]);
            $ces->setNombre_facultad($tabla_datos[$con]["nombre_facultad"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

}
