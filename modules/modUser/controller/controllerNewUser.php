<?php
//..........................................................................
if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
    // Captura los parametros del formulario
    $userName           = trim ( $_POST["username"] );
    $email              = trim ( $_POST["exampleInputEmail1"] );
    $name               = trim ( $_POST["name"] );
    $lastName_1         = trim ( $_POST["last_name"] );
    $lastName_2         = trim ( $_POST["last_name_2"] );
    $tags               = trim ( $_POST["tags"] );
    $password           = trim ( $_POST["exampleInputPassword1"]);

    // Procesa los datos y hace la operacion
    if (newUser ( $userName, $name, $lastName_1, $lastName_2, $email, $tags , $password) == 0){
        header("Location: ../views/login.php");
    }else{
        header("Location: ../views/register.php?error=1");
    }

    return true; // Todo salio bien
}
else { // No hay un parametro valido
    return false; // Error o algo va mal
}
//..........................................................................

//..........................................................................
function newUser ( $userName, $name, $lastName_1, $lastName_2, $email, $tags , $password) {
    include "./classInovaUser.php";
    $aUser = new InovaUser ();
    return $aUser->addUser ( $userName, $name, $lastName_1, $lastName_2, $email, $tags , $password);
}
//..........................................................................
?>
