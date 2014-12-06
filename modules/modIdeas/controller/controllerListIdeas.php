<?php
    //..........................................................................
    // Genera un modal de bootstrap 3
    //
    // @param $modalName - id del modal
    // @param $title - titulo que aparecerá en el modal
    // @param $body - Cuerpo del modal
    // @param $acept - Texto del botón con link. False si no quiere que aparezca
    // @param $cancel - Texto del botón que cierra el modal
    // @param $acept_href - link del boton $accept. False si no quiere que aparezca
    // @return string
    //..........................................................................
    function contructModal( $modalName, $title, $body, $acept, $cancel, $acept_href ){
        $outHTML ="";
        $outHTML .=
            "<div class='modal fade' id='".$modalName."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>"
        ."<div class='modal-dialog'>"
        ."<div class='modal-content'>"
        ."<div class='modal-header'>"
        ."<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>"
        ."<h3 class='modal-title' id='myModalLabel'>". $title ."</h3>"
        ."</div>"
        ."<div class='modal-body'>"
        .$body
        ."</div>"
        ."<div class='modal-footer'>";
        if ( $cancel != false ){
            $outHTML .= "<button type='button' class='btn btn-primary btn-md' data-dismiss='modal'>".$cancel."</button>";
        }
        if ( $acept != false ){
            $outHTML .= "<a class='btn btn-primary' href='". $acept_href ."' type='button' >".$acept."</a>";
        }
        $outHTML .=
        "</div>"
        ."</div>"
        ."</div>"
        ."</div>";
        return $outHTML;

    }

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
                . "<td><a href='../controller/controllerDeleteIdea.php?ididea=" . $field->ididea . "' class='btn btn-danger btn-sm'>"
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
            $BodyModalSell = "<input type='price' class='form-control' id='price' name='price' placeholder='Price €' required='required'>";
            $linkModalSell = "../controller/controllerSellIdea.php?ididea=" . $field->ididea;
            $outHTML .= contructModal( $idModalSell, $TitleModalSell, $BodyModalSell, "Sell" , "Close", $linkModalSell );

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
