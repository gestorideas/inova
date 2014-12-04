<?php
     //..........................................................................
     session_start (); // Definida por PHP inicia la recuperacion de una sesion
     if ( isSet ( $_SESSION["ididea"] ) ) {
        $idIdea = $_SESSION["ididea"]; // Captura la id de la idea a ver
        // Obtiene e imprime los detalles de una idea
        include "../controller/controllerDetailsIdea.php";
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
 <!-- Action Buttons -->
                                <a class="btn btn-warning btn-sm" href="#" >
                                <span class="glyphicon glyphicon glyphicon-tasks"></span>&nbsp;Show comments</a>
                                <a class="btn btn-success btn-sm" href="#reviews-anchor" id="open-review-box">
                                <span class="glyphicon glyphicon-comment"></span>&nbsp;Leave a review</a>
  <!-- REVIEW -->
                                <div class="row" id="post-review-box" style="display:none;">
                                    <div class="col-md-6">
                                        <form accept-charset="UTF-8" action="" method="post">
                                            <input id="ratings-hidden" name="rating" type="hidden">
                                            <textarea class="form-control animated" cols="50" id="new-review" name="comment"
                                            placeholder="Enter your review here..." rows="5"></textarea>
                                            <div class="text-left">
                                                <div class="stars starrr" data-rating="0"><div>
                                                <button class="btn btn-success btn-sm" type="submit">
                                                <span class="glyphicon glyphicon-ok"></span>&nbsp;Save review</button>
                                                <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-left: 10px;">
                                                <span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
            <script type="text/javascript" src="./actions/actionReviewIdea.js"></script>
