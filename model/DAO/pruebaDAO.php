<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/pruebaDTO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of asignaturaDAO
 *
 * @author jerson
 */
class pruebaDAO {

    /**
     *  funcion para guardar en la base de datos
     *  en caso de haber podido guardar apropiadamente devolvera el mensaje "exitoso"
     */
    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";

        $fec = $ces->getFecha();
        $por = $ces->getPorcentaje();
        $idpr = $ces->getId_prueba();
        $idu = $ces->getId_unidad();
        $idt = $ces->getId_tema();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO prueba(fecha,porcentaje, id_prueba,'
                    . 'id_unidad,id_tema) '
                    . 'VALUES(:fec, :por , :idpr ,:idu, :idt)');


            $consulta->bindParam(':fec', $fec);
            $consulta->bindParam(':por', $por);
            $consulta->bindParam(':idpr', $idpr);
            $consulta->bindParam(':idu', $idu);
            $consulta->bindParam(':idt', $idt);

            if ($consulta->execute()) {
                $mensaje = "exitoso";
            }
        }
        $conexion = null;
        return $mensaje;
    }

    /*
     * busca con base a la id_prueba
     */

    public function consultarPorMatricula($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM prueba WHERE id_prueba= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new pruebaDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setFecha($tabla_datos[$con]["fecha"]);
            $ces->setPorcentaje($tabla_datos[$con]["porcentaje"]);
            $ces->setId_prueba($tabla_datos[$con]["id_prueba"]);
            $ces->setId_unidad($tabla_datos[$con]["id_unidad"]);
            $ces->setId_tema($tabla_datos[$con]["id_tema"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

    /*
     * busca con base a la id_unidad
     */

    public function consultarPorUnidad($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM prueba WHERE id_unidad= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();


        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new pruebaDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setFecha($tabla_datos[$con]["fecha"]);
            $ces->setPorcentaje($tabla_datos[$con]["porcentaje"]);
            $ces->setId_prueba($tabla_datos[$con]["id_prueba"]);
            $ces->setId_unidad($tabla_datos[$con]["id_unidad"]);
            $ces->setId_tema($tabla_datos[$con]["id_tema"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

    /*
     * busca con base a la id_tema
     */

    public function consultarPorTema($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM prueba WHERE id_tema= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();


        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new pruebaDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setFecha($tabla_datos[$con]["fecha"]);
            $ces->setPorcentaje($tabla_datos[$con]["porcentaje"]);
            $ces->setId_prueba($tabla_datos[$con]["id_prueba"]);
            $ces->setId_unidad($tabla_datos[$con]["id_unidad"]);
            $ces->setId_tema($tabla_datos[$con]["id_tema"]);
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
        $consulta = $conexion->prepare('DELETE FROM asignatura WHERE codigo= :idc');
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
        $consulta = $conexion->prepare('SELECT * FROM asignatura');
        $consulta->execute();
        $ces = null;
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $astraba = array();
        foreach ($tabla_datos as $con => $valor) {
            $ces = new pruebaDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setFecha($tabla_datos[$con]["fecha"]);
            $ces->setPorcentaje($tabla_datos[$con]["porcentaje"]);
            $ces->setId_prueba($tabla_datos[$con]["id_prueba"]);
            $ces->setId_unidad($tabla_datos[$con]["id_unidad"]);
            $ces->setId_tema($tabla_datos[$con]["id_tema"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

}
