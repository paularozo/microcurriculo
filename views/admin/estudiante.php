<!DOCTYPE html>
<html lang="en">
    <?php
    $cod = $_GET["cod"];
    require_once '../../model/DAO/estudianteDAO.php';
    require_once '../../model/DAO/personaDAO.php';
    require_once '../../controllers/consultaseguimientocontroller.php';

    $perdao = new personaDAO();
    $est = $perdao->consultar($cod);
    $algo = new consultaController();
    $list = $algo->consultaestudiante($cod);
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
            <div id="content-header">

            </div>

            <div class="container-fluid">
                <div class="row-fluid">

                    <div class="span6">
                        <a href="#">
                            <span class="label label-info">exportar datos de estudiante</span>
                        </a>
                    </div>

                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Informacion de estudiante</h5>
                        </div>
                        <div class="widget-content">

                            codigo:  <span class="label"><?php echo $est->getCodigo(); ?> </span>
                            <br>
                            nombre: <span class="label"><?php echo $est->getNombre(); ?></span>
                            <br>
                            apellido: <span class="label"><?php echo $est->getApellido(); ?></span>
                            <br>
                            correo: <span class="label"><?php echo $est->getCorreo(); ?></span>
                            <br>

                        </div>
                    </div>

                    <div class="span6">
                        <h3>
                            Materias matriculadas
                        </h3>
                    </div>

                    <div class="widget-box collapsible">

                        <?php
                        foreach ($list as $elemento) {

                          $mater = $elemento["materia"];
                          $mat = $mater["mat"]->getCodigo();
                          $manon = $mater["mat"]->getNombre();
                          $gru = $mater["gru"]->getGrupo();

                          $cont = $elemento["conten"];

                          $mostmat = $mat . '-' . $gru . ' ' . $manon;
                          ?>


                          <div class="widget-title">
                              <a data-toggle="collapse" href="#collapse<?php echo $mat . $gru ?>">
                                  <h5> <?php echo $mostmat ?>  </h5>
                              </a>
                          </div>

                          <div id="collapse<?php echo $mat . $gru ?>" class="collapse">

                              <div class="widget-content">

                                  <div class="widget-box collapsible">

                                      <?php
                                      foreach ($cont as $unids) {
                                        $unidad = $unids["unidad"];
                                        $nomuni = $unidad->getNombre();
                                        $temas = $unids["tema"];
                                        $uniid = $unidad->getId();
                                        $mouni = $uniid . $nomuni;
                                        ?>

                                        <div class="widget-title">
                                            <a data-toggle="collapse" href="#collapse<?php echo $mouni ?>">
                                                <h5><?php echo $nomuni; ?>  </h5>
                                            </a>
                                        </div>

                                        <div id="collapse<?php echo $mouni ?>" class="collapse">
                                            <div class="widget-content">

                                                <div class="widget-box">

                                                    <div class="widget-title">
                                                        <h5>Cumplimiento por estudiante</h5>
                                                    </div>

                                                    <div class="widget-content nopadding">

                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Tema</th>
                                                                    <th>Calificacion</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php foreach ($temas as $tema) { ?>
                                                                  <tr class="odd gradeA">
                                                                      <td> <?php echo $tema->getNombre(); ?></td>
                                                                      <td><?php echo $tema->getCalificacion(); ?></td>
                                                                  </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      <?php } ?>
                                  </div>
                              </div>
                          </div>    
                        <?php } ?>
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