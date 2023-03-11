<?php
session_start();
include "../../incl/functions.php";

if (isset($_POST['btnSubmit'])) {
    //changer ete de panier
    changerEtatPanier($_POST);
}

$commandes = getAllCommandes();
$paniers = getAllPaniers();

if (isset($_POST['btnSearch'])) {
    if ($_POST['etat']=="tout") {
        $paniers = getAllPaniers();
    }else {
        $paniers=getPanierByEtat($paniers,$_POST['etat']);
    }
}
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
                    <h1 class="h2">Listes des Paniers</h1>
                    <div>
                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">ajouter</a>
                    </div>

                </div>

                <!-- liste start -->
                <div>

                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-groupe d-flex mb-4">
                                    <select name="etat" class="form-control">
                                        <option value="">--choisir l'etat--</option>
                                        <option value="tout">Tout</option>
                                        <option value="en cours">En cours</option>
                                        <option value="en livraison">En livraison</option>
                                        <option value="livraison termine">Livraison termine</option>
                                    </select>
                                    <input type="submit" class="btn btn-primary ml-2" name="btnSearch" value="Chercher">
                            </div>
                          
                        </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Client</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($paniers as $p) {
                                $i++;
                                print '<tr>
                                            <th scope="row">' . $i . '</th>
                                                <td>' . $p['nom'] . '  ' . $p['prenom'] . '</td>
                                                <td>' . $p['total'] . '</td>
                                                <td>' . $p['date_creation'] . '</td>
                                                <td>' . $p['etat'] . '</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#commandes' . $p['id'] . '" class="btn btn-success">afficher</a>
                                                <a data-toggle="modal" data-target="#traiter' . $p['id'] . '"  class="btn btn-primary">traiter</a>
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

    <?php
    foreach ($paniers as $index => $panier) { ?>
        <!-- modifier Modal -->
        <div class="modal fade" id="commandes<?php echo $panier['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Listes des commandes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nom produit</th>
                                <th scope="col">Image</th>
                                <th scope="col">Quantite</th>
                                <th scope="col">Total</th>
                                <th scope="col">Panier</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($commandes as $index => $c) {
                                if ($c['panier'] == $panier['id']) {   //si commande appartient (panier ouvert)
                                    print '<tr>
                                                <td>' . $c['nom'] . ' </td>
                                                <td><img src="../../images/' . $c['image'] . '" width="100" /></td>
                                                <td>' . $c['quantite'] . '</td>
                                                <td>' . $c['total'] . ' DH</td>
                                                <td>' . $c['panier'] . '</td>
                                         </tr>';
                                }
                               
                            }
                            ?>

                        </tbody>
                    </table>

                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    
    
    <?php
    }

    foreach ($paniers as $index => $panier) { ?>
        <!-- modifier Modal -->
        <div class="modal fade" id="traiter<?php echo $panier['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Traiter la commande</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="POST">

                        <input type="hidden" name="panier_id" value="<?php echo $panier['id'] ?>" >
                        <div class="form-group">
                                <select name="etat" class="form-control">
                                        <option value="en livraison">en livraison</option>
                                        <option value="livraison termine">Livraison termine</option>
                                </select>
                        </div>
                        <div class="form-group">
                                <button type="submit" name="btnSubmit" class="btn btn-primary">Sauvgarder</button>
                        </div>
                        </form>

                    </div>
                    <div class="modal-footer">
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
    <script>
        function popUpDeleteCategorie() {
            return confirm("Voulez-vous supprimer cette categorie ?");
        }
    </script>
</body>

</html>