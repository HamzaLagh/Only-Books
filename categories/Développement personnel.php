<?php
session_start();
include "../incl/functions.php";
$categories = getAllCatg();

if (!empty($_POST)) {
  $produits = searchProd($_POST['search']);
  // echo $_POST['search'];
} else {
  $produits = getAllProd();
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="icon" href="../images/iconLogo.png" type="icon">

  <!-- // style CSS -->
  <style>
    body {
      overflow-x: hidden;
      padding: 0px;
      margin: 0px;
    }

    body::before {
      content: '';
      position: absolute;
      top: 100px;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(#5FC3E4, black);
      clip-path: circle(10% at right 10%);
      /* z-index: 1; */
      opacity: 0.6;
    }

    body::after {
      content: '';
      position: absolute;
      top: 0;
      left: 20;
      width: 100%;
      height: 100%;
      background: linear-gradient(white, #5FC3E4);
      clip-path: circle(10% at  2%);
      opacity: 1;
    }



    #row {
      position: relative;
      display: grid;
      /* grid: repeat(2, 260px) / auto-flow 150px; */
      grid-template-columns: 300px 300px 300px;
      grid-template-rows: 370px 370px 370px;
      padding: 50px;
      width: 85%;
      height: auto;
      justify-content: center;
      margin: 40px 0;
      background: linear-gradient(#5FC3E4, black);
      margin-top: 100px;


    }

    #row #cart {
      position: relative;
      font-size: 18px;
      width: 250px;
      height: 350px;
      background: rgba(255, 255, 255, 0.1);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
      border-radius: 15px;
      backdrop-filter: blur(10px);
      justify-content: center;
    }

    #row #cart #cart-petit {
      background: rgba(255, 255, 255, 0.9);
      position: relative;
      margin-top: 20px;
      color: black;
      width: 100%;
      height: 92%;
      justify-content: center;
      align-items: stretch;
      transition: 0.5s;
      /* backdrop-filter: blur(10px); */
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
      border-radius: 15px;
    }

    #row #cart #cart-petit img {
      height: 60%;
      width: 65%;
      margin: 10% 0% 0% 15%;
      backdrop-filter: blur(10px);
      justify-content: center;
    }

    #row #cart:hover #cart-petit {
      transform: translateY(-20px);
    }

    #row #cart #cart-petit #voir {
      list-style: none;
      width: 50%;
      transform: translateY(10px);
      transition: 0.5s;
      opacity: 0;
      margin-left: 25%;
    }

    #row #cart:hover #cart-petit #voir {
      transform: translateY(0px);
      background:#2C89DB;
      opacity: 1;
    }

  /* #row #cart #cart-petit img {
        position: relative;
        width: 150px;
        height: 150px;
        overflow: hidden;
      } */



    @media only screen and (max-width: 600px) {
      body {
        overflow-x: hidden;
        padding: 0px;
        margin: 0px;
        background: linear-gradient(#E55D87, #5FC3E4);
      }

      body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: linear-gradient(#DA22FF, #9733EE);
        clip-path: circle(30% at right 70%);
      }

      body::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(#E55D87, #5FC3E4);
        clip-path: circle(20% at 10% 10%);
      }

      .img-1 {
        width: 75%;
        position: relative;
        opacity: 1;
        bottom: 10%;
        transform: translate(12%, 25%);
      }

      #row {
        display: grid;
        grid-template-columns: 125px 125px 125px;
        /*Make the grid smaller than the container*/
        width: 85%;
        margin-bottom: 120px;
        background-color: rgb(192, 192, 192, 0.6);
        position: relative;
        align-items: center;
        flex-wrap: wrap;
        margin: 40px 0;
      }

      #row #cart {
        font-size: 10px;
        position: relative;
        width: 300px;
        height: 200px;
        background: rgba(255, 255, 255, 0.05);
        margin: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(10px);
      }

      #row #cart #cart-petit {
        background-color: white;
        color: black;
        position: relative;
        width: 240%;
        height: 92%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        transition: 0.5s;
      }

      #row #cart:hover #cart-petit {
        transform: translateY(0px);
      }

      #row #cart #cart-petit #voir {
        position: relative;
        font-size: 10px;
        list-style: none;
        width: 90%;
        height: 30%;
        transform: translateY(-10px);
        transform: translateX(-10px);
        transition: 0.5s;
        opacity: 1;
        right: 10%;
      }

      #row #cart:hover #cart-petit #voir {
        transform: translateY(0px);
        opacity: 1;
      }

      #cf4a {
        position: relative;
        height: 250px;
      }
    }
  </style>
</head>

<body class="d-flex flex-column min-vh-100">

  <?php
  include "header.php";
  ?>

  <div id="row" class="row  position-relative  start-50 translate-middle-x pt-5   ">
    <?php
    foreach ($produits as $produit) {
      if ($produit['categorie']==3) {
      print '<div id="cart"  class="  ">
                  <div id="cart-petit"  class="card m"  ">
                      <img src="../images/' . $produit['image'] . '" class="card-img-top" alt="...">
                  <div class="card-body">
                        <p class="card-title pb-1">' . $produit['nom'] . '</p>
                        <p>' . $produit['prix'] . '.00 MAD</p>
                        <a id="voir" href="../produit.php?id=' . $produit['id'] . '" class="btn  fas fa-eye"> Voir</a>
                      </div>
                    </div>
              </div> ';
    }
  }
    ?>
  </div>

  <!----------- footer -->
  <?php include "footer.php" ?>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</html>

<!-- <p class="card-text">'. $produit['description'].'</p> -->