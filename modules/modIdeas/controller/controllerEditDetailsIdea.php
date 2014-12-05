<?php
    //..........................................................................
    // Genera los detalles asociados a una idea en particular, los asocia a una
    // variable de sesion y los devuelve a edicion en la interfaz
    //..........................................................................
    function getEditDetailsIdea ( $idIdea ) {
        include "classInnovativeIdea.php";
        $MyIdea = new innovativeIdea ();
        $outTAGS="";
        $data = json_decode ( $MyIdea->getIdeaDetails ( $idIdea ) );
        session_start (); // Definida por PHP inicia la recuperacion de una sesion
        foreach ( $data as $field ) {
            $_SESSION["ideatitle"] = setCharSetHTML ( $field->title );
            foreach ( $field->tags as $tag ) {
                $outTAGS .= setCharSetHTML ( $tag );
            }
            $_SESSION["ideatags"]        = setCharSetHTML ( $outTAGS );
            $_SESSION["ideadescription"] = setCharSetHTML ( $field->description );
        }
    }
    //..........................................................................

    //..........................................................................
    // Normalizar los caracteres a codigos HTML para presentacion Web (tildes, acentos)
    //..........................................................................
    function setCharSetHTML ( $field ) {
    $valueReturn =
                    htmlentities ( ucwords ( utf8_encode ( $field ) ),
                                   ENT_QUOTES, "UTF-8" );
    return $valueReturn;
    }
    //..........................................................................
?>
