<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/grupoDTO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccionTrabajadoDAO
 *
 * @author jerson
 */
class grupoDAO {

  /**
   *  funcion para guardar en la base de datos
   *  en caso de haber podido guardar apropiadamente devolvera el mensaje "exitoso"
   */
  public function guardar($ces) {
    $conexion = new Conexion();
    $mensaje = "Fallido";

    $cod = $ces->getCodigo_asignatura();
    $gru = $ces->getGrupo();
    $coddo = $ces->getCodigo_docente();

    if ($conexion != null) {
      $consulta = $conexion->prepare('INSERT INTO grupo(codigo_asignatura, grupo , codigo_docente ) VALUES( :cod , :gru , :cdo)');

      $consulta->bindParam(':cod', $cod);
      $consulta->bindParam(':gru', $gru);
      $consulta->bindParam(':gru', $coddo);

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

  public function consultar($id) {
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT * FROM grupo WHERE codigo_asignatura= :idc');
    $consulta->bindParam(':idc', $id);
    $consulta->execute();


    $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $ces = null;
    $astraba = array();

    foreach ($tabla_datos as $con => $valor) {
      $ces = new grupoDTO();
      $ces->setGrupo_numero($tabla_datos[$con]["grupo_numero"]);
      $ces->setCodigo_asignatura($tabla_datos[$con]["codigo_asignatura"]);
      $ces->setGrupo($tabla_datos[$con]["grupo"]);
      $ces->setCodigo_docente($tabla_datos[$con]["codigo_docente"]);
      array_push($astraba, $ces);
    }
    return $astraba;
  }

  /*
   * busca con base al codigo del docente
   */

  public function consultarDocente($id) {
    $conexion = new Conexion();
    $consulta = $conexion->prepare('SELECT * FROM grupo WHERE codigo_docente= :idc');
    $consulta->bindParam(':idc', $id);
    $consulta->execute();


    $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $ces = null;
    $astraba = array();

    foreach ($tabla_datos as $con => $valor) {
      $ces = new grupoDTO();
      $ces->setGrupo_numero($tabla_datos[$con]["grupo_numero"]);
      $ces->setCodigo_asignatura($tabla_datos[$con]["codigo_asignatura"]);
      $ces->setGrupo($tabla_datos[$con]["grupo"]);
      $ces->setCodigo_docente($tabla_datos[$con]["codigo_docente"]);
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
    $consulta = $conexion->prepare('DELETE FROM grupo WHERE grupo_numero= :idc');
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
      $ces = new grupoDTO();
      $ces->setGrupo_numero($tabla_datos[$con]["grupo_numero"]);
      $ces->setCodigo_asignatura($tabla_datos[$con]["codigo_asignatura"]);
      $ces->setGrupo($tabla_datos[$con]["grupo"]);
      $ces->setCodigo_docente($tabla_datos[$con]["codigo_docente"]);
      array_push($astraba, $ces);
    }
    return $astraba;
  }

}
