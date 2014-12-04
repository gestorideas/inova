<?php
    session_start();
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>i-NOVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../../css/style.css" rel="stylesheet">
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="../../../js/html5shiv.js"></script>
    <![endif]-->
    <script type="text/javascript" src="../../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../js/jqBootstrapValidation.js"></script>
</head>
<body>
<div class="container" style="margin-top:10%">
    <div class="row">
        <div class="col-md-3 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                            <h3 class="panel-title">Member Login</h3>

                </div>
                <div class="panel-body">
                    <form role="form" class="loginform" method='post' action='../controller/controllerLogIn.php'>
                        <?php
                        if ( !empty ( $_GET ) ) { // Si se recibe un parametro desde la URL
                            $error     = $_GET["error"]; // Captura el parametro de la accion a desarrollar
                            unset ( $_GET["error"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
                            if ( $error == 1 ){
                                echo'<div class="alert alert-danger">The username does not exist</div>';
                            }else{
                                if ( $error == 2 ){
                                    echo'<div class="alert alert-danger">The password is not valid</div>';
                                }
                            }
                        }
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="sr-only">Email address</label>
                            <div class="input-group">
                                <input type="username" class="form-control" id="username" name="username"
                                       placeholder="Username" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="sr-only">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password" required="required">
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="submit" class="btn btn-primary btn-md login" value="LOG IN"/>
                        </div>

                        <p class="forgotpass"><a href="#" class="small">Forgot Password?</a></p>
                    </form>


                </div>
                <ul class="list-group">
                    <li class="list-group-item"><p class="forgotpass">Not registered?<a href="register.php"> Register here</a></p></li>
                </ul>
            </div>
        </div>
    </div>

</div>
</body>
</html>
