<?php
    //..........................................................................
    // Genera los detalles asociados a la compra de la idea
    //..........................................................................
    session_start();
    define ( "AUTHORID", $_SESSION["username"] ); // Cambiar por el id de sesion del usuario
    if ( !empty ( $_POST ) ) { // Si se recibe un parametro desde la URL
        
        // Captura los parametros del formulario
        $idIdea           = trim ( $_POST["ididea"] );
        $name             = trim ( $_POST["name_cc"] );
        $card_number      = trim ( $_POST["card_number"] );
        $payment_method   = trim ( $_POST["payment_method"] );
        $security_code    = trim ( $_POST["security_code"] );
        $paypal_username  = trim ( $_POST["paypal_username"] );
        $txtCommentEntrepreneur = trim ( $_POST["txtCommentEntrepreneur"] );
        buyIdea(AUTHORID, $idIdea, $name, $card_number, $payment_method, $security_code, $txtCommentEntrepreneur, $paypal_username);
        header("Location: ../views/mainpanel.php?action=3");

        return true;  // Todo salio bien

    }
    else {
        return false;//Error
    }
   
    //..........................................................................
    function buyIdea ( $idBuyer, $idIdea, $name, $card_number, $payment_method, $security_code, $txtCommentEntrepreneur, $paypal_username ) {
        include "./classInnovativeIdea.php";
        $anIdea = new innovativeIdea ();
        $anIdea->buyIdea( $idIdea, $idBuyer, $name, $card_number, $payment_method, $security_code, $txtCommentEntrepreneur, $paypal_username );

    }
    //..........................................................................
?>
