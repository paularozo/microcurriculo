<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/planEstudiosDTO.php';

/**
 * Description of planestudioDAO
 *
 * @author jerson
 */
class planestudioDAO {

    /**
     *  funcion para guardar en la base de datos
     *  en caso de haber podido guardar apropiadamente devolvera el mensaje "exitoso"
     */
    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";
        $nom = $ces->getNombre();
        $cod = $ces->getCodigo();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO plandeestudios(nombre,codigo) VALUES(:nom, :cod)');

            $consulta->bindParam(':nom', $nom);
            $consulta->bindParam(':cod', $cod);
            if ($consulta->execute()) {
                $mensaje = "exitoso";
            }
        }
        $conexion = null;
        return $mensaje;
    }

    /*
     * busca con base al nombre del plan de estudios
     */

    public function consultar($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM plandeestudios WHERE nombre= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();


        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        if (count($tabla_datos) == 1) {

            foreach ($tabla_datos as $con => $valor) {
                $ces = new planEstudiosDTO();
                $ces->setNombre($tabla_datos[$con]["nombre"]);
                $ces->setCodigo($tabla_datos[$con]["codigo"]);
            }
            return $ces;
        } else {
            return null;
        }
    }

    /*
     * busca con base al programa del plan de estudios
     */

    public function consultarPrograma($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM plandeestudios WHERE codigo= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;

        $astraba = array();
        foreach ($tabla_datos as $con => $valor) {
            $ces = new planEstudiosDTO();
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setCodigo($tabla_datos[$con]["codigo"]);
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
        $consulta = $conexion->prepare('DELETE FROM plandeestudios WHERE nombre= :idc');
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
        $consulta = $conexion->prepare('SELECT * FROM plandeestudios');
        $consulta->execute();
        $ces = null;
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new planEstudiosDTO();
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setCodigo($tabla_datos[$con]["codigo"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

}
