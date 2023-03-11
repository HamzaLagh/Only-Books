<?php
session_start();
include "../../incl/functions.php";
$categories = getAllCatg();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>ADMIN : Profile</title>

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
                    <h1 class="h2">Listes des Categories</h1>
                    <div>
                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">ajouter</a>
                    </div>

                </div>

                <!-- liste start -->
                <div>
                    <?php 
                    if (isset($_GET['ajout']) && $_GET['ajout']=="ok") {
                       print '<div class="alert alert-success">
                       Categorie ajoutee avec succes
                   </div>';
                    }
                    ?>
                       <?php 
                    if (isset($_GET['delete']) && $_GET['delete']=="ok") {
                       print '<div class="alert alert-danger">
                       Categorie ajoutee avec succes
                   </div>';
                    }
                    ?>
                     <?php 
                    if (isset($_GET['modifier']) && $_GET['modifier']=="ok") {
                       print '<div class="alert alert-success">
                       Categorie modifiee avec succes
                   </div>';
                    }
                    ?>
                    <?php 
                    if (isset($_GET['erreur']) && $_GET['erreur']=="duplicate") {
                       print '<div class="alert alert-danger">
                       nom de categorie deja exist
                   </div>';
                    }
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($categories as $c) {
                                $i++;
                                print '<tr>
        <th scope="row">' . $i . '</th>
        <td>' . $c['nom'] . '</td>
        <td>' . $c['language'] . '</td>
        <td>
          <a data-toggle="modal" data-target="#editModal'. $c['id']. '" class="btn btn-success">modifier</a>
          <a onclick="return popUpDeleteCategorie()" href="supprimer.php?idc='. $c['id']. '" class="btn btn-danger">supprimer</a>
        </td>
      </tr>';
                            }
                            ?>

                        </tbody>
                    </table>

                </div>


            </main>
        </div>
    </div>



    <!--ajout Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout de categorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ajout.php" method="post">
                        <div class=" form-group">
                            <input type="text" name="nom" class="form-control" placeholder="nom de categorie...">
                            <textarea name="description" class="form-control" placeholder="langue "></textarea>

                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
                </form>
            </div>
        </div>
    </div>


<?php 
foreach ($categories as $index => $categorie) {?>
          <!-- modifier Modal -->
          <div class="modal fade" id="editModal<?php echo $categorie['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modification de categorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="modifier.php" method="post">
                    <input type="hidden" name="idc" value="<?php echo $categorie['id']; ?>" >
                        <div class=" form-group">
                            <input type="text" name="nom" class="form-control" value="<?php echo $categorie['nom']; ?>" placeholder="nom de categorie...">
                            <textarea name="description" class="form-control" placeholder="langue "><?php echo $categorie['language']; ?></textarea>

                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>



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