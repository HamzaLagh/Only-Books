
<?php
session_start();
include "incl/functions.php";
$categories = getAllCatg();
if (!isset($_SESSION['nom'])) {
    header('location:connexion-registration.php');
}
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="images/iconLogo.png" type="icon">
    <title>Profile</title>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-WRVWX7DX69"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-WRVWX7DX69');
        </script>
    <style>
      body{
        overflow-x: hidden;
      }
      .deconnexion{
        height: auto;
        width: 25%;
        background-color: red;
        color: white;
        height:40px;
        border-radius: 8px;
        text-decoration: none;
        padding:5px 10px 5px 14px;
        margin-left:2%;
      }
      .deconnexion:hover{
            background-color:;
            color:white;
            border:solid black 0.01px;
       }
      #registration{
        background:#adadad26;
        position: relative;
        width: 450px;
        height:680px;
        margin: 50px 0px 10px 0px  ;
        padding: 20px 25px 5px 25px;
        border-radius: 20px;
      }
      .compte{
        position: relative;
        margin-top: 15%;
        margin-left: 10%;
      } 
      .btnEnregistrer{
          background-color:#5FC3E4;
           border-radius: 8px;
           font-size:18px;
           text-decoration: none;
           padding:5px 10px 5px 14px;
           width: 40%;
           color:white;
           margin-bottom:15px;
      }
 @media screen and (max-width: 800px) {
      #registration{
        position: relative;
        width: 350px;
        height:auto;
        margin: 0px 0px 10px 1px  ;
        padding: 20px 25px 5px 25px;
        border-radius: 20px;
        border: 1px solid  gray ;
      }
      .compte{
        position: relative;
        width: 100%;
        margin-left: 10px;
      } 
      .deconnexion{
        height: auto;
        width: 150px;
        background-color: red;
        color: white;
        margin: 15px 0px 0px 15px;
        font-size:14;
      }   
  }
    </style>
</head>
<body class="d-flex flex-column min-vh-100" >
      <?php
        include "incl/header.php";
        ?>
    <!----- fin nav -->
<!-- ------------------------booootstrap 2 pages--------------- -->
<div class="container">
  <div class="row">
    <div class="col mt-5">
              <div class="row col-12 compte ">
                  <h1><span class=""> <?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?></span></h1>
              
                  <?php
                    if (isset($_SESSION['nom'])) {
                      print ' <a href="deconnexion.php" class="deconnexion"><i class="bi bi-box-arrow-right"></i> Déconnexion</a> ';
                    } 
                  ?>
              </div>  
    </div>
    <div class="col mt-5 fw-bolder">
                    <!-- ------------------modification profile (registration)------ -->
              <div id="registration" class="tabcontent" >
              <?php 
                    if (isset($_GET['modification']) && $_GET['modification']=="ok") {
                       print '<div class="alert alert-success">
                       Modification avec succès </div>'; }?>

                        <form action="modification-registration.php" method="POST">
                              
                              <div class="mb-2">
                                  <label for="exampleInputEmail1" class="form-label">Email address :</label>
                                  <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-2">
                                  <label for="exampleInputPassword1" class="form-label">Nom :</label>
                                  <input type="text" name="nom" value="<?php echo $_SESSION['nom']; ?>" class="form-control" id="exampleInputPassword1" required >
                              </div>
                              <div class="mb-2">
                                  <label for="exampleInputPassword1" class="form-label">Prenom :</label>
                                  <input type="text" name="prenom" value="<?php echo $_SESSION['prenom']; ?>" class="form-control" id="exampleInputPassword1"  required>
                              </div>
                              <div class="mb-2">
                                  <label for="exampleInputPassword1" class="form-label">Téléphone :</label>
                                  <input type="text" name="tele" value="<?php echo $_SESSION['telephone']; ?>" class="form-control" id="exampleInputPassword1" required>
                              </div>
                              <div class="mb-2">
                                  <label for="exampleInputPassword1" class="form-label">Ville :</label>
                                  <input type="text" name="ville" value="<?php echo $_SESSION['ville']; ?>" class="form-control" id="exampleInputPassword1" required>
                              </div>
                              <div class="mb-2">
                                  <label for="exampleInputPassword1" class="form-label">Adresse :</label>
                                  <input type="text" name="adresse" value="<?php echo $_SESSION['adresse']; ?>" class="form-control" id="exampleInputPassword1" required>
                              </div>
                              <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">New password :</label>
                                  <input type="password" name="mp" class="form-control" id="exampleInputPassword1"  required>
                              </div>

                              <button type="submit" class="btnEnregistrer">Enregistrer</button>
                         </form>
               </div>
     </div>
    </div>
  </div>
   
<!-- footer -->
  <?php include "incl/footer.php"?>
  
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
?>
</html>