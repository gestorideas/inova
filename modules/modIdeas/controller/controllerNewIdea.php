<?php
    //..........................................................................
     session_start();
     define ( "AUTHORID", $_SESSION["username"]); // Cambiar por el id de sesion del usuario
     if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
        // Captura los parametros del formulario
        $ideaTitle          = trim ( $_POST["txtIdea"] );
        $ideaDescription    = trim ( $_POST["txtIdeaDescription"] );
        $ideaTags           = trim ( $_POST["txtIdeasTags"] );
        // Procesa los datos y hace la operacion
        newIdea ( AUTHORID, $ideaTitle, $ideaDescription, $ideaTags );
        return true; // Todo salio bien
     }
     else { // No hay un parametro valido
        return false; // Error o algo va mal
     }
    //..........................................................................

    //..........................................................................
    function newIdea ( $idAuthor, $ideaTitle, $ideaDescription, $ideaTags ) {
        include "./classInnovativeIdea.php";
        $anIdea = new innovativeIdea ();
        $anIdea->createIdea ( $idAuthor, $ideaTitle, $ideaDescription, $ideaTags );
    }
    //..........................................................................
?>
