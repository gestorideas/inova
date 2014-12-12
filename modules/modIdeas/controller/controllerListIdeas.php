<?php
include "../../../modules/lib/libModals.php";
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
                "<td><a data-toggle='modal' data-target='#viewDetails_". $field->ididea ."' class='btn btn-info btn-sm'>"
                . "<span class='glyphicon glyphicon-eye-open'></span>&nbsp;View details</a>"
                . "<td><form name='frmEditIdea_". $field->ididea ."' id='frmEditIdea_". $field->ididea ."'"
                . " method='get' action='./mainpanel.php' role='form'>"
                . "<input type='hidden' id='action' name='action' value='7'/>"
                . "<input type='hidden' id='idparam' name='idparam' value='" . $field->ididea . "'/>"
                . "<a href='#' class='btn btn-primary btn-sm' id='btnEditIdea_". $field->ididea ."'>"
                . "<span class='glyphicon glyphicon-pencil'></span>&nbsp;Edit idea</a>"
                . "</form>"
                ."<script>$('#btnEditIdea_". $field->ididea ."').bind('click', function(event) {"
                ."$('#frmEditIdea_". $field->ididea ."').submit(); });</script>"
                . "</td>"
                . "<td><a data-toggle='modal' data-target='#ConfirmDeleteIdea_". $field->ididea ."' class='btn btn-danger btn-sm'>"
                . "<span class='glyphicon glyphicon-trash'></span>&nbsp;Delete idea</a>";


            if ( $field->sold->flag == 0){
                $outHTML .=
                    "<td><a data-toggle='modal' data-target='#SellDetails_". $field->ididea ."' class='btn btn-success btn-sm'>"
                    . "<span class='glyphicon glyphicon-euro'></span>&nbsp;Sell idea</a></td>";
            }else{
                if ( $field->sold->flag == 1){
                    $outHTML .=
                        "<td><a href='#' class='btn btn-default btn-sm' disabled>"
                        . "<span class='glyphicon glyphicon-euro'></span>&nbsp; On sale&nbsp;</a></td>";
                }else{
                    $outHTML .=
                        "<td><a href='#' class='btn btn-default btn-sm' disabled>"
                        . "<span class='glyphicon glyphicon-euro'></span>&nbsp;&nbsp;&nbsp; Sold &nbsp;&nbsp;&nbsp;&nbsp;</a></td>";
                }

            }

            $outHTML .= "</tr>";

            $idModalViewDetails = "viewDetails_". $field->ididea;
            $TitleModalViewDetails = ucfirst($field->title);
            $BodyModalViewDetails = "<p align='justify'>"
                        .ucfirst($field->description)
                        ."</p>"
                        ."<dt>Date:</dt>"
                        ."<dd>" . setCharSetHTML ( $field->date ) . "</dd>"
                        ."<dt>Tags:</dt><dd>";
                        foreach ( $field->tags as $tag ) {
                            $BodyModalViewDetails .= setCharSetHTML ( $tag );
                        }
            $outHTML .= contructModal( $idModalViewDetails, $TitleModalViewDetails, $BodyModalViewDetails, false , "Close", "" );

            $idModalSell = "SellDetails_". $field->ididea;
            $TitleModalSell = "Sell ".ucfirst($field->title);
            $BodyModalSell =
                        "<input type='price' class='form-control' id='price' name='price' placeholder='Price €' required='required'>"
                        ."<input type='hidden' id='ididea' name='ididea' value='". $field->ididea ."'/>";
            $linkModalSell = "../controller/controllerSellIdea.php";
            $outHTML .=contructModalFormPOST( $idModalSell, $TitleModalSell, $BodyModalSell, "Sell", "Close", $linkModalSell  );


            $idModalConfirmDelete = "ConfirmDeleteIdea_". $field->ididea;
            $TitleModalConfirmDelete = "Confirm Delete Idea ".ucfirst($field->title);
            $BodyModalConfirmDelete =
                "<p class='warning'>Are you sure that you want to delete this idea?</p>"
                ."<input type='hidden' id='ididea' name='ididea' value='". $field->ididea ."'/>";
            $linkModalConfirmDelete = "../controller/controllerDeleteIdea.php";
            $outHTML .=contructModalFormPOST( $idModalConfirmDelete, $TitleModalConfirmDelete, $BodyModalConfirmDelete, "Delete", "Cancel", $linkModalConfirmDelete  );

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
