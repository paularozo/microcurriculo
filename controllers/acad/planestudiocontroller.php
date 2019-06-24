<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../model/DAO/planestudioDAO.php';
require_once '../../model/DTO/planEstudiosDTO.php';

/**
 * Description of planestudiocontroller
 *
 * @author jerson
 */
class planestudiocontroller {

  function registroPlanEstudio($nom, $pro) {
    $facdto = new planEstudiosDTO();
    $facdao = new planestudioDAO();
    $facdto->setNombre($nom);
    $facdto->setCodigo($pro);

    return $facdao->guardar($facdto);
  }

}

if (isset($_GET['acc'])) {
  $accion = $_GET['acc'];
  switch ($accion) {
    case 'reg':
      var_dump($_POST);
      $nom = $_POST['nom'];
      $pro = $_POST["prog"];
      $facc = new planestudiocontroller();
      $res = $facc->registroPlanEstudio($nom, $pro);
      if ($res == 'exitoso') {
        header('Location: ../../views/admin/seguimientomateria.php?ope=exito');
      } else {
        header('Location: ../../views/admin/seguimientomateria.php?ope=mal');
      }
      break;
  }
}
