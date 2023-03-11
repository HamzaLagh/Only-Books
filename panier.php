<?php
session_start();
include "incl/functions.php";
$categories = getAllCatg();

$total = 0;
if (isset($_SESSION['panier'])) {
    $total = $_SESSION['panier'][1];
}


if (!empty($_POST)) {
    $produits = searchProd($_POST['search']);
    // echo $_POST['search'];
} else {
    $produits = getAllProd();
}


$commandes = array();
if (isset($_SESSION['panier'])) {
    if (count($_SESSION['panier'][3]) > 0) {
        $commandes = $_SESSION['panier'][3];
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="images/iconLogo.png" type="icon">
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
        .rowPanier{
            width:80%;
            margin-left:10%;
            margin-top:10%;
            background:#5FC3E426;
            padding:5%;
            border:solid #5FC3E4 0.01px;
       }
       .btnSupprimer{
           background-color:white;
           border-radius: 8px;
           border:solid red 0.01px;
           font-size:18px;
           text-decoration: none;
           padding:5px 10px 5px 14px;
           border-radius:5px;
           width: 50%;
           color:red;
       }
       .btnSupprimer:hover{
            background-color:red;
           color:black;
       }
       .btnValider{
           background-color:#5FC3E4;
           border-radius: 8px;
           font-size:18px;
           text-decoration: none;
           padding:5px 10px 5px 14px;
           border-radius:5px;
           width: 50%;
           color:white;
       }
       .btnValider:hover{
            background-color:;
            color:white;
             border:solid black 0.01px;
       }
       .btnAjouter{
           background-color:#5FC3E4;
           border-radius: 8px;
          
           font-size:18px;
           text-decoration: none;
           padding:5px 10px 5px 14px;
           border-radius:5px;
           width: 50%;
           color:white;
       }
       .btnAjouter:hover{
            background-color:;
            color:white;
             border:solid black 0.01px;
       }
       
  @media screen and (max-width: 800px) {
      .rowPanier{
            width:90%;
            height:auto;
            margin-left:5%;
            margin-top:30%;
            margin-bottom:5%;
            padding:2%;
            border:solid #5FC3E4 0.01px;
       }
       .btnSupprimer{
           margin-top:15px;
           padding:8px;
           width: 20%;
           font-size:8px;
       }
       .btnValider{
           padding:5px 10px 5px 14px;
           width: 50%;
           font-size:13px;
       }

       .btnAjouter{
           padding:5px 10px 5px 14px;
           width: 10%;
           font-size:13px;
       }
       .rowPanier table {
           font-size:12px;
       }

  }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php
    include "incl/header.php";
    ?>
    <!-- // fin header -->


    <div  class="row col-12 rowPanier">
        <h1 class=" mt-4 " style="border-bottom:1px solid;font-size:17px;">Panier : </h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantite</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($commandes as $index => $commande) {
                    print ' <tr>
                    <th scope="row">' . ($index + 1) . '</th>
                    <td>' . $commande[5] . '</td>
                    <td>' . $commande[0] . ' pieces</td>
                    <td>' . $commande[1] . ' MAD</td>
                    <td><a href="actions/enlever-produit-panier.php?id='.$index.'" class="btnSupprimer"> Supprimer </a></td>
                </tr> ';
                }
                ?>
            </tbody>
        </table>
        <div class="text-end mt-1">
            <h3 style="font-size:15px;">Total : <?php echo $total ; ?> MAD</h3>
            <hr>
            <a href="actions/valider-panier.php" class="btnValider "><i class="bi bi-check-square"></i> Valider</a>
            <hr>
            <a href="index.php" class="btnAjouter "><i class="bi bi-bag-plus"></i> Ajouter</a>
        </div>
    </div>

    <?php include "incl/footer.php" ?>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>