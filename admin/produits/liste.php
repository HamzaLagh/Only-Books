<?php
session_start();
include "../../incl/functions.php";
$categories = getAllCatg();
$produits = getAllProd();
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
                    <h1 class="h2">Listes des Produits</h1>
                    <div>
                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">ajouter</a>
                    </div>

                </div>

                <!-- liste start -->
                <div>
                    <?php
                    if (isset($_GET['ajout']) && $_GET['ajout'] == "ok") {
                        print '<div class="alert alert-success">
                       Produit ajoutee avec succes
                   </div>';
                    }
                    ?>
                    <?php
                    if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
                        print '<div class="alert alert-danger">
                       Produit supprimer avec succes
                   </div>';
                    }
                    ?>
                    <?php
                    if (isset($_GET['modifier']) && $_GET['modifier'] == "ok") {
                        print '<div class="alert alert-success">
                       Produit modifiee avec succes
                   </div>';
                    }
                    ?>
                    <?php
                    if (isset($_GET['erreur']) && $_GET['erreur'] == "duplicate") {
                        print '<div class="alert alert-danger">
                       nom de Produit deja exist
                   </div>';
                    }
                    ?>

                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($produits as $i => $p) {
                                $i++;
                                print '<tr class="table-info">
                                            <th scope="row">' . $i . '</th>
                                            <td>' . $p['nom'] . '</td>
                                            <td>' . $p['description'] . '</td>
                                            <td>
                                            <a data-toggle="modal" data-target="#editModal' . $p['id'] . '" href="modifier.php?idp=' . $p['id'] . '" class="btn btn-success w-100">modifier</a>

                                            <a href="supprimer.php?idp=' . $p['id'] . '" class="btn btn-danger mt-2 w-100">supprimer</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Ajout de produit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="ajoutP.php" method="post" enctype="multipart/form-data">
                        <div class=" form-group">
                            <input type="text" name="nom" class="form-control" placeholder="nom de produit...">
                        </div>
                        <div>
                            <textarea name="description" class="form-control" placeholder="description de produit..."></textarea>
                        </div>
                        <br>
                        <div class=" form-group">
                            <input type="number" step="0.01" name="prix" class="form-control" placeholder="prix de produit...">
                        </div>
                        <div class=" form-group">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class=" form-group">
                            <select name="categorie" class="form-control">
                                <?php
                                foreach ($categories as $index => $c) {
                                    print '<option value="' . $c['id'] . '">' . $c['nom'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" name="quantite" class="form-control" placeholder="taper la quantite de produit...">

                        </div>

                        <input type="hidden" name="createur" value="<?php echo $_SESSION['id']; ?>" />


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <?php
    foreach ($produits as $i => $produit) { ?>

 <!-- modifier Modal -->
        <div class="modal fade" id="editModal<?php echo $produit['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modification de categorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
     <div class="modal-body">
        <form action="modifier.php" method="post" >

                            <input type="hidden" name="idp" value="<?php echo $produit['id']; ?>">
                            <div class=" form-group">
                                <input type="text" name="nom" class="form-control" value="<?php echo $produit['nom']; ?>" placeholder="nom de categorie...">
                            </div>
                            <div class=" form-group">
                                <textarea name="description" class="form-control" placeholder="description de categorie..."><?php echo $produit['description']; ?></textarea>
                            </div>
                            <br>
                            <div class=" form-group">
                                <input type="number" step="0.01" name="prix" class="form-control" value="<?php echo $produit['prix']; ?>" placeholder="prix de produit...">
                            </div>
                            <div class=" form-group">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class=" form-group">
                                <select name="categorie" class="form-control">
                                    <?php
                                    foreach ($categories as $index => $c) {
                                        print '<option value="' . $c['id'] . '">' . $c['nom'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class=" form-group">
                                <input type="hidden" name="createur" value=' <?php echo $_SESSION['id']; ?> '/>
                            </div>
                       <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                         </div>
                 </form>
         </div>
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
</body>

</html>