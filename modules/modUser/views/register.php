

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
    <script type="text/javascript" src="./actions/validateRegister.js" ></script>
</head>
<body>
<div class="container" style="margin-top:5%">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
                <form role="form" class="registerform" method='post' action='../controller/controllerNewUser.php'  onSubmit="return validatePassword()">

                    <?php
                    if ( !empty ( $_GET ) ) { // Si se recibe un parametro desde la URL
                        $error     = $_GET["error"]; // Captura el parametro de la accion a desarrollar
                        unset ( $_GET["error"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
                        if ( $error == 1 ){
                            echo'<div class="alert alert-danger">User name does already exists</div>';
                        }else{
                            echo '<div class="alert alert-info">The fields with character * are mandatory</div>';
                        }
                    }else{
                        echo '<div class="alert alert-info">The fields with character * are mandatory</div>';
                    }
                    ?>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <div class="input-group">
                                    <input type="username" class="form-control" name="username" id="username"
                                           placeholder="Username*" required="required">

                                </div>
                                <div id="mensaje0" class="errores"> <code> Username is mandatory</code> </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="sr-only">Email address</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="exampleInputEmail1" id="exampleInputEmail1"
                                           placeholder="Email*" required="required">

                                </div>
                                <div id="mensaje3" class="errores"> <code>Email is not valid</code> </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="sr-only">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1"
                                           placeholder="Password*" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirmation" class="sr-only">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="passwordConfirmation" id="passwordConfirmation"
                                           placeholder="Confirm Password*" required="required">

                                </div>
                                <div id="mensaje5" class="errores"><code> The passwords are mandatory </code></div>
                                <div id="mensaje4" class="errores"><code>The passwords are not equals </code></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <div class="input-group">
                                    <input type="name" class="form-control" name="name" id="name"
                                           placeholder="Name*" required="required">
                                </div>
                                <div id="mensaje1" class="errores"><code> Name does not valid  </code></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="sr-only">Last Name</label>
                                <div class="input-group">
                                    <input type="last_name" class="form-control" name="last_name" id="last_name"
                                           placeholder="Last Name*" required="required">
                                </div>
                                <div id="mensaje2" class="errores"><code> Last name does not valid </code></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="sr-only">Last Name 2</label>
                                <div class="input-group">
                                    <input type="last_name_2" class="form-control" name="last_name_2" id="last_name_2"
                                           placeholder="Last Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tags" class="sr-only">Tags</label>
                                <div class="input-group">
                                    <input type="tags" class="form-control" name="tags" id="tags"
                                           placeholder="Tags">
                                </div>
                            </div>
                        </div>
                    </div>





                    <input type="submit" class="btn btn-primary btn-md login" value="REGISTER" id="register"/>
                    <p class="forgotpass"><a href="login.php" class="small">Cancel</a></p>

                </form>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">
                            I agree with the terms of the community (<a href="#">contract</a>)
                        </label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
