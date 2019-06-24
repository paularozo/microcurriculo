<?php 
session_start();

if (!isset($_SESSION['user'])) {

   header('Location: ../../views/login/login.php');
    } else {
        $usuario = $_SESSION['user'];
    }

 ?>