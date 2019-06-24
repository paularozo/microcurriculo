<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Control de microcurriculos UFPS</title>
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
        include("../includes/navdocente.php");
        include("../includes/sidedocente.php");
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
                                <h5>Materia</h5>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse in">

                            <div class="widget-content">

                                <div class="widget-box collapsible">

                                    <div class="widget-title">
                                        <a data-toggle="collapse" href="#collapseuni1">
                                            <h5>Unidad 1</h5>
                                        </a>
                                    </div>
                                    <div id="collapseuni1" class="collapse">
                                        <div class="widget-content">

                                            <div class="widget-box">
                                                <div class="widget-content nopadding">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Tema</th>
                                                                <th>Cumplimiento</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX">
                                                                <td>Tema1</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                            <tr class="even gradeC">
                                                                <td>Tema2</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                            <tr class="odd gradeA">
                                                                <td>Tema3</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                            <tr class="even gradeA">
                                                                <td>Tema4</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="widget-title">
                                        <a data-toggle="collapse" href="#collapseuni2">
                                            <h5>Unidad 2</h5>
                                        </a>
                                    </div>
                                    <div id="collapseuni2" class="collapse">
                                        <div class="widget-content">

                                            <div class="widget-box">
                                                <div class="widget-content nopadding">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Tema</th>
                                                                <th>Cumplimiento</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX">
                                                                <td>Tema1</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                            <tr class="even gradeC">
                                                                <td>Tema2</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                            <tr class="odd gradeA">
                                                                <td>Tema3</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                            <tr class="even gradeA">
                                                                <td>Tema4</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="widget-title">
                                        <a data-toggle="collapse" href="#collapseuni3">
                                            <h5>Unidad 3</h5>
                                        </a>
                                    </div>
                                    <div id="collapseuni3" class="collapse">
                                        <div class="widget-content">

                                            <div class="widget-box">
                                                <div class="widget-content nopadding">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Tema</th>
                                                                <th>Cumplimiento</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="odd gradeX">
                                                                <td>Tema1</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                            <tr class="even gradeC">
                                                                <td>Tema2</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                            <tr class="odd gradeA">
                                                                <td>Tema3</td>
                                                                <td>80 %</td>
                                                            </tr>
                                                            <tr class="even gradeA">
                                                                <td>Tema4</td>
                                                                <td>80 %</td>
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


                        <div class="widget-title">
                            <a data-toggle="collapse" href="#collapseTwo">
                                <h5>Carrera 2</h5>
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse">
                            <div class="widget-content">
                                This box is now open
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