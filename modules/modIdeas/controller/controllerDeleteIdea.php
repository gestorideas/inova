<?php
    //..........................................................................
     if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
        $idIdea     = $_POST["ididea"]; // Captura el parametro de la accion a desarrollar
        unset ( $_POST["ididea"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
        include "classInnovativeIdea.php";
        $MyIdea = new innovativeIdea ();
        $MyIdea->deleteIdea ( $idIdea );
        header ( "Location:../views/mainpanel.php?action=1" );
     }
     else { // No hay un parametro valido
        unset ( $_POST["ididea"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
        header ( "Location:../../../login.php" ); // Redirecciona al inicio (login)
        exit;
     }
    //..........................................................................
?>
