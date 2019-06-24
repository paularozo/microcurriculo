<?php

require_once '../../model/util/Conexion.php';
require_once '../../model/DTO/personaDTO.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of personaDAO
 *
 * @author jerson
 */
class personaDAO {

    public function guardar($ces) {
        $conexion = new Conexion();
        $mensaje = "Fallido";
        $cod = $ces->getCodigo();
        $nom = $ces->getNombre();
        $ape = $ces->getApellido();
        $corr = $ces->getCorreo();
        $cont = $ces->getContrasena();
        $tip = $ces->getTipo();

        if ($conexion != null) {
            $consulta = $conexion->prepare('INSERT INTO persona(codigo, nombre, apellidos , correo , contrasena , tipo )'
                    . ' VALUES(:cod, :nom,:ape ,:corr , :cont , :tip )');
            $consulta->bindParam(':cod', $cod);
            $consulta->bindParam(':nom', $nom);
            $consulta->bindParam(':ape', $ape);
            $consulta->bindParam(':corr', $corr);
            $consulta->bindParam(':cont', $cont);
            $consulta->bindParam(':tip', $tip);

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
        $consulta = $conexion->prepare('SELECT * FROM persona WHERE codigo= :idc');
        $consulta->bindParam(':idc', $id);
        $consulta->execute();


        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $ces = null;
        if (count($tabla_datos) == 1) {

            foreach ($tabla_datos as $con => $valor) {
                $ces = new personaDTO();
                $ces->setCodigo($tabla_datos[$con]["codigo"]);
                $ces->setNombre($tabla_datos[$con]["nombre"]);
                $ces->setApellido($tabla_datos[$con]["apellidos"]);
                $ces->setCorreo($tabla_datos[$con]["correo"]);
                $ces->setContrasena($tabla_datos[$con]["contrasena"]);
                $ces->setTipo($tabla_datos[$con]["tipo"]);
            }
            return $ces;
        } else {
            return null;
        }
    }

    /*
     * elimina con base a la id
     */

    public function eliminar($id) {
        $mensaje = "Fallido";
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM persona WHERE codigo= :idc');
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
        $consulta = $conexion->prepare('SELECT * FROM persona');
        $consulta->execute();
        $ces = null;

        $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $asct = array();

        foreach ($tabla_datos as $con => $valor) {
            $ces = new personaDTO();
            $ces->setCodigo($tabla_datos[$con]["codigo"]);
            $ces->setNombre($tabla_datos[$con]["nombre"]);
            $ces->setApellido($tabla_datos[$con]["apellidos"]);
            $ces->setCorreo($tabla_datos[$con]["correo"]);
            $ces->setContrasena($tabla_datos[$con]["contrasena"]);
            $ces->setTipo($tabla_datos[$con]["tipo"]);
            array_push($asct, $ces);
        }
        return $asct;
    }

}
