<?php
     //..........................................................................
     session_start (); // Definida por PHP inicia la recuperacion de una sesion
     if ( isSet ( $_SESSION["ididea"] ) ) {
        $idIdea = $_SESSION["ididea"]; // Captura la id de la idea a ver
        // Obtiene e imprime los detalles de una idea
        include "../controller/controllerEditDetailsIdea.php";
        getEditDetailsIdea ( $idIdea );
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
                    Edit Idea <small>Briefly shows your idea...</small>
                </h1>
            </div>
  <!-- FORM CONTAINER -->
            <div id="newidea">
                <div class="row"><!-- Alignment -->
                    <div class="col-sm-offset-3 col-sm-6">
  <!-- FORM -->
                        <form name="frmEditIdea" class="well" id="frmEditIdea" novalidate role="form">
                                <legend>This is my idea...</legend>
                                <div id="info"> </div> <!-- For success/fail messages -->
                                <!-- Text input-->
                                <input type="hidden" id="txtidIdea" name="txtidIdea" value="<?php echo $idIdea; ?>"/>
                                <div class="control-group">
                                    <div class="controls">
                                        <input id="txtIdea" name="txtIdea" type="text" placeholder="My great idea!!" class="form-control"
                                        required data-validation-required-message="Please enter your idea title"
                                        value="<?php echo $_SESSION['ideatitle']; ?>" >
                                        <p class="help-block">Identify your idea with a title</p>
                                    </div>
                                </div>
                                <!-- Textarea -->
                                <div class="control-group">
                                    <div class="controls">
                                        <textarea id="txtIdeaDescription" name="txtIdeaDescription" placeholder="My idea is..." class="form-control"
                                        required data-validation-required-message="Please enter an idea description" minlength="5"
                                        data-validation-minlength-message="Min 5 characters"
                                        maxlength="999" style="resize:none"><?php echo $_SESSION['ideadescription']; ?></textarea>
                                        <p class="help-block"> A brief description of the idea</p>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="control-group">
                                    <div class="controls">
                                        <input id="txtIdeasTags" name="txtIdeasTags" type="text" placeholder="Some useful tags" class="form-control"
                                        required data-validation-required-message="Please enter some tags (separated by commas) "
                                        value="<?php echo $_SESSION['ideatags']; ?>" >
                                        <p class="help-block">Short tags to help find your ideas (separated by commas)</p>
                                    </div>
                                </div>
                                <!-- Button (Double) -->
                                <div class="control-group">
                                    <label class="control-label" for="btnSaveIdea"></label>
                                    <div class="controls">
                                        <button type="submit" id="btnSaveIdea" name="btnSaveIdea" class="btn btn-success btn-sm">
                                            <span class="glyphicon glyphicon-ok"></span>
                                            Save my idea
                                        </button>
                                        <a href="./mainpanel.php?action=1" class="btn btn-danger btn-sm">
                                            <span class="glyphicon glyphicon-remove"></span>
                                            &nbsp;Cancel
                                        </a>
                                    </div>
                                </div>
                        </form>
  <!-- FORM -->
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="./actions/actionEditIdea.js"></script>
