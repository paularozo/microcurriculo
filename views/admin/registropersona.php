<!DOCTYPE html>
<html lang="en">
    <?php
  
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

                    <div class="widget-box">
                        <div class="widget-title">
                            <h5>Registrar Materia</h5>
                        </div>
                        <div class="widget-content">
                            <div class="widget-box">
                                <div class="widget-content nopadding">
                                    <form action="../../controllers/acad/personacontroller.php?acc=reg" method="post" class="form-horizontal">

                                        <div class="control-group">
                                            <label class="control-label">Codigo :</label>
                                            <div class="controls">
                                                <input type="number" name="cod" id="cod" class="span11" placeholder="1150000" required=""/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Nombre :</label>
                                            <div class="controls">
                                                <input type="text" name="nom" id="nom" class="span11" placeholder="Juan" required=""/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Apellido:</label>
                                            <div class="controls">
                                                <input type="text" name="apel" id="apel" class="span11" placeholder="pepe" required=""/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Correo</label>
                                            <div class="controls">
                                                <input type="email" name="corr" id="corr" class="span11" placeholder="alguien@algo.a" required=""/>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Contraseña:</label>
                                            <div class="controls">
                                                <input type="password" name="pass" id="pass" class="span11" placeholder="******" required="" />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Tipo de usuario</label>
                                            <div class="controls">
                                                <select id="tipo" name="tipo">
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Estudiante</option>
                                                    <option value="3">Docente</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <input type="submit" value="Guardar" class="btn btn-success">
                                        </div>

                                    </form>
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