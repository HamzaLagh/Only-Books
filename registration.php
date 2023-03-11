<?php
session_start();
if (isset($_SESSION['nom'])) {
    header('location:profile.php');
}


include "incl/functions.php";

$showRegistrationAlert = 0;

$categories = getAllCatg();

if (!empty($_POST)) {
   
  if(AddVisiteurs($_POST)){
    $showRegistrationAlert =1;
  }
  
}
if ( $showRegistrationAlert =1) {
  header('location:connexion-registration.php');
}

?>


<!-- JavaScript Bundle with Popper -->
<?php
if ($showRegistrationAlert == 1) {
  print " <script>
  Swal.fire({
  title: 'Succes',
  text: 'creation de compte avec success',
  icon: 'success',
  confirmButtonText: 'OK',
  timer:3000
  })
  </script> ";
}

?>
</html>