<?php
require_once 'util/Conexion.php';
require_once 'DAO/personaDAO.php';
$ped= new personaDAO();
$vr = $ped->listar();
foreach ($vr as $var) { 
echo "<br>".$var->getCodigo();
echo "<br>".$var->getNombre();
echo "<br>".$var->getApellido();
echo "<br>".$var->getCorreo();
echo "<br>".$var->getContrasena();
echo "<br>".$var->getTipo();
echo "<br><br>";
}