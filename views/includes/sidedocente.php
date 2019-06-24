
<?php
$conf= substr(basename($_SERVER['PHP_SELF']), 0,3);
$a=$b='';
switch($conf){
    case "doc":
    $a = ' class="active"';
    break;
    case "con":
    $b = ' class="active"';
    break;
}
?>
<!--sidebar-menu-->
<div id="sidebar">
    <a href="#" class="visible-phone">
        <i class="icon icon-home"></i> Dashboard</a>

    <ul>

        <li  <?php echo $a; ?> >
            <a href="docdash.php">
                <i class="icon icon-home"></i>
                <span>Listar cumplimiento</span>
            </a>
        </li>

        <li <?php echo $b; ?> >
            <a href="conmaterias.php">
                <i class="icon icon-pencil"></i>
                <span>Configurar microcurriculo</span>
            </a>
        </li>

    </ul>
</div>
<!--sidebar-menu-->