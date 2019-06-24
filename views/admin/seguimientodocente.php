<!DOCTYPE html>
<html lang="en">
    <?php
    require_once '../../controllers/consultaseguimientocontroller.php';
    $algo = new consultaController();
    $list = $algo->listaDocente();
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

                    </div>


                    <div class="widget-box collapsible">

                        <?php
                        $cont = 1;
                        $flag = "fac";
                        foreach ($list as $facultad) {
                          $show = $flag . $cont;
                          ?>

                          <div class="widget-title">
                              <a data-toggle="collapse" href="#collapse<?php echo $show; ?>">
                                  <h5><?php echo $facultad['fac']; ?></h5>
                              </a>
                          </div>

                          <div id="collapse<?php echo $show; ?>" class="collapse in">

                              <div class="widget-content">


                                  <div class="widget-box collapsible">

                                      <?php
                                      $flad = 'dep';
                                      $cond = 1;
                                      foreach ($facultad['dep'] as $departamento) {
                                        $colld = $flad . $cond;
                                        ?>

                                        <div class="widget-title">
                                            <a data-toggle="collapse" href="#collapse<?php echo $colld; ?>">
                                                <h5> <?php echo $departamento['dep']->getNombre(); ?> </h5>
                                            </a>
                                        </div>

                                        <div id="collapse<?php echo $colld; ?>" class="collapse in">

                                            <div class="widget-content">

                                                <div class="widget-box">
                                                    <div class="widget-content nopadding">
                                                        <?php
                                                        if (!count($departamento['pers']) == 0) {
                                                          ?>
                                                          <table class="table table-bordered table-striped">
                                                              <thead>
                                                                  <tr>
                                                                      <th>Codigo</th>
                                                                      <th>Nombre</th>
                                                                      <th>Apellido</th>
                                                                      <th></th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody>


                                                                  <?php foreach ($departamento['pers'] as $persona) {
                                                                    ?>
                                                                    <tr class="odd gradeA">
                                                                        <td><?php echo $persona->getCodigo(); ?> </td>
                                                                        <td><?php echo $persona->getNombre(); ?> </td>
                                                                        <td><?php echo $persona->getApellido(); ?>  </td>
                                                                        <td>
                                                                            <a href="materiadocente.php?cod=<?php echo $persona->getCodigo() ?>">
                                                                                <span class="label label-info">ver info</span>
                                                                            </a>
                                                                        </td>
                                                                    </tr>

                                                                  <?php } ?>

                                                              </tbody>
                                                          </table>
                                                        <?php } else { ?>
                                                          <div class="span6">
                                                              No hay docentes en el departamento
                                                          </div>

                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $cond++;
                                      }
                                      ?>
                                  </div>       
                              </div>
                          </div>
                          <?php
                          $cont++;
                        }
                        ?>
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