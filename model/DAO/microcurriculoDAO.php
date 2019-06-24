<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/pruebaDTO.php';

/**
 * Description of microcurriculoDAO
 *
 * @author jerson
 */
class microcurriculoDAO {

    /**
     *  funcion para guardar en la base de datos
     *  en caso de haber podido guardar apropiadamente devolvera el mensaje "exitoso"
     */
    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";

        $nom = $ces->getNombre();
        $pes = $ces->getPeso();
        $form = $ces->getFormato();
        $arc = $ces->getArchivo();
        $idg = $ces->getIdGrupo();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO microcurriculo(nombre,peso, formato,'
                    . 'archivo,id_grupo) VALUES(:nom, :pes ,:form ,:arc, :idg)');

            $consulta->bindParam(':nom', $nom);
            $consulta->bindParam(':pes', $pes);
            $consulta->bindParam(':form', $form);
            $consulta->bindParam(':arc', $arc);
            $consulta->bindParam(':idg', $idg);

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
        $consulta = $conexion->prepare('SELECT * FROM microcurriculo WHERE id= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new microcurriculoDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setPeso($tabla_datos[$con]["peso"]);
            $ces->setFormato($tabla_datos[$con]["formato"]);
            $ces->setArchivo($tabla_datos[$con]["arcivo"]);
            $ces->setIdGrupo($tabla_datos[$con]["id_grupo"]);
            array_push($astraba, $ces);
        }
        return $astraba;
    }

    /*
     * busca con base a la id del grupo
     */

    public function consultarPorGrupo($id) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM prueba WHERE id_grupo= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        $astraba = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new microcurriculoDTO();
            $ces->setId($tabla_datos[$con]["id"]);
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setPeso($tabla_datos[$con]["peso"]);
            $ces->setFormato($tabla_datos[$con]["formato"]);
            $ces->setArchivo($tabla_datos[$con]["arcivo"]);
            $ces->setIdGrupo($tabla_datos[$con]["id_grupo"]);
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
