<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/unidadDTO.php';
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
class unidadDAO {

    /**
     *  funcion para guardar en la base de datos
     *  en caso de haber podido guardar apropiadamente devolvera el mensaje "exitoso"
     */
    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";

        $nom = $ces->getNombre();
        $idm = $ces->getId_microcurriculo();
        $hpr = $ces->getHora_presencial();
        $hin = $ces->getHora_independiente();
        $hto = $ces->getHora_total();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO unidad(nombre_contenido,id_microcurriculo, horaspresenciales , horasindependientes , horatotal) VALUES(:nom, :idm , :hpr , :hin , :hto)');
            $consulta->bindParam(':nom', $nom);
            $consulta->bindParam(':idm', $idm);
            $consulta->bindParam(':hpr', $hpr);
            $consulta->bindParam(':hin', $hin);
            $consulta->bindParam(':hto', $hto);

            if ($consulta->execute()) {
                $mensaje = "exitoso";
            }
        }
        $conexion = null;
        return $mensaje;
    }

    /*
     * busca con base a la id de la asignatura
     */

    public function consultar($id, $gru) {
        $conexion = new Conexion();

        $consulta = $conexion->prepare("SELECT U.id , U.nombre_contenido ,U.id_microcurriculo ,U.horaspresenciales,U.horasindependientes , U.horatotal FROM asignatura A , unidad U , microcurriculo M ,grupo G WHERE  U.id_microcurriculo=M.id AND M.id_grupo = :idg AND G.grupo_numero =M.id_grupo AND  A.codigo = G.codigo_asignatura and G.codigo_asignatura=:idc");

        /* $consulta = $conexion->prepare("SELECT U.id , U.nombre_contenido ,"
          . " U.id_microcurriculo , U.horaspresenciales , "
          . "U.horasindependientes , U.horatotal FROM unidad U ,"
          . " microcurriculo M  ,grupo G WHERE U.id_microcurriculo="
          . " M.id AND M.codigo_asignatura = :idc AND G.codigo_asignatura="
          . "M.codigo_asignatura AND G.grupo_numero=:idg");
         */
        $consulta->bindParam(':idc', $id);
        $consulta->bindParam(':idg', $gru);
        $consulta->execute();
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;

        $astraba = array();
        foreach ($tabla_datos as $con => $valor) {
            $ces = new unidadDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setNombre($tabla_datos[$con]["nombre_contenido"]);
            $ces->setId_microcurriculo($tabla_datos[$con]["id_microcurriculo"]);
            $ces->setHora_presencial($tabla_datos[$con]["horaspresenciales"]);
            $ces->setHora_independiente($tabla_datos[$con]["horasindependientes"]);
            $ces->setHora_total($tabla_datos[$con]["horatotal"]);
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
        $consulta = $conexion->prepare('DELETE FROM unidad WHERE id= :idc');
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
        $consulta = $conexion->prepare('SELECT * FROM unidad');
        $consulta->execute();
        $ces = null;
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new unidadDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setNombre($tabla_datos[$con]["nombre_contenido"]);
            $ces->setId_microcurriculo($tabla_datos[$con]["id_microcurriculo"]);
            $ces->setHora_presencialo($tabla_datos[$con]["horaspresenciales"]);
            $ces->setHora_independiente($tabla_datos[$con]["horasindependientes"]);
            $ces->setHora_total($tabla_datos[$con]["horatotal"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

}
