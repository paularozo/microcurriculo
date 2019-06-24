<!DOCTYPE html>
<html lang="en">
    <?php
        include("../includes/sesion.php");
    require_once '../../controllers/consultaseguimientocontroller.php';    $algo = new consultaController();
    $list = $algo->consultaMats();
//    print_r($list);
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


                    <a href="registroFacultad.php">
                        <button class="btn btn-primary">Registrar Facultad</button>
                    </a>
                    <br>
                    <h3>Facultades</h3>



                    <div class="widget-box collapsible">

                        <?php
                        $contc = 1;
                        foreach ($list as $faculs) {
                          ?>

                          <div class="widget-title">
                              <a data-toggle="collapse" href="#collapse<?php echo $contc; ?>">
                                  <h5> <?php echo $faculs['fac']; ?>  </h5>
                              </a>
                          </div>

                          <div id="collapse<?php echo $contc; ?>" class="collapse">

                              <div class="widget-content">

                                  <a href="registroprograma.php">
                                      <button class="btn btn-primary">Registrar programa</button>
                                  </a>

                                  <a href="registrodepartamento.php">
                                      <button class="btn btn-primary">Registrar Departamento</button>
                                  </a>
                                  <br>
                                  <h4>Programas</h4>


                                  <div class="widget-box collapsible">
                                      <?php
                                      $progs = $faculs['pro'];

                                      foreach ($progs as $programa) {

                                        $prognom = $programa['prog']->getNombre();
                                        $progcod = $programa['prog']->getCodigo();

                                        $planes = $programa['plan'];
                                        ?>

                                        <div class="widget-title">
                                            <a data-toggle="collapse" href="#collapsesem<?php echo $contc . $progcod; ?>">
                                                <h5> <?php echo $prognom; ?>   </h5>
                                            </a>
                                        </div>

                                        <div id="collapsesem<?php echo $contc . $progcod; ?>" class="collapse">
                                            <div class="widget-content">


                                                <a href="registroplanestudios.php?fac=<?php echo $faculs['fac']; ?>">
                                                    <button class="btn btn-primary">Registrar plan de estudio</button>
                                                </a>
                                                <br>
                                                <h4>Planes de estudio</h4>

                                                <div class="widget-box collapsible">
                                                    <?php
                                                    $contplan = 1;

                                                    foreach ($planes as $plan) {

                                                      $plannom = $plan['plan']->getNombre();
                                                      $plancod = $plan['plan']->getCodigo();

                                                      $collmospl = $contplan . $plancod;

                                                      $semestres = $plan['mat'];
                                                      ?>


                                                      <div class="widget-title">
                                                          <a data-toggle="collapse" href="#collapsesem<?php echo $contc . $progcod . $collmospl; ?>">
                                                              <h5> <?php echo $plannom; ?>  </h5>
                                                          </a>
                                                      </div>

                                                      <div id="collapsesem<?php echo $contc . $progcod . $collmospl; ?>" class="collapse">
                                                          <div class="widget-content">


                                                              <a href="registromateria.php?fac=<?php echo $plannom; ?>">
                                                                  <button class="btn btn-primary">Registrar Materia</button>
                                                              </a>


                                                              <h5>Materias</h5>
                                                              <div class="widget-box collapsible">
                                                                  <?php
                                                                  $contsem = 1;

                                                                  foreach ($semestres as $semestre) {
                                                                    ?>

                                                                    <div class="widget-title">
                                                                        <a data-toggle="collapse" href="#collapsesem<?php echo $contc . $progcod . $collmospl . $contsem; ?>">
                                                                            <h5> Semestre  <?php echo $contsem; ?>   </h5>
                                                                        </a>
                                                                    </div>

                                                                    <div id="collapsesem<?php echo $contc . $progcod . $collmospl . $contsem; ?>" class="collapse">
                                                                        <div class="widget-content">

                                                                            <div class="widget-box">
                                                                                <div class="widget-content nopadding">
                                                                                    <table class="table table-bordered table-striped">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th>Codigo</th>
                                                                                                <th>Nombre</th>
                                                                                                <th>Grupo</th>
                                                                                                <th>Docente</th>
                                                                                                <th></th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            <?php foreach ($semestre as $row) { ?>
                                                                                              <tr class="odd gradeA">
                                                                                                  <td> <?php echo $row[0]; ?> </td>
                                                                                                  <td> <?php echo $row[1]; ?> </td>
                                                                                                  <td> <?php echo $row[3]; ?> </td>
                                                                                                  <td> <?php echo $row[4]; ?></td>
                                                                                                  <td>
                                                                                                      <a href="materia.php?cod=<?php echo $row[0] . "&gru=$row[5]"; ?> ">
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
                                                                    <?php
                                                                    $contsem++;
                                                                  }
                                                                  ?>
                                                              </div>
                                                          </div>
                                                      </div>

                                                      <?php
                                                      $contplan++;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                      <?php } $contc++; ?>
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