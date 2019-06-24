<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../model/DAO/personaDAO.php';
require_once '../../model/DTO/personaDTO.php';
require_once '../../model/DAO/docenteDAO.php';
require_once '../../model/DTO/docenteDTO.php';
require_once '../../model/DAO/estudianteDAO.php';
require_once '../../model/DTO/estudianteDTO.php';
require_once '../../model/DAO/adminDAO.php';
require_once '../../model/DTO/adminDTO.php';

/**
 * Description of personacontroller
 *
 * @author jerson
 */
class personacontroller {

  function registroPersona($cod, $nom, $apel, $corr, $pass, $tipo) {

    $facdao = new personaDAO();

    $ces = new personaDTO();
    $ces->setCodigo($cod);
    $ces->setNombre($nom);
    $ces->setApellido($apel);
    $ces->setCorreo($corr);
    $ces->setContrasena($pass);
    $ces->setTipo($tipo);
    return $facdao->guardar($ces);
    //print_r($ces);
  }

}

if (isset($_GET['acc'])) {
  $accion = $_GET['acc'];

  switch ($accion) {
    case 'reg':
      $cod = $_POST['cod'];
      $nom = $_POST['nom'];
      $apel = $_POST['apel'];
      $corr = $_POST['corr'];
      $pass = $_POST['pass'];
      $tipo = $_POST['tipo'];

      $facc = new personacontroller();
      $res = $facc->registroPersona($cod, $nom, $apel, $corr, $pass, $tipo);

      if ($res == 'exitoso') {
        header('Location: ../../views/admin/seguimientomateria.php?ope=exito');
      } else {
        header('Location: ../../views/admin/seguimientomateria.php?ope=mal');
      }
      break;
  }
}