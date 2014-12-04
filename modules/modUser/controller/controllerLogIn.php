<?php
//..........................................................................
if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
    // Captura los parametros del formulario
    $userName           = trim ( $_POST["username"] );
    $password           = trim ( $_POST["password"]);

    // Procesa los datos y hace la operacion
    $profile =  json_decode ( validateUser ( $userName, $password ) );
    if ($profile == 0){
        // El nombre de usuario introducido no existe
        header("Location: ../views/login.php?error=1");
    }elseif ($profile == -1){
        // El password introducido no es correcto
        header("Location: ../views/login.php?error=2");
    }else{
        // Se crea la sesion
        session_start();
        $_SESSION["username"] = $profile->$userName->_id;
        header("Location: ../../modIdeas/views/mainpanel.php?action=1");
    }

    //session_start();
    //$_SESSION["name"] = $p->name;
    return true; // Todo salio bien
}
else { // No hay un parametro valido
    return false; // Error o algo va mal
}
//..........................................................................

//..........................................................................
function validateUser ( $userName, $password ) {
    include "./classInovaUser.php";
    $aUser = new InovaUser ();
    $profile = $aUser->validateUser ( $userName, $password );
    return $profile;
}
//..........................................................................
?>
