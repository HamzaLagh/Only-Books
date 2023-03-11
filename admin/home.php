<?php
session_start();
include "../incl/functions.php";

if (!isset($_SESSION['nomAdmin'])) {
  header('location:connexion.php');
  exit();
}

$data = getData();

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../images/iconLogo.png" type="icon">

  <title>ADMIN : Accueil</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>
  <?php
          include "template/headerAdmin.php";
    ?>

  <div class="container-fluid">
    <div class="row">
      <?php
      include "template/navigation.php";
      ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Home</h1>
          <div>
            <?php echo $_SESSION['nomAdmin']; ?>
          </div>

        </div>

        <div class="container">
            <div class="row col-12">
                <div class="col-4 text-center  ">
                        <h1> Produit :</h1>
                        <br>
                        <?php echo $data["produits"] ?>
                </div>
                <div class="col-4 text-center ">
                        <h1>Clients :</h1>
                        <br>
                        <?php echo $data["clients"] ?>
                </div>
                <div class="col-4 text-center ">
                       <h1>Categories :</h1>
                       <br>
                       <?php echo $data["categories"] ?>
                </div>
            </div>
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
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>

  <!-- Graphs -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
</body>

</html>