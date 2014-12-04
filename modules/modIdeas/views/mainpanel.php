<?php
     session_start();
     // Si no se ha inciado sesion, se redirecciona a la página principal
     if(! isset($_SESSION["username"])){
         header("Location: ../../../index.php");
         exit;
     }
    //..........................................................................
     if ( !empty ( $_GET ) ) { // Si se recibe un parametro desde la URL
        $action     = $_GET["action"]; // Captura el parametro de la accion a desarrollar
        $idparam    = ""; // Parametro auxiliar para funcionalidades adicionales en ciertas interfaces
        if ( !empty ( $_GET["idparam"] ) ) {
            $idparam = $_GET["idparam"];
            unset ( $_GET["idparam"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
            session_start();
            $_SESSION["ididea"] = $idparam;
        }
        unset ( $_GET["action"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
        include "../controller/controllerGUI.php"; // Controlador de los modulos a cargar segun la accion recibida
        $showModule = buildModulesContents ( $action ); // Funcion declarada en << controllerGUI.php >>
     }
     else { // No hay un parametro valido
        unset ( $_GET["action"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
        header ( "Location:../../../login.php" ); // Redirecciona al inicio (login)
        exit;
     }
    //..........................................................................
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
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <nav class="navbar navbar-default navbar-inverse" role="navigation">
                <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
                        <span class="icon-bar"></span><span class="icon-bar"></span>
                     </button><a class="navbar-brand" href="#">i-NOVA</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li <?php if ( $action == 1 ) { echo 'class="active"'; } ?> >
                            <a href="./mainpanel.php?action=1"><i class="glyphicon glyphicon-home"></i>&nbsp;My brainstorming</a>
                        </li>
                        <li <?php if ( $action == 3 ) { echo 'class="active"'; } ?> >
                            <a href="./mainpanel.php?action=3"><i class="glyphicon glyphicon-cloud"></i>&nbsp;¿What's going on?</a>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Look for ideas!!" >
                        </div><button type="submit" class="btn btn-success btn-sm">Search</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp;<?php session_start(); echo $_SESSION["username"];?>&nbsp;<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#"><i class="glyphicon glyphicon-user"></i>&nbsp;My Account</a>
                                </li>
                                <li>
                                    <a href="#"><i class="glyphicon glyphicon-cog"></i>&nbsp;Settings</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="../../modUser/views/login.php"><i class="glyphicon glyphicon-lock"></i>&nbsp;Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
                    <?php
                        // Carga el modulo de GUI segun la accion del usuario
                        include $showModule;
                    ?>
        </div>
    </div>
</div>
</body>
</html>
