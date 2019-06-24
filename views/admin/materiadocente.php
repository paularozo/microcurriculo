<!DOCTYPE html>
<html lang="en">
    <?php
    $cod = $_GET["cod"];

    require_once '../../model/DAO/docenteDAO.php';
    require_once '../../model/DTO/docenteDTO.php';
    require_once '../../model/DAO/personaDAO.php';
    require_once '../../model/DTO/personaDTO.php';
    require_once '../../controllers/consultaseguimientocontroller.php';
    $algo = new consultaController();
    $perdao = new personaDAO();
    $persona = $perdao->consultar($cod);

    $list = $algo->consultaMateriasDocente($cod);
    ?>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../css/fullcalendar.css" />
        <link rel="stylesheet" href="../css/matrix-style.css" />
        <link rel="stylesheet" href="../css/matrix-media.css" />
        <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/jquery.gritter.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <?php
        include("../includes/navadmin.php");
        include("../includes/sideadmin.php");
        ?>

        <!--main-container-part-->
        <div id="content">
            <!--breadcrumbs-->
            <div id="content-header">

            </div>

            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <a href="#">
                            <span class="label label-info">exportar datos de docente</span>
                        </a>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Informacion de docente</h5>
                        </div>
                        <div class="widget-content">

                            codigo:  <span class="label"><?php echo $persona->getCodigo(); ?> </span>
                            <br>
                            nombre: <span class="label"><?php echo $persona->getNombre(); ?></span>
                            <br>
                            apellido: <span class="label"><?php echo $persona->getApellido(); ?></span>
                            <br>
                            correo: <span class="label"><?php echo $persona->getCorreo(); ?></span>
                            <br>

                        </div>
                    </div>



                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Materias</h5>
                        </div>

                        <div class="widget-content">

                            <div class="widget-box">

                                <div class="widget-content nopadding">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Grupo</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($list as $mat) { ?>
                                              # code...

                                              <tr class="odd gradeA">
                                                  <td><?php echo $mat[0] ?> </td>
                                                  <td><?php echo $mat[1] ?></td>
                                                  <td><?php echo $mat[2] ?></td>
                                                  <td>
                                                      <a href="materia.php?<?php echo 'cod=' . $mat[0] . '&gru=' . $mat[0]; ?>">
                                                          <span class="label label-info">ver info</span>
                                                      </a>
                                                  </td>
                                              </tr>
                                            <?php } ?>




                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--end-main-container-part-->

        <!--Footer-part-->
        <?php
        include("../includes/footer.php");
        ?>
        <!--end-Footer-part-->

        <script src="../js/excanvas.min.js"></script> 
        <script src="../js/jquery.min.js"></script> 
        <script src="../js/jquery.ui.custom.js"></script> 
        <script src="../js/bootstrap.min.js"></script> 
        <script src="../js/jquery.flot.min.js"></script> 
        <script src="../js/jquery.flot.resize.min.js"></script> 
        <script src="../js/jquery.peity.min.js"></script> 
        <script src="../js/fullcalendar.min.js"></script> 
        <script src="../js/matrix.js"></script> 
        <script src="../js/matrix.dashboard.js"></script> 
        <script src="../js/jquery.gritter.min.js"></script> 
        <script src="../js/matrix.interface.js"></script> 
        <script src="../js/matrix.chat.js"></script> 
        <script src="../js/jquery.validate.js"></script> 
        <script src="../js/matrix.form_validation.js"></script> 
        <script src="../js/jquery.wizard.js"></script> 
        <script src="../js/jquery.uniform.js"></script> 
        <script src="../js/select2.min.js"></script> 
        <script src="../js/matrix.popover.js"></script> 
        <script src="../js/jquery.dataTables.min.js"></script> 
        <script src="../js/matrix.tables.js"></script> 

    </body>
</html>