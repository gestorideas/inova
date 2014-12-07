<?php
function error_message( $id_div, $div_class, $error_message){
    $outHTML = "";
    $outHTML .=
                 "<div class='" .$div_class. "'>"
                ."<div id='" .$id_div. "' class='errores'>"
                ."<div class='form-group'>"
                ."<code>". $error_message ."</code>"
                ."</div>"
                ."</div>"
                ."</div>";
    return $outHTML;
}

?>
<form role="form" method='post' action='../controller/controllerBuyIdea.php' novalidate>
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
                    <input type="radio" name="payment_method" id="payment_method_1" value="credit_card">
                    <img src="../../../img/visa48x48.png" alt="visa">
                    <img src="../../../img/mastercard48x48.png" alt="mastercard">
                    <img src="../../../img/amex48x48.png" alt="amex">
                </label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>
                    <input type="radio" name="payment_method" id="payment_method_2" value="paypal">
                    <img src="../../../img/paypal48x48.png" alt="paypal">
                </label>
            </div>
        </div>
        <?php echo error_message( "mensaje0", "col-md-6 col-md-offset-3", "You need to select one payment method" ); ?>
    </div>

    <div class="row">
        <div id="card_number_content" class="col-md-6 col-md-offset-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="sr-only">Name (as it appears on your card)</label>
                        <input type="Name" class="form-control" id="name_cc" name="name_cc"
                               placeholder="Name (as it appears on your card) *" required="required">
                    </div>
                </div>
            </div>
            <?php echo error_message( "m_name", "col-md-12", "The name that appears in the credit card is mandatory" ); ?>
            <div class="form-group">
                <label for="card_number" class="sr-only">Card number (no dashes or spaces)</label>
                <input type="card_number" class="form-control" id="card_number" name="card_number"
                       placeholder="Card number (no dashes or spaces) *" required="required">
            </div>
            <?php echo error_message( "m_ccn", "col-md-12", "The credit card number is necessary" ); ?>
            <div class="row">

                <div class="col-md-6">
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
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="security_code" class="sr-only">Security code (3 on back, Amex:4 on front)</label>
                        <input type="security_code" class="form-control" id="security_code" name="security_code"
                               placeholder="Security code (3 on back, Amex:4 on front)" required="required">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <img src="../../../img/csc.png" alt="csc">
                    </div>
                </div>
                <?php echo error_message( "m_sc", "col-md-12", "The security code is necessary" ); ?>

            </div>


        </div>

        <div id="paypal_content" class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="paypal_username" class="sr-only">Paypal Username</label>
                <input type="email" class="form-control" id="paypal_username" name="paypal_username"
                       placeholder="Paypal Username (email) *" required="required">
                <label for="paypal_password" class="sr-only">Password</label>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="paypal_password" name="paypal_password"
                       placeholder="Password *" required="required">

            </div>
            <?php echo error_message( "m_paypal", "col-md-12", "Paypal credentials are necessary" ); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <textarea id="txtCommentEntrepreneur" name="txtCommentEntrepreneur"
                          placeholder="My comment about your idea is..." class="form-control"
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
    <div class="row">
        <div class="col-md-3 col-md-offset-3 text-left">
            <div class="form-group">
                <a href="./mainpanel.php?action=4" class="btn btn-danger btn-sm">
                    <span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</a>

            </div>
        </div>
        <div class="col-md-3 text-right">
            <div class="form-group">
                <input type="hidden" id="ididea" name="ididea" value="<?php echo $idIdea; ?>"/>
                <input type="submit" id="btnConfirmBuy" name="btnConfirmBuy" class="btn btn-success btn-sm"
                       value="Confirm Buy">
            </div>

        </div>
    </div>

</form>
<script type="text/javascript" src="./actions/actionPaymentForm.js"></script>