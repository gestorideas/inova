<?php
    //..........................................................................
    // Genera el listado de ideas asociadas a un autor en particular, le da el
    // formato de salida HTML, y le devuelve al dashboard para visualizar
    //..........................................................................
    function getListIdeas ( $idAuthor ) {
        include "classInnovativeIdea.php";
        $MyIdea = new innovativeIdea ();
        $outHTML ="";
        $data = json_decode ( $MyIdea->listIdeas ( $idAuthor ) );
        foreach ( $data as $field ) {
            $outHTML .=  "<tr class='active'>";
            $outHTML .=  "<td>" . setCharSetHTML ( $field->date  ) . "</td>";
            $outHTML .=  "<td>" . setCharSetHTML ( $field->title ) . "</td>";
            foreach ( $field->tags as $tag ) {
                $outHTML .=  "<td>" . setCharSetHTML ( $tag ). "</td>";
            }

            // Botones de accion sobre cada item de idea generado
            $outHTML .=
                      "<td><a href='" . $field->ididea . "' class='btn btn-info btn-sm'>"
                    . "<span class='glyphicon glyphicon-eye-open'></span>&nbsp;View details</a>"
                    . "<a href='" . $field->ididea . "' class='btn btn-primary btn-sm'>"
                    . "<span class='glyphicon glyphicon-pencil'></span>&nbsp;Edit idea</a>"
                    . "<a href='../controller/controllerDeleteIdea.php?ididea=" . $field->ididea . "' class='btn btn-danger btn-sm'>"
                    . "<span class='glyphicon glyphicon-trash'></span>&nbsp;Delete idea</a>";

            if ( $field->sold->flag == 0){
                $outHTML .=
                    "<a href='../controller/controllerSellIdea.php?ididea=" . $field->ididea . "' class='btn btn-success btn-sm'>"
                    . "<span class='glyphicon glyphicon-euro'></span>&nbsp;Sell idea</a>";
            }else{
                if ( $field->sold->flag == 1){
                    $outHTML .=
                        "<a href='../controller/controllerSellIdea.php?ididea=" . $field->ididea . "' class='btn btn-default btn-sm' disabled>"
                        . "<span class='glyphicon glyphicon-euro'></span>&nbsp; On sale&nbsp;</a>";
                }else{
                    $outHTML .=
                        "<a href='../controller/controllerSellIdea.php?ididea=" . $field->ididea . "' class='btn btn-default btn-sm' disabled>"
                        . "<span class='glyphicon glyphicon-euro'></span>&nbsp;&nbsp;&nbsp; Sold &nbsp;&nbsp;&nbsp;&nbsp;</a>";
                }

            }



            $outHTML .=
                      "</td></tr>";
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


/*
error_reporting(E_ALL);
ini_set('display_errors', True);
    // [Ok] Crear
    // $MyIdea->createIdea ( "ismael camargo", "software x", "acabar con y", "tecnología, innovación" );
    // [Ok] Eliminar
    // $MyIdea->deleteIdea ( "537d12ad1b6af34dd7138722356e626f" );
*/
?>
