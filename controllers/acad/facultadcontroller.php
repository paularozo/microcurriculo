<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../model/DAO/facultadDAO.php';
require_once '../../model/DTO/facultadDTO.php';

class facultadcontroller {

  function registroFacultad($nom) {
    $facdto = new facultadDTO();
    $facdao = new facultadDAO();
    $facdto->setNombre($nom);
    return $facdao->guardar($facdto);
  }

}

if (isset($_GET['acc'])) {
  $accion = $_GET['acc'];

  switch ($accion) {
    case 'reg':
      $nom = $_POST['nom'];
      $facc = new facultadcontroller();
      $res = $facc->registroFacultad($nom);

      if ($res == 'exitoso') {
        header('Location: ../../views/admin/seguimientomateria.php?ope=exito');
      } else {
        header('Location: ../../views/admin/seguimientomateria.php?ope=mal');
      }
      break;
  }
}


