<?php
    //..........................................................................
     if ( !empty ( $_GET ) ) { // Si se recibe un parametro desde la URL
        $idIdea     = $_GET["ididea"]; // Captura el parametro de la accion a desarrollar
        unset ( $_GET["ididea"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
        include "classInnovativeIdea.php";
        $MyIdea = new innovativeIdea ();
        $MyIdea->deleteIdea ( $idIdea );
        header ( "Location:../views/mainpanel.php?action=1" );
     }
     else { // No hay un parametro valido
        unset ( $_GET["ididea"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
        header ( "Location:../../../login.php" ); // Redirecciona al inicio (login)
        exit;
     }
    //..........................................................................
?>
