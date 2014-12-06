<?php
//..........................................................................
session_start();
define ( "AUTHORID", $_SESSION["username"]); // Cambiar por el id de sesion del usuario
if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
    // Captura los parametros del formulario
    $ididea         = trim ( $_POST["ididea"] );
    $price          = trim ( $_POST["price"] );
    // Procesa los datos y hace la operacion
    sellIdea ( $ididea, $price );
    header ( "Location:../views/mainpanel.php?action=1" );
    return true; // Todo salio bien
}
else { // No hay un parametro valido
    return false; // Error o algo va mal
}
//..........................................................................

//..........................................................................
function sellIdea ( $ididea, $price ) {
    include "./classInnovativeIdea.php";
    $anIdea = new innovativeIdea ();
    $anIdea->sellIdea ( $ididea, $price );
}
//..........................................................................
?>
