<?php
session_start();
include "../incl/functions.php";
$categoriesArabe = getArabeCatg();


if (!empty($_POST)) {
  $produits = searchProd($_POST['search']);
//   echo $_POST['search'];
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
     body{
      overflow-x: hidden;
      padding: 0px;
      margin: 0px;
      scroll-behavior: smooth;
    }

    /* body::before {
        content: '';
        position: absolute;
        top: 100px;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(#5FC3E4, black);
        clip-path: circle(10% at right 10%);
        z-index: 1;
        opacity: 0.6; 
    } */

    /* body::after {
      content: '';
      position: absolute;
      top: 0;
      left: 20;
      width: 100%;
      height: 100%;
      background: linear-gradient(white, #5FC3E4);
      clip-path: circle(10% at  2%);
      opacity: 1;
    } */

    


    #row {
      position: relative;
      display: grid;
      grid-template-columns: 20% 20% 20% 20% 20%;
      grid-template-rows: 370px;
      /* grid-template-columns: auto auto auto auto; */
      width: 85%;
      height: auto;
      justify-content: center;
      /*margin: 40px 0;*/
      background: linear-gradient(#5FC3E4, black);
      box-shadow: 0 0 0.3em;
      border-radius: 5px;
      padding: 50px 0px 50px 20px;
      margin-top:20%;

    }

    #row #cart {
      position: relative;
      font-size: 18px;
      width: 90%;
      height: 340px;
      background-color: #5FC3E433;
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
      /* justify-content: center; */
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
      box-shadow: 0 0 0.3em;
    }

    #row #cart:hover #cart-petit {
      transform: translateY(-20px);
    }

    #row #cart #cart-petit .card_title {
      
      align-content: center;
      position: relative;
      justify-content: center;
      height:40%;
      border-bottom: solid #5FC3E4 2px;
      /*background: #5FC3E44D;*/
      /*border-radius:3px;*/
      /*font-family:  serif;*/
    }

    #row #cart #cart-petit #voir {
      background: #5FC3E4;
      color:black;
      font-size:16px;
      text-decoration: none;
      padding:5px 5px 5px 14px;
      border-radius:5px  ;
      width: 50%;
      transform: translateY(20px);
      transition: 0.5s;
      opacity: 0;
      margin-left: 25%;
      /* margin-bottom: 5px; */
    }

    #row #cart:hover #cart-petit #voir {
      transform: translateY(-20px);
      opacity: 1;
      border:black solid 0.0001px
    }
    #row #cart #cart-petit #prix {
        
        margin-top: 4px;
        margin-bottom: 0px;
      }

    #row #cart:hover #cart-petit #prix {
      opacity: 0;
    }
    
/*dak loun*/
/*background: linear-gradient(#E55D87, #5FC3E4);*/

    /*----------------------600 px--------------------*/
    @media only screen and (max-width: 600px) {
      body {
        overflow-x: hidden;
        scroll-behavior: smooth; 
        padding: 0px;
        margin: 0px;
      }

      #row {
        position: relative;
        display: grid;
      /* grid: repeat(4, 260px) / auto-flow 150px; */
        grid-template-columns: 190px 190px;
        grid-template-rows:280px;
        /*Make the grid smaller than the container*/
        width: 95%;
        background-color: rgb(192, 192, 192, 0.6);
        position: relative;
        align-items: center;
        flex-wrap: wrap;
        margin: 90px 0px 40px 0px;
        height:auto;
      }

      #row #cart {
        font-size: 10px;
        position: relative;
        width: 85%;
        height: 250px;
        background: rgba(255, 255, 255, 0.05);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(10px);
        margin-bottom: 10px;
        margin-left:3%;
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
        margin-bottom: 20px;
      }

      #row #cart:hover #cart-petit {
        transform: translateY(0px);
      }
      #row #cart #cart-petit img {
      height: 50%;
      width: 55%;
      margin: 10px 0% 0px 5px;
      backdrop-filter: blur(10px);
      justify-content: center;
      box-shadow: 0 0 0.3em;
    }
    
      #row #cart #cart-petit .card_title {
      
   
      position: relative;
      font-size:11px;
      
      
    }
    

      #row #cart #cart-petit #voir {
        position: relative;
        font-size: 10px;
        list-style: none;
        width: 80px;
        height: 25px;
        margin-top:5px;
        align-content: center;
        transform: translateY(-10px);
        transform: translateX(-10px);
        opacity: 1;
        right: 15%;
        background: #5FC3E4;
      }

      #row #cart:hover #cart-petit #voir {
        transform: translateY(0px);
        opacity: 1;
      }
      #row #cart #cart-petit #prix {
        margin-top: 0px;
        margin-bottom: 0px;
      }
      #row #cart:hover #cart-petit #prix {
        opacity: 1;
      }
      
    }
  </style>
</head>

<body class="d-flex flex-column min-vh-100">

  <?php
  include "header.php";
  ?>
<!---------fin header------>

<div id="row" class="row  position-relative top-100 start-50 translate-middle-x   ">
    <?php
     foreach ($produits as $produit) {
      if ($produit['categorie']==2) {
      print '<div id="cart"  class="">
                     <div id="cart-petit"  class="card m"  ">
                        <img src="../images/' . $produit['image'] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                          <h6 class="card_title">' . $produit['nom'] . '</h6>
                          <h6 id="prix" class="fw-bold">' . $produit['prix'] . '.00 MAD</h6>
                          <a id="voir" href="../produit.php?id=' . $produit['id'] . '" class="fas fa-eye"> Voir</a>
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