    //..........................................................................
    // Eventos en JQuery para tramitar las operaciones del formulario HTML y el
    // envio de datos hacia el controlador de acciones
    //..........................................................................
$(function () {
 $( "input,textarea" ).jqBootstrapValidation ( {
    preventSubmit: true,
    submitSuccess: function ( $form, event ) {
    event.preventDefault (); // Evade el comportamiento normal del formulario
       // Obtiene los valores desde la interfaz y la operacion a realizar
       var txtIdea = $( "input#txtIdea" ).val();
       var txtIdeaDescription = $( "textarea#txtIdeaDescription" ).val();
       var txtIdeasTags = $( "input#txtIdeasTags" ).val();
       // Ejecuta el envio de los datos al controlador
       $.ajax ( {
                url: "../controller/controllerNewIdea.php",
                type: "POST",
                data: { txtIdea: txtIdea, txtIdeaDescription: txtIdeaDescription, txtIdeasTags: txtIdeasTags },
                cache: false,
                success: function () { // Todo va bien
                    // Mensaje de exito
                    $( '#info' ).html( "<div class='alert alert-info'>" );
                    $( '#info > .alert-info' ).html( "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;" )
                    .append( "</button>" );
                    $( '#info > .alert-info' ).append( "<strong>Your idea has been added to your brainstorm... </strong>" );
                    $( '#info > .alert-info' ).append( '</div>' );
                    // Limpia los campos
                    $( '#frmNewIdea' ).trigger( "reset" );
                    $( '#info' ).delay( 4000 ).fadeIn(); // Hace un efecto de transicion por 4 segundos
                    $( location ).attr( "href", "./mainpanel.php?action=1"); // Redirecciona al dashboard
                },
                error: function () { // Si algo sale mal
                    // Mensaje de error
                    $( '#info' ).html( "<div class='alert alert-danger'>" );
                    $( '#info > .alert-danger' ).html( "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;" )
                    .append( "</button>" );
                    $( '#info > .alert-danger' ).append( "<strong>Sorry, it appears that an error while trying to save your idea has occurred....</strong>" );
                    $( '#info > .alert-danger' ).append( "Could you please try again? Sorry for the inconvenience!" );
                    $( '#info > .alert-danger' ).append( '</div>' );
                    $( '#info' ).append( "<a href='../../controller/controllerActions.php'>asasas</a>" );
                    // Limpia los campos
                    $( '#frmNewIdea' ).trigger( "reset" );
                },
           })
         },
         filter: function () {
                   return $( this ).is( ":visible" );
         },
       });
      $( "a[data-toggle=\"tab\"]" ).click( function (e) {
                    e.preventDefault();
                    $( this ).tab( "show" );
        });
  });

// Evento al hacer click sobre los mensajes de informacion
$( '#name' ).focus( function () {
     $( '#info' ).html('');
  });
