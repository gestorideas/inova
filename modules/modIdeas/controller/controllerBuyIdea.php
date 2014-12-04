<?php
    //..........................................................................
    // Genera los detalles asociados a la compra de la idea
    //..........................................................................
    session_start();
    define ( "AUTHORID", $_SESSION["username"] ); // Cambiar por el id de sesion del usuario
    if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
        
        // Captura los parametros del formulario
        $idIdea           = trim ( $_POST["ididea"] );
        buyIdea(AUTHORID, $idIdea);
        header("Location: ../views/mainpanel.php?action=3");

        return true;  // Todo salio bien

    }
    else {
        return false;//Error
    }
   
    //..........................................................................
    function buyIdea ( $idBuyer, $idIdea ) {
        include "./classInnovativeIdea.php";
        $anIdea = new innovativeIdea ();
        $anIdea->buyIdea( $idIdea, $idBuyer );

    }
    //..........................................................................
?>
