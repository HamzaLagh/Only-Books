<?php
session_start();
include "../incl/functions.php";
if (!isset($_SESSION['nomAdmin'])) {
  header('location:connexion.php');
  exit();
}

if (isset($_POST['btnEdit'])) {
  if (editAdmin($_POST)) {
    $_SESSION['nomAdmin']= $_POST['nom'];
    $_SESSION['email']= $_POST['email'];
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
          <h1 class="h2">Profile</h1>
          <div>
            <?php echo $_SESSION['nomAdmin']; ?>
          </div>

        </div>

        <div class="container">
          <h1>Nom : <span class="text-primary"><?php echo $_SESSION['nomAdmin']; ?></span> </h1>
          <h1>Email : <span class="text-primary"><?php echo $_SESSION['email']; ?></span> </h1>
          <a data-toggle="modal" data-target="#profilEdit" class="btn btn-primary">Modifier</a>
        </div>


      </main>
    </div>
  </div>


  <!-- modifier Modal -->
  <div class="modal fade" id="profilEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modification de profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="id_admin" value="<?php echo $_SESSION['id']; ?>" >
            <div class="form-group">
              <input type="text" name="nom" value="<?php echo $_SESSION['nomAdmin']; ?>" class="form-control">
            </div>
            <div class="form-group">
              <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control">

            </div>
            <div class="form-group">
              <input type="password" name="mp" class="form-control" placeholder="nouveau mot de passe...">

            </div>




        </div>
        <div class="modal-footer">
          <button type="submit" name="btnEdit" class="btn btn-primary">Modifier</button>
        </div>
        </form>
      </div>
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