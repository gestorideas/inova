<?php
    //..........................................................................
    // Genera los detalles asociados a una idea en particular, le da el
    // formato de salida HTML, y le devuelve al dashboard para visualizar
    //..........................................................................
    function getDetailsIdea ( $idIdea ) {
        include "classInnovativeIdea.php";
        $MyIdea = new innovativeIdea ();
        $outHTML ="";
        $data = json_decode ( $MyIdea->getIdeaDetails ( $idIdea ) );
        $outHTML .=  "<dl class='dl-horizontal'>";
        foreach ( $data as $field ) {
            $outHTML .=  "<dt>Title:</dt>";
            $outHTML .=  "<dd>" . setCharSetHTML ( $field->title      ) . "</dd>";
            $outHTML .=  "<dt>Author:</dt>";
            $outHTML .=  "<dd>" . setCharSetHTML ( $field->author ) . "</dd>";
            $outHTML .=  "<dt>Date:</dt>";
            $outHTML .=  "<dd>" . setCharSetHTML ( $field->date       ) . "</dd>";
            $outHTML .=  "<dt>Tags:</dt><dd>";
            foreach ( $field->tags as $tag ) {
                $outHTML .= setCharSetHTML ( $tag );
            }
            $outHTML .=  "</dd>";
            $outHTML .=  "<dt>Price:</dt>";
            $outHTML .=  "<dd>" . setCharSetHTML ( $field->sold->price       ) . " €</dd>";
            $outHTML .=  "</dl>";
            $outHTML .=  "<p>". setCharSetHTML ( $field->description ) ."</p>";
        }
    return $outHTML;
    }

    //..........................................................................
    // Genera los detalles asociados a el precio de una idea en particular,
    // le da el formato de salida HTML, y le devuelve al dashboard para visualizar
    //..........................................................................
    function getDetailsPrice ( $idIdea ) {
        $MyIdea = new innovativeIdea ();
        $outHTML ="";
        $data = json_decode ( $MyIdea->getIdeaDetails ( $idIdea ) );
        $outHTML .=  "<dl class='dl-horizontal'>";
        foreach ( $data as $field ) {
            $outHTML .= "Are you sure that you want to buy the idea \"". $field->title . "\" for ". $field->sold->price. "€ ?";
            $outHTML .=  "</dl>";
        }
        return $outHTML;
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
