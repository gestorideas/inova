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
            $outHTML .=  "</dd></dl>";
            $outHTML .=  "<p>". setCharSetHTML ( $field->description ) ."</p>";


            if ( $field->sold->flag == 1){
                $outHTML .=
                    "<a href='./mainpanel.php?action=6?ididea=" . $field->ididea . "' class='btn btn-primary btn-sm'>"
                    . "<span class='glyphicon glyphicon-shopping-cart'></span>&nbsp;Buy idea</a>";
            }else{
                if ( $field->sold->flag == 0){
                    $outHTML .=
                        "<a href='../controller/controllerSellIdea.php?ididea=" . $field->ididea . "' class='btn btn-default btn-sm' disabled>"
                        . "<span class='glyphicon glyphicon-euro'></span>&nbsp;Not for sale</a>";
                }else{
                    $outHTML .=
                        "<a href='../controller/controllerDetailsIdea.php?ididea=" . $field->ididea . "' class='btn btn-default btn-sm' disabled>"
                        . "<span class='glyphicon glyphicon-shopping-cart'></span>&nbsp;Sold</a>";
                }

            }
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
