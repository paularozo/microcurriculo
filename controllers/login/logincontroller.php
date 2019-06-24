<?php
require_once '../../model/util/Conexion.php';
require_once '../../model/DAO/personaDAO.php';

session_start();

if (!isset($_SESSION['user'])) {
 
    $nom = $_POST["cod"];
    $pass = $_POST["con"];

    $ped = new personaDAO();
    $vr = $ped->consultar($nom);

    $hash = $vr->getContrasena();
    $tipo = $vr->getTipo();

    if ($pass == $hash) {
        echo '¡La contraseña es válida!';
        $_SESSION['user'] = $vr;

        switch ($tipo) {
        	case 1:
        		   header('Location: ../../views/admin/dashboard.php');
        		break;
        	case 2:
        		   header('Location: ../../views/estudiante/dashboard.php');
        		break;
        	case 3:
        		   header('Location: ../../views/docente/docdash.php');
        		break;
        }

    } else {
        echo 'La contraseña no es válida';
    }

} else {
    $tipo =  $_SESSION['user']->getTipo();

    switch ($tipo) {
        case 1:
               header('Location: ../../views/admin/dashboard.php');
            break;
        case 2:
               header('Location: ../../views/estudiante/dashboard.php');
            break;
        case 3:
               header('Location: ../../views/docente/docdash.php');
            break;
    }

} 

?>
