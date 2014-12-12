  <!-- DASHBOARD -->
            <div class="page-header">
                <h1>
                    ¿Searching for ideas?<small>Look at these...</small>
                </h1>
                <small>You searched for ideas related to:
                    <?php
                        session_start();
                        $search = $_SESSION["search"];
                        echo "' " . $search . " '";
                    ?>
                </small>
              <!--   <a href="#" class="btn btn-warning btn-sm">
                    <span class="glyphicon glyphicon-filter"></span>&nbsp;Filter
                </a> -->
            </div>
  <!-- TABLE -->
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Idea</th>
                        <th>Tags</th>
                        <th>Votes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        // Obtiene e imprime la lista de ideas del sitio
                        include "../controller/controllerlistResultsSearch.php";
                        $idAuthor = $_SESSION["username"];
                        $listResults = getlistResults ( $search, $idAuthor );
                        echo $listResults;
                ?>
                </tbody>
            </table>
