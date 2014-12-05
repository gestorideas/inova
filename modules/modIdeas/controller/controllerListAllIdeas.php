<?php
    //..........................................................................
    // Genera el listado de ideas asociadas a un autor en particular, le da el
    // formato de salida HTML, y le devuelve al dashboard para visualizar
    //..........................................................................
    function getListAllIdeas ( $idAuthor ) {
        include "classInnovativeIdea.php";
        $MyIdea = new innovativeIdea ();
        $outHTML ="";
        $data = json_decode ( $MyIdea->listAllIdeas ( $idAuthor ) );
        foreach ( $data as $field ) {
            $outHTML .=  "<tr class='active'>";
            $outHTML .=  "<td>" . setCharSetHTML ( $field->date       ) . "</td>";
            $outHTML .=  "<td>" . setCharSetHTML ( $field->author     ) . "</td>";
            $outHTML .=  "<td>" . setCharSetHTML ( $field->title      ) . "</td>";
            $outHTML .=  "<td>";
            foreach ( $field->tags as $tag ) {
                $outHTML .= setCharSetHTML ( $tag );
            }
            $outHTML .=  "</td>";
            $outHTML .=  "<td><span class='badge'>". $field->votes ."</span></td>";
            // Botones de accion sobre cada item de idea generado
            $outHTML .=
                "<td><form name='frmReviewIdea' id='frmReviewIdea' method='get' action='./mainpanel.php' role='form'>"
                ."<input type='hidden' id='action' name='action' value='4'/>"
                ."<input type='hidden' id='idparam' name='idparam' value='" . $field->ididea . "'/>"
                ."<button type='submit' id='btnReviewIdea' class='btn btn-info btn-sm'>"
                ."<span class='glyphicon glyphicon-eye-open'></span>&nbsp;View details</button>"
                ."</form></td>";
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
