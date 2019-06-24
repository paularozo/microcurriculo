<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../model/DAO/departamentoDAO.php';
require_once '../../model/DTO/departamentoDTO.php';

/**
 * Description of departamentocontroller
 *
 * @author jerson
 */
class departamentocontroller {

  function registroDepartamento($nom, $fac) {
    $facdto = new departamentoDTO();
    $facdao = new departamentoDAO();
    $facdto->setNombre($nom);
    $facdto->setNombre_facultad($fac);

    return $facdao->guardar($facdto);
  }

}

if (isset($_GET['acc'])) {
  $accion = $_GET['acc'];

  switch ($accion) {
    case 'reg':
      $nom = $_POST['nom'];
      $fac = $_POST['facultad'];
      $facc = new departamentocontroller();
      $res = $facc->registroDepartamento($nom, $fac);

      if ($res == 'exitoso') {
        header('Location: ../../views/admin/seguimientomateria.php?ope=exito');
      } else {
        header('Location: ../../views/admin/seguimientomateria.php?ope=mal');
      }

      break;
  }
}