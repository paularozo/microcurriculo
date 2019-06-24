<!DOCTYPE html>
<html lang="en">
    <?php
    $cod = $_GET["cod"];
    $gru = $_GET["gru"];
    require_once '../../model/DAO/asignaturaDAO.php';
    require_once '../../model/DTO/asignaturaDTO.php';
    require_once '../../controllers/consultaseguimientocontroller.php';
    $algo = new consultaController();
    $list = $algo->consultaMateria($cod, $gru);
    $asig = new asignaturaDAO();
    $mat = $asig->consultar($cod);
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
            <!--breadcrumbs-->

            <!--div id="content-header">
                <div id="breadcrumb">
                    <a href="dashboard.php" title="Go to Home" class="tip-bottom">consulta microcurriculo</a>
                    <a href="#" class="current" >consulta materia</a>
                </div>
            </div-->

            <div class="container-fluid">
                <div class="row-fluid">

                    <div class="span6">
                        <a href="#">
                            <span class="label label-info">exportar datos de materia</span>
                        </a>
                    </div>


                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Informacion de materia</h5>
                        </div>
                        <div class="widget-content">

                            codigo:  <span class="label"> <?php echo $mat->getCodigo() ?> </span>
                            <br>
                            nombre: <span class="label"><?php echo $mat->getNombre() ?></span>
                            <br>
                            semestre <span class="label"><?php echo $mat->getSemestre() ?></span>
                            <br>
                            intensidad horaria <span class="label"><?php echo $mat->getIntencidad_horaria() ?></span>
                            <br>
                            creditos<span class="label"><?php echo $mat->getCreditos() ?></span>
                            <br>

                        </div>
                    </div>

                    <a href="registrogrupo.php?cod=<?php echo $mat->getCodigo(); ?>">
                        <button class="btn btn-primary">Añadir Grupo</button>
                    </a>


                    <div class="widget-box collapsible">


                        <?php
                        foreach ($list as $val) {
                          $nomgrupo = $val["grup"]->getGrupo();
                          ?>

                          <div class="widget-title">
                              <a data-toggle="collapse" href="#collapsegrupo<?php echo $nomgrupo; ?>">
                                  <h5><?php echo "Grupo " . $nomgrupo ?>  </h5>
                              </a>
                          </div>
                          <div id="collapsegrupo<?php echo $nomgrupo; ?>" class="collapse">

                              <div class="widget-content">

                                  <div class="widget-box collapsible">

                                      <?php
                                      $unidades = $val["unid"];

                                      foreach ($unidades as $datos) {
                                        $coduni = $datos['uni']->getId();

                                        $nomuni = $datos['uni']->getNombre();
                                        ?>

                                        <div class="widget-title">
                                            <a data-toggle="collapse" href="#collapseuni<?php echo $nomgrupo . $coduni; ?>">
                                                <h5><?php echo $nomuni; ?> </h5>
                                            </a>
                                        </div>

                                        <div id="collapseuni<?php echo $nomgrupo . $coduni; ?>" class="collapse">
                                            <div class="widget-content">

                                                <div class="widget-box">
                                                    <div class="widget-title">
                                                        <h5>Cumplimiento por estudiante</h5>
                                                    </div>

                                                    <div class="widget-content nopadding">
                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Codigo</th>
                                                                    <th>Nombre</th>
                                                                    <th>Calificacion</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($datos["pru"] as $estudiante) { ?>

                                                                  <tr class="odd gradeA">
                                                                      <td>
                                                                          <?php echo $estudiante[0][0]; ?>
                                                                      </td>
                                                                      <td><?php echo $estudiante[0][1]; ?></td>
                                                                      <td><?php echo $estudiante[0][2]; ?></td>
                                                                      <td>
                                                                          <a href="estudiante.php?cod=<?php echo $estudiante[0][0]; ?> ">
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
        <?php include("../includes/footer.php"); ?>
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