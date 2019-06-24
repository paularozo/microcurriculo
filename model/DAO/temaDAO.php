<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/temaDTO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of unidadDAO
 *
 * @author jerson
 */
class temaDAO {

    /**
     *  funcion para guardar en la base de datos
     *  en caso de haber podido guardar apropiadamente devolvera el mensaje "exitoso"
     */
    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";

        $idu = $ces->getIdunidad();
        $nom = $ces->getNombre();
        $apr = $ces->getActividad_presencial();
        $tin = $ces->getTrabajo_independiente();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO tema(id_unidad,nombre, actividadpresensial , trabajoindependiete) VALUES(:idu, :nom ,:apr , :tin)');
            $consulta->bindParam(':idu', $idu);
            $consulta->bindParam(':nom', $nom);
            $consulta->bindParam(':apr', $apr);
            $consulta->bindParam(':tin', $tin);

            if ($consulta->execute()) {
                $mensaje = "exitoso";
            }
        }
        $conexion = null;
        return $mensaje;
    }

    /*
     * busca con bas a la id de matricula y la id de la unidad
     */

    public function consultar($idm, $idu) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare("SELECT T.id , T.id_unidad , T.nombre , P.porcentaje from   tema T , unidad U , matricula M , prueba P WHERE
P.id_prueba = M.id AND M.id = :idm AND T.id = P.id_tema AND P.id_unidad =
T.id_unidad AND U.id = T.id_unidad  AND T.id_unidad =:idu ");

        $consulta->bindParam(':idm', $idm);
        $consulta->bindParam(':idu', $idu);
        $consulta->execute();
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;

        $astraba = array();
        foreach ($tabla_datos as $con => $valor) {
            $ces = new temaDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setIdunidad($tabla_datos[$con]["id_unidad"]);
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setCalificacion($tabla_datos[$con]["porcentaje"]);
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
        $consulta = $conexion->prepare('DELETE FROM tema WHERE id= :idc');
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
        $consulta = $conexion->prepare('SELECT * FROM tema');
        $consulta->execute();
        $ces = null;
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new temaDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setIdunidad($tabla_datos[$con]["id_unidad"]);
            $ces->setNombre($tabla_datos[$con]["calificacion"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

}
