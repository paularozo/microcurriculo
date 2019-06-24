<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../model/DAO/asignaturaDAO.php';
require_once '../../model/DTO/asignaturaDTO.php';

/**
 * Description of controladormateria
 *
 * @author jerson
 */
class controladormateria {

  function registroMateria($cod, $nom, $sem, $ihor, $cre, $pla) {

    $facdao = new asignaturaDAO();

    $ces = new asignaturaDTO();
    $ces->setCodigo($cod);
    $ces->setNombre($nom);
    $ces->setSemestre($sem);
    $ces->setIntencidad_horaria($ihor);
    $ces->setCreditos($cre);
    $ces->setNombre_planestudio($pla);

    //print_r($ces);
    return $facdao->guardar($ces);
  }

}

if (isset($_GET['acc'])) {
  $accion = $_GET['acc'];

  switch ($accion) {
    case 'reg':
      $cod = $_POST['cod'];
      $nom = $_POST['nom'];
      $sem = $_POST['sem'];
      $ihor = $_POST['ihor'];
      $cre = $_POST['cre'];
      $pla = $_POST['pla'];

      $facc = new controladormateria();
      $res = $facc->registroMateria($cod, $nom, $sem, $ihor, $cre, $pla);

      if ($res == 'exitoso') {
        header('Location: ../../views/admin/seguimientomateria.php?ope=exito');
      } else {
        header('Location: ../../views/admin/seguimientomateria.php?ope=mal');
      }


      break;
  }
}