<?php

session_start();
if (isset($_SESSION['nomAdmin'])) {
    header('location:profile.php');
}


include "../incl/functions.php";
$user=true;


if (!empty($_POST)) {
  $user = connectAdmin($_POST);
  if (is_array($user) && count($user) > 0) {
    session_start();
    $_SESSION['id']=$user['id'];
    $_SESSION['email']=$user['email'];
    $_SESSION['nomAdmin']=$user['nom'];
    $_SESSION['mp']=$user['mp'];
    header('location:profile.php');
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-SHOP</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.min.css">
</head>
<body>


    <div class="col-12 p-5">
        <h1 class="text-center">Espace Admin : connexion</h1>
    <form action="#" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
       
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="mp" class="form-control" id="exampleInputPassword1">
          </div>
        
        <button type="submit" class="btn btn-primary">Sauvgarder</button>
      </form>
    </div>

    <!-- footer -->

    <?php include "../incl/footer.php"?>


</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.min.js" ></script>
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