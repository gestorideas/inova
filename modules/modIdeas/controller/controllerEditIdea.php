<?php
    //..........................................................................
     if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
        // Captura los parametros del formulario
        $idIdea             = trim ( $_POST["txtidIdea"] );
        $ideaTitle          = trim ( $_POST["txtIdea"] );
        $ideaDescription    = trim ( $_POST["txtIdeaDescription"] );
        $ideaTags           = trim ( $_POST["txtIdeasTags"] );
        // Procesa los datos y hace la operacion
        editIdea ( $idIdea, $ideaTitle, $ideaDescription, $ideaTags );
        return true; // Todo salio bien
     }
     else { // No hay un parametro valido
        return false; // Error o algo va mal
     }
    //..........................................................................

    //..........................................................................
    function editIdea ( $idIdea, $ideaTitle, $ideaDescription, $ideaTags ) {
        include "./classInnovativeIdea.php";
        $anIdea = new innovativeIdea ();
        $anIdea->updateIdea ( $idIdea, $ideaTitle, $ideaDescription, $ideaTags );
    }
    //..........................................................................
?>
