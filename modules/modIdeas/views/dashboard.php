  <!-- DASHBOARD -->
            <div class="page-header">
                <h1>
                    My Brainstorming <small>Here begins a great idea...</small>
                </h1>
                <a href="./mainpanel.php?action=2" class="btn btn-warning btn-sm">
                    <span class="glyphicon glyphicon-star"></span>&nbsp;New idea
                </a>
            </div>
  <!-- TABLE -->
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Idea</th>
                        <th>Tags</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        // Obtiene e imprime la lista de ideas de un autor
                        include "../controller/controllerListIdeas.php";
                        define ( "AUTHORID", $_SESSION["username"]);
                        $listIdeas = getListIdeas ( AUTHORID );
                        echo $listIdeas;
                ?>
                </tbody>
            </table>
