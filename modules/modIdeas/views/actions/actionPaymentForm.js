var numberExp = /^[0-9]*$/;
var scExp = /^[0-9][0-9][0-9]$/;
$(document).ready(function() {
    $("#mensaje0").fadeOut();
    $("#m_name").fadeOut();
    $("#m_ccn").fadeOut();
    $("#m_sc").fadeOut();
    $("#m_paypal").fadeOut();
    $('#paypal_content').hide();
    $('#card_number_content').hide();
    $("#payment_method_1").click(function(){
        $("#paypal_username").val("");
        $("#paypal_password").val("");
        $('#paypal_content').hide();
        $('#card_number_content').show();
    });
    $("#payment_method_2").click(function(){
        $("#name_cc").val("");
        $("#card_number").val("");
        $("#security_code").val("");
        $('#card_number_content').hide();
        $('#paypal_content').show();
    });

    $('#btnConfirmBuy').click(
        function(){
            var payment_method = $('input:radio[name=payment_method]:checked').val();
            var name = $("#name_cc").val();
            var card_number = $("#card_number").val();
            var security_code = $("#security_code").val();
            var paypal_username = $("#paypal_username").val();
            var paypal_password = $("#paypal_password").val();
            if ( payment_method == "paypal" ){
                if ( paypal_username == "" ){
                    $("#m_paypal").fadeIn().delay(1500).fadeOut('slow');
                    return false;
                }
                if ( paypal_password == "" ){
                    $("#m_paypal").fadeIn().delay(1500).fadeOut('slow');
                    return false;
                }
                // return false;
            }else{
                if ( payment_method == "credit_card" ){
                    if ( name == "" ){
                        $("#m_name").fadeIn().delay(1500).fadeOut('slow');
                        return false;
                    }
                    if ( card_number == "" || !numberExp.test(card_number) ){
                        $("#m_ccn").fadeIn().delay(1500).fadeOut('slow');
                        return false;
                    }
                    if ( security_code == "" || !scExp.test(security_code)){
                        $("#m_sc").fadeIn().delay(1500).fadeOut('slow');
                        return false;
                    }
                    //return false
                }else{
                    $("#mensaje0").fadeIn().delay(1500).fadeOut('slow');
                    return false
                }
            }
        }
    );
        $("#name_cc").keyup(function () {
            if ($(this).val() != "") {
                $("#m_name").fadeOut();
                return false;
            }
        });

        $("#card_number").keyup(function () {
            if ($(this).val() != "" && numberExp.test($(this).val())) {
                $("#m_ccn").fadeOut();
                return false;
            }
        });

        $("#security_code").keyup(function () {
            if ($(this).val() != "" && scExp.test($(this).val())) {
                $("#m_sc").fadeOut();
                return false;
            }
        });
        $("#paypal_username").keyup(function(){
            if( $(this).val() != "" ){
                $("#m_paypal").fadeOut();
                return false;
            }
        });
        $("#paypal_password").keyup(function(){
            if( $(this).val() != "" ){
                $("#m_paypal").fadeOut();
                return false;
            }
        });




});