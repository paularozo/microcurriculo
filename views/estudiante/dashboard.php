<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Control de microcurriculos UFPS<</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../css/fullcalendar.css" />
        <link rel="stylesheet" href="../css/matrix-style.css" />
        <link rel="stylesheet" href="../css/matrix-media.css" />
        <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="../ss/jquery.gritter.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <?php
        include("../includes/navestudiante.php");
        include("../includes/sideestudiante.php");
        ?>

        <!--main-container-part-->
        <div id="content">
            <!--breadcrumbs-->
  <div id="content-header">
              
            </div>

            <div class="container-fluid">
                <div class="row-fluid">


                    <div class="widget-box collapsible">
                        <div class="widget-title">
                            <a data-toggle="collapse" href="#collapseOne">
                                <h5>Pruebas pendientes</h5>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse in">
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
                                                    <th>Prueba</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd gradeA">
                                                    <td>1155001</td>
                                                    <td>materia 1</td>
                                                    <td>A</td>
                                                    <td>profesor 1</td>
                                                    <td>
                                                        <a href="prueba.php"><button class="btn btn-primary">
                                                            <i class="icon-pencil"></i>Realizar prueba
                                                        </button></a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-warning">
                                                        Prueba pendiente
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr class="odd gradeB">
                                                    <td>1155002</td>
                                                    <td>materia 2</td>
                                                    <td>A</td>
                                                    <td>profesor 2</td>
                                                    <td>
                                                        <a href="prueba.php"><button class="btn btn-primary">
                                                            <i class="icon-pencil"></i>Realizar prueba
                                                        </button></a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-warning">
                                                        Prueba pendiente
                                                        </span>
                                                    </td>
                                                </tr>

                                                <tr class="odd gradeC">
                                                    <td>1155003</td>
                                                    <td>materia 3</td>
                                                    <td>B</td>
                                                    <td>profesor 3</td>
                                                    <td>
                                                        <a href="prueba.php"><button class="btn btn-primary">
                                                            <i class="icon-pencil"></i>Realizar prueba
                                                        </button></a>
                                                    </td>
                                                    <td>
                                                        <span class="label label-important">
                                                        Prueba atrasada
                                                        </span>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="widget-title">
                            <a data-toggle="collapse" href="#collapseTwo">
                                <h5>Pruebas realizadas</h5>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse">
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
                                                    <th>Prueba</th>
                                                    <th>Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <tr class="odd gradeX">
                                                    <td>1155004</td>
                                                    <td>materia 4</td>
                                                    <td>A</td>
                                                    <td>profesor 4</td>
                                                    <td>-</td>
                                                    <td>
                                                        <span class="label label-success">
                                                        Prueba realizada
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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