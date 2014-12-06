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
        "<div class='modal fade' id='". $modalName ."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>"
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
        $outHTML .= "<button type='button' class='btn btn-primary btn-md' data-dismiss='modal'>". $cancel ."</button>";
    }
    if ( $acept != false ){
        $outHTML .= "<a class='btn btn-primary' href='". $acept_href ."' type='button' >". $acept ."</a>";
    }
    $outHTML .=
        "</div>"
        ."</div>"
        ."</div>"
        ."</div>";
    return $outHTML;

}

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
function contructModalFormPOST( $modalName, $title, $body, $acept, $cancel, $action  ){
    $outHTML ="";
    $outHTML .=
        "<div class='modal fade' id='". $modalName ."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>"
        ."<div class='modal-dialog'>"
        ."<div class='modal-content'>"
        ."<div class='modal-header'>"
        ."<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>"
        ."<h3 class='modal-title' id='myModalLabel'>". $title ."</h3>"
        ."</div>"
        ."<div class='modal-body'>"
        ."<form name='frmModal_". $modalName ."' method='post' action='". $action ."' role='form'>"
        .$body
        ."</div>"
        ."<div class='modal-footer'>";
    if ( $cancel != false ){
        $outHTML .= "<button type='button' class='btn btn-primary btn-md' data-dismiss='modal'>". $cancel ."</button>";
    }
    if ( $acept != false ){
        $outHTML .= "<input type='submit' class='btn btn-primary' value=". $acept . " >";
    }
    $outHTML .=
        "</div>"
        ."</div>"
        ."</form>"
        ."</div>"
        ."</div>";
    return $outHTML;

}