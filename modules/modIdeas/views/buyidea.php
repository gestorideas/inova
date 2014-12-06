<?php
     //..........................................................................
     session_start (); // Definida por PHP inicia la recuperacion de una sesion
     if ( isSet ( $_SESSION["ididea"] ) ) {
        $idIdea = $_SESSION["ididea"]; // Captura la id de la idea a ver
        // Obtiene e imprime los detalles de una idea
        include "../controller/controllerDetailsBuyIdea.php";
        $detailsIdea = getDetailsIdea ( $idIdea );
        $detailsPrice = getDetailsPrice ( $idIdea );
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
                                <!--<div class="controls">-->
                                    <form role="form" method='post' action='../controller/controllerBuyIdea.php'>
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-3">
                                                <div class="form-group">
                                                    <dt>Payment Details</dt>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-3">
                                                <div class="form-group">
                                                    <label>
                                                        <input type="radio" name="payment_method" id="payment_method" value="credit_card">
                                                        <img src="../../../visa48x48.png" alt="visa">
                                                        <img src="../../../mastercard48x48.png" alt="mastercard">
                                                        <img src="../../../amex48x48.png" alt="amex">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>
                                                        <input type="radio" name="payment_method" id="payment_method" value="paypal">
                                                        <img src="../../../paypal48x48.png" alt="paypal">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group">
                                                    <label for="name" class="sr-only">Name (as it appears on your card)</label>
                                                        <input type="Name" class="form-control" id="name" name="name"
                                                               placeholder="Name (as it appears on your card)" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group">
                                                    <label for="name" class="sr-only">Card number (no dashes or spaces)</label>
                                                    <input type="card_number" class="form-control" id="card_number" name="card_number"
                                                           placeholder="Card number (no dashes or spaces)" required="required">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-3">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option>January</option>
                                                        <option>February</option>
                                                        <option>March</option>
                                                        <option>April</option>
                                                        <option>May</option>
                                                        <option>June</option>
                                                        <option>July</option>
                                                        <option>August</option>
                                                        <option>September</option>
                                                        <option>October</option>
                                                        <option>November</option>
                                                        <option>December</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <select class="form-control">
                                                        <option>2014</option>
                                                        <option>2015</option>
                                                        <option>2016</option>
                                                        <option>2017</option>
                                                        <option>2018</option>
                                                        <option>2019</option>
                                                        <option>2020</option>
                                                        <option>2021</option>
                                                        <option>2022</option>
                                                        <option>2023</option>
                                                        <option>2024</option>
                                                        <option>2025</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-3">
                                                <div class="form-group">
                                                    <label for="name" class="sr-only">Security code (3 on back, Amex:4 on front)</label>
                                                    <input type="security_code" class="form-control" id="security_code" name="security_code"
                                                           placeholder="Security code (3 on back, Amex:4 on front)" required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <img src="../../../csc.png" alt="visa">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group">
                                                    <textarea id="txtCommentEntrepreneur" name="txtCommentEntrepreneur" placeholder="My comment about your idea is..." class="form-control"
                                                              maxlength="999" style="resize:none">
                                                    </textarea>
                                                    <p class="help-block"> A brief comment for the entrepreneur</p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6 col-md-offset-3 text-center">
                                                <?php echo $detailsPrice; ?>
                                            </div>
                                        </div>
                                <!--</div>-->
                            <!--</div>-->
 <!-- Action Buttons -->
                            <!--<div>-->
                                        <div class="row">
                                            <div class="col-md-3 col-md-offset-3 text-left">
                                                <div class="form-group">
                                                    <a href="./mainpanel.php?action=4" class="btn btn-danger btn-sm">
                                                    <span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</a>

                                                </div>
                                            </div>
                                            <div class="col-md-3 text-right">
                                                <div class="form-group">
                                                    <input type="hidden" id="ididea" name="ididea" value="<?php echo $idIdea;?>"/>
                                                    <input type="submit" id="btnConfirmBuy" name="btnConfirmBuy" class="btn btn-success btn-sm" value="Confirm Buy">
                                                </div>

                                            </div>
                                        </div>






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
