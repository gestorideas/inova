<?php
include "../../../modules/lib/libModals.php";
    //..........................................................................
    // Genera el listado de ideas asociadas a un autor en particular, le da el
    // formato de salida HTML, y le devuelve al dashboard para visualizar
    //..........................................................................
    function getlistResults ( $search, $idauthor ) {
        include "classInnovativeIdea.php";
        $MyIdea = new innovativeIdea ();
        $outHTML ="";
        $results = json_decode ( $MyIdea->searchIdeas ( $search, $idauthor ) );
        $arrResults = count ( $results );
        if ( $arrResults > 0 ) {
            $outHTML = "<span class='label label-danger'>Found:". $arrResults ." results</span>";
            $data = array_shift ( $results );
            for ( $i = 0; $i < $arrResults; $i++ ) {
                $outHTML .=  "<tr class='active'>";
                $outHTML .=  "<td>" . setCharSetHTML ( $data[$i]->date       ) . "</td>";
                $outHTML .=  "<td>" . setCharSetHTML ( $data[$i]->author     ) . "</td>";
                $outHTML .=  "<td>" . setCharSetHTML ( $data[$i]->title      ) . "</td>";
                $outHTML .=  "<td>" . setCharSetHTML ( $data[$i]->tags       ) . "</td>";
                $outHTML .=  "<td><span class='badge'>". $data[$i]->votes ."</span></td>";
                // Botones de accion sobre cada item de idea generado
                $outHTML .=
                    "<td><form name='frmReviewIdea' id='frmReviewIdea' method='get' action='./mainpanel.php' role='form'>"
                    ."<input type='hidden' id='action' name='action' value='4'/>"
                    ."<input type='hidden' id='idparam' name='idparam' value='" . $data[$i]->ididea . "'/>"
                    ."<button type='submit' id='btnReviewIdea' class='btn btn-info btn-sm'>"
                    ."<span class='glyphicon glyphicon-eye-open'></span>&nbsp;View details</button>"
                    ."</form></td>";
            }
        } else {
            $outHTML = "<span class='label label-danger'>No results found</span>";
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
