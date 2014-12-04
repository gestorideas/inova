

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>i-NOVA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../../css/style.css" rel="stylesheet">
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="../../../js/html5shiv.js"></script>
    <![endif]-->
    <script type="text/javascript" src="../../../js/jquery.min.js"></script>
    <script type="text/javascript" src="../../../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../../../js/jqBootstrapValidation.js"></script>
    <script type="text/javascript" src="./actions/validateRegister.js" ></script>
</head>
<body>
<div class="container" style="margin-top:5%">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Register</h3>
            </div>
            <div class="panel-body">
                <form role="form" class="registerform" method='post' action='../controller/controllerNewUser.php'  onSubmit="return validatePassword()">

                    <?php
                    if ( !empty ( $_GET ) ) { // Si se recibe un parametro desde la URL
                        $error     = $_GET["error"]; // Captura el parametro de la accion a desarrollar
                        unset ( $_GET["error"] ); // Limpia la variable (por si el usuario cambia muchas veces, no se acumule el arreglo)
                        if ( $error == 1 ){
                            echo'<div class="alert alert-danger">User name does already exists</div>';
                        }else{
                            echo '<div class="alert alert-info">The fields with character * are mandatory</div>';
                        }
                    }else{
                        echo '<div class="alert alert-info">The fields with character * are mandatory</div>';
                    }
                    ?>
                    <div id="mensaje6" class="alert alert-danger">You need to accept the contract</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <div class="input-group">
                                    <input type="username" class="form-control" name="username" id="username"
                                           placeholder="Username*" required="required">

                                </div>
                                <div id="mensaje0" class="errores"> <code> Username is mandatory</code> </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="sr-only">Email address</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="exampleInputEmail1" id="exampleInputEmail1"
                                           placeholder="Email*" required="required">

                                </div>
                                <div id="mensaje3" class="errores"> <code>Email is not valid</code> </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="sr-only">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1"
                                           placeholder="Password*" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="passwordConfirmation" class="sr-only">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="passwordConfirmation" id="passwordConfirmation"
                                           placeholder="Confirm Password*" required="required">

                                </div>
                                <div id="mensaje5" class="errores"><code> The passwords are mandatory </code></div>
                                <div id="mensaje4" class="errores"><code>The passwords are not equals </code></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <div class="input-group">
                                    <input type="name" class="form-control" name="name" id="name"
                                           placeholder="Name*" required="required">
                                </div>
                                <div id="mensaje1" class="errores"><code> Name does not valid  </code></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="sr-only">Last Name</label>
                                <div class="input-group">
                                    <input type="last_name" class="form-control" name="last_name" id="last_name"
                                           placeholder="Last Name*" required="required">
                                </div>
                                <div id="mensaje2" class="errores"><code> Last name does not valid </code></div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="sr-only">Last Name 2</label>
                                <div class="input-group">
                                    <input type="last_name_2" class="form-control" name="last_name_2" id="last_name_2"
                                           placeholder="Last Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tags" class="sr-only">Tags</label>
                                <div class="input-group">
                                    <input type="tags" class="form-control" name="tags" id="tags"
                                           placeholder="Tags">
                                </div>
                            </div>
                        </div>
                    </div>




                    <input type="submit" class="btn btn-primary btn-md login" value="REGISTER" id="register"/>
                    <p class="forgotpass"><a href="login.php" class="small">Cancel</a></p>

                </form>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="" id="checkcontract">
                            I agree with the terms of the community (<a data-toggle="modal" data-target="#myModal">contract</a>)
                        </label>


                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Terms and conditions</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p align="justify">
                                        Terms and conditions template for website usage
                                        Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern [business name]'s relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.

                                        The term '[business name]' or 'us' or 'we' refers to the owner of the website whose registered office is [address]. Our company registration number is [company registration number and place of registration]. The term 'you' refers to the user or viewer of our website.

                                        The use of this website is subject to the following terms of use:

                                        The content of the pages of this website is for your general information and use only. It is subject to change without notice.
                                        This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be stored by us for use by third parties: [insert list of information].
                                        Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.
                                        Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.
                                        This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.
                                        All trade marks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.
                                        Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.
                                        From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).
                                        Your use of this website and any dispute arising out of such use of the website is subject to the laws of England, Northern Ireland, Scotland and Wales.
                                    </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btn-md" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
