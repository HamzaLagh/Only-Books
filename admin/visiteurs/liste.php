<?php
session_start();
include "../../incl/functions.php";
$visiteurs = getAllUsers();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>ADMIN | visiteurs </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
</head>

<body>
<?php
          include "../template/headerAdmin.php";
    ?>

    <div class="container-fluid">
        <div class="row">
        <?php
            include "../template/navigation.php";
            ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Listes des visiteurs</h1>

                </div>

                <!-- liste start -->
                <div>
                <?php 
                    if (isset($_GET['valider']) && $_GET['valider']=="ok") {
                       print '<div class="alert alert-success">
                       Visiteur validee  avec succes
                   </div>';
                    }
                    ?>
                   
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom et Prenom</th>
                                <th scope="col">Email</th>
                                <th scope="col">N.telephone</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Adress</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($visiteurs as $i=>  $v) {
                                $i++;
                                print '<tr>
                                            <th scope="row">' . $i . '</th>
                                            <td>' . $v['nom'] . ' '.$v['prenom'].'</td>
                                            <td>'.$v['email'].'</td>
                                            <td>'.$v['telephone'].'</td>
                                            <td>'.$v['ville'].'</td>
                                            <td>'.$v['adress'].'</td>
                                            <td> <a href="valider.php?id='.$v['id'].'" class="btn btn-success">Valider</a> </td>
                                      </tr>';
                            }
                            ?>

                        </tbody>
                    </table>

                </div>


            </main>
        </div>
    </div>





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script>
        function popUpDeleteCategorie(){
            return confirm("Voulez-vous supprimer cette categorie ?");
        }
    </script>
</body>
</html>