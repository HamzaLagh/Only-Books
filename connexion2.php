<?php

session_start();
if (isset($_SESSION['nom'])) {
  header('location:profile.php');
}
else {
  header('location:connexion-registration.php');
}

include "incl/functions.php";
$user = true;
$categories = getAllCatg();

if (!empty($_POST)) {
  $user = connectVisiteur($_POST);
  if (is_array($user) && count($user) > 0) {
    session_start();
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['nom'] = $user['nom'];
    $_SESSION['prenom'] = $user['prenom'];
    $_SESSION['mp'] = $user['mp'];
    $_SESSION['telephone'] = $user['telephone'];
    $_SESSION['ville'] = $user['ville'];
    $_SESSION['adresse'] = $user['adresse'];
    header('location:profile.php');
  }
}
?>

<body class="d-flex flex-column min-vh-100">


  <!-- footer -->
  <?php include "incl/footer.php" ?>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.min.js"></script>
<?php
if (!$user) {
  print " <script>
  Swal.fire({
  title: 'Error !',
  text: 'cordonnes non valide',
  icon: 'error',
  confirmButtonText: 'OK',
  timer:3000
  })
  </script> ";
}


?>

</html>