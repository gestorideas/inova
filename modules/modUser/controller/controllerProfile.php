<?php
//..........................................................................
if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
    // Captura los parametros del formulario
    session_start();
    $userName           = $_SESSION['username'];
    // Si alguna de las variables POST no existe, se inicializa a vacia
    $name  = isset($_POST['name']) ? trim ( $_POST['name'] ) : "";
    $last_name_1  = isset($_POST['last_name_1']) ? trim ( $_POST['last_name_1'] ) : "";
    $last_name_2  = isset($_POST['last_name_2']) ? trim ( $_POST['last_name_2'] ) : "";
    $email  = isset($_POST['email']) ? trim ( $_POST['email'] ) : "";
    $tags  = isset($_POST['tags']) ? trim ( $_POST['tags'] ) : "";
    updateUser ( $userName, $name, $last_name_1, $last_name_2, $email, $tags );
    header("Location: ../../modIdeas/views/mainpanel.php?action=1");
    return true; // Todo salio bien
}
else { // No hay un parametro valido
    header("Location: ../../modIdeas/views/mainpanel.php?action=1");
    return false; // Error o algo va mal
}
function updateUser ( $userName, $name, $last_name_1, $last_name_2, $email, $tags ) {
    include ("../../modUser/controller/classInovaUser.php");
    $aUser = new InovaUser ();
    $aUser->updateUser ( $userName, $name, $last_name_1, $last_name_2, $email, $tags );
}