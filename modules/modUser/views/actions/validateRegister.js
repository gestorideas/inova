var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
var expr1 = /^[a-zA-Z]*$/;
$(document).ready(function () {
    $("#mensaje0").fadeOut();
    $("#mensaje1").fadeOut();
    $("#mensaje2").fadeOut();
    $("#mensaje3").fadeOut();
    $("#mensaje4").fadeOut();
    $("#mensaje5").fadeOut();
    $("#register").click(function (){
        var username = $("#username").val();
        var nombre = $("#name").val();
        var apellidos = $("#last_name").val();
        var correo = $("#exampleInputEmail1").val();
        var passw = $("#exampleInputPassword1").val();
        var repass = $("#passwordConfirmation").val();

        if( username == "" ){
            $("#mensaje0").fadeIn("slow");
            return false;
        }else{
            $("#mensaje0").fadeOut();
            if(correo == "" || !expr.test(correo)){
                $("#mensaje3").fadeIn("slow");
                return false;
            }



            else{
                $("#mensaje3").fadeOut();   //Si el anterior if cumple, se oculta el error
                if(nombre == "" || !expr1.test(nombre)){
                    $("#mensaje1").fadeIn("slow"); //Muestra mensaje de error
                    return false;                  // con false sale de la secuencia
                }

                else{
                    $("#mensaje1").fadeOut();

                    if(apellidos == "" || !expr1.test(apellidos)){
                        $("#mensaje2").fadeIn("slow");
                        return false;
                    }
                    else{
                        $("#mensaje3").fadeOut();
                        if(passw == "" || repass == ""){
                            $("#mensaje5").fadeIn("slow");
                            return false;
                        }else{
                            $("#mensaje5").fadeOut();
                            if(passw != repass){
                                $("#mensaje4").fadeIn("slow");
                                return false;
                            }
                        }





                    }
                }
            }
        }



    });

    $("#username").keyup(function(){
        if( $(this).val() != "" && expr1.test($(this).val())){
            $("#mensaje0").fadeOut();
            return false;
        }
    });

    $("#name").keyup(function(){
        if( $(this).val() != "" && expr1.test($(this).val())){
            $("#mensaje1").fadeOut();
            return false;
        }
    });

    $("#last_name").keyup(function(){
        if( $(this).val() != "" && expr1.test($(this).val())){
            $("#mensaje2").fadeOut();
            return false;
        }
    });


    $("#exampleInputEmail1").keyup(function(){
        if( $(this).val() != "" && expr.test($(this).val())){
            $("#mensaje3").fadeOut();
            return false;
        }
    });

    $("#exampleInputPassword1").keyup(function(){
        if( $(this).val() != "" ){
            $("#mensaje5").fadeOut();
            return false;
        }
    });

    $("#passwordConfirmation").keyup(function(){
        if( $(this).val() != "" ){
            $("#mensaje5").fadeOut();
            return false;
        }
    });

    var valido=false;
    $("#passwordConfirmation").keyup(function(e) {
        var pass = $("#exampleInputPassword1").val();
        var re_pass=$("#passwordConfirmation").val();

        if(pass != re_pass)
        {
            $("#repass").css({"background":"#F22" }); //El input se pone rojo
            valido=true;
        }
        else if(pass == re_pass)
        {
            $("#repass").css({"background":"#8F8"}); //El input se ponen verde
            $("#mensaje4").fadeOut();
            valido=true;
        }
    });//fin keyup repass

});//fin ready