
<?php
$conf= substr(basename($_SERVER['PHP_SELF']), 0,3);
$a='';
$b=$c='class="submenu"';
/*
if($conf=='con'){
    $b = ' class="active"';
  } else{
     $a = ' class="active"';
  } 
*/
switch($conf){

    case "das":
    $a = ' class="active"';
    break;
    case "seg":
    $b = ' class="active  submenu"';
    break;
    case "con":
    $c=  ' class="active submenu "';


}  

?>

<!--sidebar-menu-->
<div id="sidebar">
    <a href="#" class="visible-phone">
        <i class="icon icon-home"></i> Dashboard</a>
        
    <ul>
        <li <?php echo $a; ?> >
            <a href="dashboard.php">
                <i class="icon icon-home"></i>
                <span>Pantalla principal</span>
            </a>
        </li>

        <li <?php echo $b; ?> >
            <a href="#">
                <i class="icon icon-pencil"></i>
                <span>Listar cumplimiento</span>
            </a>
            <ul>
                <li><a href="seguimientoestudiante.php">Buscar estudiante</a></li>
                <li><a href="seguimientodocente.php">Buscar Docente</a></li>
                <li><a href="seguimientomateria.php">Buscar Materia</a></li>
            </ul>
            
        </li>

        <li <?php echo $c; ?> >
            <a href="#">
                <i class="icon icon-cog"></i>
                <span>Configuracion</span>
            </a>

            <ul>
                <li><a href="configuracion.php">Configurar Margen minimo</a></li>  
                <li><a href="registropersona.php">Registrar persona</a></li>
                <li><a href="registroFacultad.php">Registrar facultad</a></li>
                <li><a href="registroprograma.php">Registrar programa academico</a></li>
                <li><a href="registrodepartamento.php">Registrar departamento</a></li>
                <li><a href="registroplanestudios.php">Registrar plan de estudio</a></li>
                <li><a href="registromateria.php">Registrar Materia</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->