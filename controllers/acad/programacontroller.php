<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../model/DAO/programaDAO.php';
require_once '../../model/DTO/programaDTO.php';

/**
 * Description of programacontroller
 *
 * @author jerson
 */
class programacontroller {

  function registroPrograma($nom, $cod, $fac) {
    $facdto = new programaDTO();
    $facdao = new programaDAO();
    $facdto->setNombre($nom);
    $facdto->setCodigo($cod);
    $facdto->setNombre_facultad($fac);

    return $facdao->guardar($facdto);
  }

}

if (isset($_GET['acc'])) {
  $accion = $_GET['acc'];

  switch ($accion) {
    case 'reg':
      $nom = $_POST['nom'];
      $cod = $_POST['cod'];
      $fac = $_POST['facultad'];
      $facc = new programacontroller();
      $res = $facc->registroprograma($nom, $cod, $fac);
      if ($res == 'exitoso') {
        header('Location: ../../views/admin/seguimientomateria.php?ope=exito');
      } else {
        header('Location: ../../views/admin/seguimientomateria.php?ope=mal');
      }
      break;
  }
}