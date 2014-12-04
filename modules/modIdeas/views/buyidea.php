<?php
     //..........................................................................
     session_start (); // Definida por PHP inicia la recuperacion de una sesion
     if ( isSet ( $_SESSION["ididea"] ) ) {
        $idIdea = $_SESSION["ididea"]; // Captura la id de la idea a ver
        // Obtiene e imprime los detalles de una idea
        include "../controller/controllerDetailsBuyIdea.php";
        $detailsIdea = getDetailsIdea ( $idIdea );
     }
     else { // No hay un parametro valido
        header ( "Location:../../../index.php" ); // Redirecciona al inicio (login)
        exit;
     }
    //..........................................................................
?>
  <!-- DASHBOARD -->
            <div class="page-header">
                <h1>
                    A good idea may be better <small>Help us make it happen...</small>
                </h1>
            </div>
  <!-- DETAILS -->
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <div class="well well-sm">
                                <?php echo $detailsIdea; ?>
                        <!-- Textarea -->
                            <div class="control-group">
                                <div class="controls">
                                    <textarea id="txtCommentEntrepreneur" name="txtCommentEntrepreneur" placeholder="My comment about your idea is..." class="form-control"
                                        maxlength="999" style="resize:none">
                                    </textarea>
                                    <p class="help-block"> A brief comment for the entrepreneur</p>
                                </div>
                            </div>
 <!-- Action Buttons -->
                            <div>
                                <form role="form" method='post' action='../controller/controllerBuyIdea.php'>
                                    <input type="hidden" id="ididea" name="ididea" value="<?php echo $idIdea;?>"/>
                                    <input type="submit" id="btnConfirmBuy" name="btnConfirmBuy" class="btn btn-success btn-sm" value="Confirm Buy">

                                    <a href="./mainpanel.php?action=4" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</a>
                                </form>

                            </div>
                        </div>
                    </div>
            </div>
            <style media="screen" type="text/css">
                 .animated {
                    -webkit-transition: height 0.2s;
                    -moz-transition: height 0.2s;
                    transition: height 0.2s;
                }

                .stars {
                    margin: 10px 0;
                    font-size: 18px;
                    color: #1F003D;
                }
            </style>
            <!--<script type="text/javascript" src="./actions/actionBuyIdea.js" ></script>-->
