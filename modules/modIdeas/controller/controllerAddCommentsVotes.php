<?php
    //..........................................................................
     if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
        // Captura los parametros del formulario
        $comments  = trim ( $_POST["comment"] );
        $votes     = trim ( $_POST["rating"] );
        $idIdea    = trim ( $_POST["ididea"] ); // Captura la id de la idea a ver
        session_start();
        define ( "AUTHORID", $_SESSION["username"]);
       //$idAuthor = "ce6fe2caa3a4a48157ddd4a0b1e6e329";

        //session_start();--- CAUSABA UN BUG
        // Procesa los datos y hace la operacion
        if ( !isset ($votes) || $votes == 0 ) {
            $votes = 0;
        } else {
            $votes = $votes - 2;
        }

        include "./classInnovativeIdea.php";
        $anIdea = new innovativeIdea ();
        $anIdea->addComment ( $idIdea, AUTHORID, $comments );
        $anIdea->addVote ( $idIdea, $votes );

        $url = "../views/mainpanel.php?action=4&idparam=".$idIdea;
     } else { $url = "../views/mainpanel.php?action=4"; }
     header( "Location:".$url );
    //..........................................................................
?>
