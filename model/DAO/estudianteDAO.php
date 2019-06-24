<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/estudianteDTO.php';
require_once '../../model/DTO/asignaturaDTO.php';
require_once '../../model/DTO/matriculaDTO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estudianteDAO
 *
 * @author jerson
 */
class estudianteDAO {

    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";
        $codper = $ces->getCodigo_persona();
        $idma = $ces->getId_matricula();
        $consulta = $conexion->prepare('INSERT INTO estudiante(codigo_persona,id_matricula )'
                . ' VALUES( :codper,:idma )');
        $consulta->bindParam(':codper', $codper);
        $consulta->bindParam(':idma', $idma);
        if ($consulta->execute()) {
            $mensaje = "exitoso";
        }
        return $mensaje;
    }

    /*
     * busca con base a la id
     */

    public function consultar($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM estudiante WHERE codigo_persona= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();


        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new estudianteDTO();
            $ces->setCodigo($tabla_datos[$con]["id"]);
            $ces->setNombre($tabla_datos[$con]["codigo_persona"]);
            $ces->setSemestre($tabla_datos[$con]["id_matricula"]);
            ;
            array_push($astraba, $con);
        }
        return $astraba;
    }

    public function obtenerMatricula($codigo) {

        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT M.* FROM matricula M , estudiante E   WHERE E.id_matricula = M.id AND E.codigo_persona = :idc');
        $consulta->bindParam(':idc', $codigo);
        $consulta->execute();
        $ces = null;
        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach ($tabla_datos as $con => $valor) {
            $ces = new matriculaDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setSemestre($tabla_datos[$con]["semestre"]);
            $ces->setCodigo_programa($tabla_datos[$con]["codigo_programa"]);
        }
        return $ces;
    }

    /*
     * busca  las mterias matriculadas con base al codigo del estudiante
     */

    public function consultarMaterias($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare("SELECT A.* , G.* FROM persona P , estudiante E , matricula M , grupo G ,asignatura A , grupomatricula GM WHERE P.codigo=:idc AND P.codigo=E.codigo_persona AND M.id = E.id_matricula AND GM.id_matricula=E.id_matricula and G.codigo_asignatura = A.codigo AND GM.grupo_numero=G.grupo_numero");
        $consulta->bindParam(':idc', $id);
        $consulta->execute();


        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;

        $astraba = array();
        foreach ($tabla_datos as $con => $valor) {
            $ces = new asignaturaDTO();
            $ces->setCodigo($tabla_datos[$con]["codigo"]);
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setSemestre($tabla_datos[$con]["semestre"]);
            $ces->setIntencidad_horaria($tabla_datos[$con]["intensidadhoraria"]);
            $ces->setCreditos($tabla_datos[$con]["creditos"]);
            $ces->setNombre_planestudio($tabla_datos[$con]["nombre_plandeestudios"]);
            $gru = new grupoDTO();
            $gru->setGrupo_numero($tabla_datos[$con]["grupo_numero"]);
            $gru->setCodigo_asignatura($tabla_datos[$con]["codigo_asignatura"]);
            $gru->setGrupo($tabla_datos[$con]["grupo"]);


            array_push($astraba, array("mat" => $ces, "gru" => $gru));
        }
        return $astraba;
    }

    /*
     * elimina con base a la id
     */

    public function eliminar($id) {
        $mensaje = "Fallido";
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM estudiante WHERE id= :idc');
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
        $consulta = $conexion->prepare('SELECT * FROM estudiante');
        $consulta->execute();
        $ces = null;

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $asct = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new estudianteDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setCodigo_persona($tabla_datos[$con]["codigo_persona"]);
            $ces->setId_matricula($tabla_datos[$con]["id_matricula"]);
            array_push($asct, $ces);
        }
        return $asct;
    }

}
