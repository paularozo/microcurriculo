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

                    <div class="widget-box">

                        <div class="widget-title">
                            <h5>Configurar microcurriculo de materia 1</h5>
                        </div>
                        <div class="widget-content">

                            <div class="widget-box">
                                <div class="widget-title">
                                    <h5>Unidad Actual</h5>
                                </div>
                                <div class="widget-content">

                                    <form action="#"  class="form-horizontal">

                                        <div class="control-group">
                                            <label class="control-label">Nombre </label>
                                            <div class="controls">
                                                <input type="text" name="nom">
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Numero de horas presensciales</label>
                                            <div class="controls">
                                                <input type="number" name="hpre">
                                            </div>
                                        </div>

                                        <div class="control-group">

                                            <label class="control-label">Numero de horas independientes: </label>
                                            <div class="controls">
                                                <input type="number"  name="hind">
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="widget-box">
                            <div class="widget-title">
                                <h5>Temas</h5>
                            </div>
                            <div class="widget-content">

                                <div class="widget-box">

                                    <div class="widget-content nopadding">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>tema 1</td>
                                                    <td>
                                                        <a href="contema.php">
                                                            <button class="btn btn-primary">
                                                                <i class="icon-pencil"></i> Editar
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger">
                                                            <i class="icon-trash"></i> Eliminar
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>1</td>
                                                    <td>tema 2</td>
                                                    <td>
                                                        <a href="contema.php">
                                                            <button class="btn btn-primary">
                                                                <i class="icon-pencil"></i> Editar
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger">
                                                            <i class="icon-trash"></i> Eliminar
                                                        </button>
                                                    </td>
                                                <tr class="odd gradeX">
                                                    <td>3</td>
                                                    <td>tema 3</td>
                                                    <td>
                                                        <a href="contema.php">
                                                            <button class="btn btn-primary">
                                                                <i class="icon-pencil"></i> Editar
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger">
                                                            <i class="icon-trash"></i> Eliminar
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr class="odd gradeX">
                                                    <td>4</td>
                                                    <td>tema 4</td>
                                                    <td>
                                                        <a href="contema.php">
                                                            <button class="btn btn-primary">
                                                                <i class="icon-pencil"></i> Editar
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger">
                                                            <i class="icon-trash"></i> Eliminar
                                                        </button>
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