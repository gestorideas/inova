<?php
function create_form_field( $inputType, $inputName, $inputId, $inputValue, $labelValue){
    $outHTML ="";
    $outHTML .= "<div class=\"row\">"
        ."<div class=\"col-md-6\">"
        ."<label for=\"". $inputName ."\"><h4>" .$labelValue. "</h4></label>"
        ."</div>"
        ."<div class=\"col-md-6\">"
        ."<div class=\"input-group\">"
        ."<input type=\"". $inputType ."\" class=\"form-control\" name=\"". $inputName ."\" id=\"". $inputId ."\" value=\"". $inputValue . "\" disabled>"
        ."<span class=\"input-group-btn\">"
        ."<button class=\"btn btn-warning\" type=\"button\" id=\"button_". $inputId ."\"
                onclick=\"document.profileForm.". $inputId .".disabled=!document.profileForm.". $inputId .".disabled\">Edit</button>"
        ."</span>"
        ."</div>"
        ."</div>"
        ."</div >";
    return $outHTML;

}
function get_profile( $userName ){
    $profile =  json_decode ( findUser ( $userName ) );
    $outHTML = "<form name=\"profileForm\" role=\"form\" class=\"profileForm\" method=\"post\" action=\"../../modUser/controller/controllerProfile.php\">";
    foreach ( $profile as $p ){
        $outHTML .= create_form_field( "name", "name", "name", $p->name, "Name");
        $outHTML .= create_form_field( "last_name_1", "last_name_1", "last_name_1", $p->last_name_1, "Last name");
        $outHTML .= create_form_field( "last_name_2", "last_name_2", "last_name_2", $p->last_name_2, "Last name");
        $outHTML .= create_form_field( "email", "email", "email", $p->email, "Email");
    }
    $outHTML .= "<div class=\"row\"><div class=\"col-md-12 text-right\"><input type=\"submit\" class=\"btn btn-primary btn-md login\" value=\"SAVE\" id=\"save\"/></div></div>";
    $outHTML .= "</form>";
    return $outHTML;
}


function findUser ( $userName ) {
    include ("../../modUser/controller/classInovaUser.php");
    $aUser = new InovaUser ();
    $profile = $aUser->findUser( $userName );
    return $profile;
}