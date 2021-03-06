<?php
    //..........................................................................
    // Esta función es la más poderosa de todo el complejo, pues es la que
    // ejecuta y monta las peticiones y los modulos que se ejecutarán.
    // Funciona recibiendo desde el dashboard una accion del modulo a montar,
    // se arma la referencia a ese archivo de manera dinámica para referenciarlo
    //..........................................................................
    function buildModulesContents ( $action ) {
        switch ( $action ) {
            case 1: // Lista de ideas del autor
                $moduleToLoad = "dashboard.php"; break;
            case 2: // Interfaz del nueva idea
                $moduleToLoad = "newidea.php"; break;
            case 3: // Lista de todas las ideas del sitio
                $moduleToLoad = "allideas.php"; break;
            case 4: // Interfaz de revision de una idea de otro autor
                $moduleToLoad = "reviewideas.php"; break;
            case 5: // Interfaz de revision de una idea de otro autor
                $moduleToLoad = "register.php"; break;
            case 6: // Interfaz de compra de una idea de otro autor
                $moduleToLoad = "buyidea.php"; break;
            case 7: // Interfaz de compra de una idea de otro autor
                $moduleToLoad = "editidea.php"; break;
            case 8: // Interfaz de compra de una idea de otro autor
                $moduleToLoad = "../../modUser/views/profile.php"; break;
            case 9: // Interfaz con los resultados de la busqueda
                $moduleToLoad = "searchresults.php"; break;
        }
    return $moduleToLoad; // Muestra el contenido o la interfaz del modulo
    }
?>
