<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Control de microcurriculos ufps</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="post"  action="../../controllers/login/logincontroller.php">

                <div class="control-group normal_text">
                    <h3>
                        <img src="../img/logo.png" alt="Logo"/>
                    </h3>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="cod" id="cod" placeholder="Codigo" />
                        </div>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="con" id="con" placeholder="Contraseña" />
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <label>
                        <input type="checkbox" name="radios" />
                        Mantener sesion iniciada
                    </label>
                    <span class="pull-left">
                        <input type="submit" name="" value="entrar" class="btn-success">
                    </span>
                    <span class="pull-right">
                        <a href="#" class="flip-link btn btn-info" id="to-recover">Olvido su contraseña?</a>
                    </span>
                </div>

            </form>

            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Ingrese su correo electronico para enviarle un correo de recuperacion</p>

                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                    </div>
                </div>

                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Regresar al login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>

        <script src="../js/jquery.min.js"></script>  
        <script src="../js/matrix.login.js"></script> 
       
    </body>

</html>
