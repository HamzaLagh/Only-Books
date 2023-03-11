<?php
session_start();
if (isset($_SESSION['nom'])) {
    header('location:profile.php');
}


include "incl/functions.php";

$showRegistrationAlert = 0;

if (!empty($_POST)) {
   
  if(ModifierVisiteurs($_POST)){
    $showRegistrationAlert =1;
  }
  
}
if ( $showRegistrationAlert =1) {
  header('location:profile.php?modification=ok');
}

?>



<!-- JavaScript Bundle with Popper -->

</html>
