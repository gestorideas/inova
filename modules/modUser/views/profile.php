<?php
include("../../modUser/controller/controllerDetailsProfile.php");
session_start();
$userName = $_SESSION['username'];
$profile = get_profile( $userName );
?>
<div class="container" style="margin-top:5%">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">My Profile</h3>
            </div>
            <div class="panel-body">

                <?php echo $profile; ?>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="checkbox">

                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
