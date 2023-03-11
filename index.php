<?php
session_start();
include "incl/functions.php";
$manyProducts = getManyProdPopulaire();
$manyProducts2 = getManyProdDevPers();
$categories = getAllCatg();
$categoriesArabe = getArabeCatg();
$categoriesFrench = getFrenchCatg();
$categoriesEnglish = getEnglishCatg();

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
  <title>Home</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="icon" href="images/iconLogo.png" type="icon">
  <!-- // style CSS -->
  <!--<link rel="stylesheet" href="css/styleIndex.css"> -->
  <style>
      
    body{
      overflow-x: hidden;
      padding: 0px;
      margin: 0px;
      scroll-behavior: smooth;
      font-family: system-ui;
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

    #cf4a {
      position: relative;
      height: 500px;
      width: 70%;
      margin-left: 15%;
      margin-top: 7%;
      margin-bottom: 20%;
    }

    #CarouselText h2 {
     font-size: larger;
     margin:10px 0px 10px 15px;
    }


    #row {
      position: relative;
      display: grid;
      grid-template-columns: 20% 20% 20% 20% 20%;
      grid-template-rows: 370px;
      /* grid-template-columns: auto auto auto auto; */
      width: 85%;
      height: 800px;
      justify-content: center;
      /*margin: 40px 0;*/
      background: linear-gradient(#5FC3E4, black);
      box-shadow: 0 0 0.3em;
      border-radius: 5px;
      padding: 50px 0px 0px 20px;f

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

    h3 {
      position: relative;
      left: 45%;
      margin: 150px 0px 5px 0px;
      vertical-align: middle;
      /* border-bottom: 3px solid  black ; */
      animation-name: example;
      animation-duration: 5s;
      font-family: -apple-system;
      font-weight: 700;
    }
    @keyframes example {
      from {
        left: 25%;
      }

      to {
        left: 45%;
      }
    }

    .div-round {
      transition: 0.3s;
    }

    .div-round:hover {
      transform: translateY(-20px);
      ;
    }
    .discover{
        margin:20px 0px 18px 700px ;
    }
    #card-rounded {
      height: 200px;
      width: 200px;
      box-shadow: 1px 1px 4px 1px black;
      border-radius: 100px;
    }
    .grand-round{
        position: relative;
        display: grid;
        /* grid: repeat(4, 260px) / auto-flow 150px; */
        grid-template-columns: 215px 215px  215px 215px ;
        grid-template-rows: 150px;
        margin : 50px 0px 150px 320px ;
    }
    .round {
      width: 100%;
      height: 100%;
      border-radius: 100px;
      background-color: #5FC3E4;
    }

    #card-rounded .round .image-round {
      width: 100%;
      height: 100%;
      border-radius: 100px;
    }
    .grand-round .div-round .titre-round{
      position: relative;
      margin-top: 10px;
      margin-left: 50px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      width: 150px;
      }

    .SeeAll {
      text-decoration: none;
      color: black;
      background-color: #5FC3E433;
      width: 150px;
      font-size: large;
      font-weight: 600;
      font-family: monospace;
      border-bottom-right-radius: 5px;
      padding-bottom: 5px;
      text-align: center;
    }
@media only screen and (min-width: 767px) and (max-width: 1023px) {
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
        grid-template-columns: 220px 220px 220px 220px ;
        grid-template-rows:280px;
        /*Make the grid smaller than the container*/
        width: 95%;
        background-color: rgb(192, 192, 192, 0.6);
        position: relative;
        align-items: center;
        flex-wrap: wrap;
        margin: 10px 0px 40px 0px;
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
        width: 100%;
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

      #row #cart #cart-petit #voir {
        position: relative;
        font-size: 10px;
        list-style: none;
        width: 90%;
        height: 30px;
        transform: translateY(-10px);
        transform: translateX(-10px);
        opacity: 1;
        right: 10%;
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
      
    h3 {
      position: relative;
      left: 35%;
      animation-name: example;
      animation-duration: 5s;
      font-family: -apple-system;
      font-weight: 700;
    }
    
    @keyframes example {
      from {
        left: 7%;
      }
      to {
        left: 35%;
      }
    }
    
      .discover{
            margin-left:40% ;
        }
        
      .grand-round{
        position: relative;
        display: grid;
        /* grid: repeat(4, 260px) / auto-flow 150px; */
        grid-template-columns:20% 20% 20% 20% ;
        grid-template-rows: 150px;
        margin: 30px 0px 70px 110px;
      }
      .grand-round .div-round .titre-round{
        margin: 10px 0px 0px 25px;
        font-size: large;
        width: 150px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      }
      

      #card-rounded{
        height: 150px;
        width: 150px;
        border-radius: 150px;
      }
      #card-rounded .round {
        width: 100%;
        height: 100%;
        border-radius: 100px;
       
      }
      #cf4a {
        margin: 100px 0px 350px 0px;
        position: relative;
        height: 250px;
        width:100%;
      }
      #cf4a #demo {
          width:80%;
          margin-left:6%;
          margin-right:10%;
      }
      #cf4a #CarouselText {
          margin-left:10%;
          width:90%;
      }
}
      
      
/*----------------------600 px*/
    @media only screen and (max-width: 767px) {
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
        margin: 10px 0px 40px 0px;
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
        width: 100%;
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
        font-size: 12px;
        list-style: none;
        width: 80px;
        height: 25px;
        margin-top:5px;
        transform: translateY(-10px);
        transform: translateX(-10px);
        opacity: 1;
        right: 15%;
        background: #5FC3E4;
        padding:5px5px 5px 20px;
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
      
    h3 {
      width:80%;
      position: relative;
      left: 15%;
      animation-name: example;
      animation-duration: 5s;
      font-family: -apple-system;
      font-weight: 700;
    }
    @keyframes example {
      from {
        left: 7%;
      }
      to {
        left: 15%;
      }
    }
      .grand-round{
        position: relative;
        display: grid;
        /* grid: repeat(4, 260px) / auto-flow 150px; */
        grid-template-columns: 90px 90px 90px 90px ;
        grid-template-rows: 150px;
        margin: 30px 20px 25px 1px;
      }
      .grand-round .div-round .titre-round{
        margin: 10px 0px 0px 15px;
        font-size: small;
        width: 50px;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
      }
      
      .discover{
        margin:10px 0px 0px 120px ;
    }
    
      #card-rounded{
        height: 80px;
        width: 80px;
        border-radius: 150px;
      }
      #card-rounded .round {
        width: 100%;
        height: 100%;
        border-radius: 100px;
       
      }
      #cf4a {
        margin: 100px 0px 150px 0px;
        position: relative;
        height: 250px;
        width:100%;
      }
      #cf4a #demo {
          width:91%;
      }
      #cf4a #CarouselText {
          margin-left:15px;
          width:90%;
      }
    }
    
  </style>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-WRVWX7DX69"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-WRVWX7DX69');
</script>
 </head>

<body class="d-flex flex-column min-vh-100">

  <?php
  include "incl/header.php";
  ?>
  <!-- // fin header -->


  <div id="cf4a" class="">
    <!-- Carousel -->
    <div id="demo" class="carousel slide w-100" data-bs-ride="carousel">

      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/cover_libray_3.png" alt="Los Angeles" class="d-block" style="width:100%">
          <div class="carousel-caption">
            <!-- <h3>Los Angeles</h3>
            <p>We had such a great time in LA!</p> -->
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/cover_library_2.png" alt="Chicago" class="d-block" style="width:100%">
          <div class="carousel-caption">
          </div>
        </div>
        <div class="carousel-item">
          <img src="images/cover_libray_1.png" alt="New York" class="d-block" style="width:100%">
          <div class="carousel-caption">
          </div>
        </div>
      </div>

      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

    <div id="CarouselText">
      <h2 class="h2 border-bottom" style="font-family: Georgia, Times, 'Times New Roman', serif;">Only Books</h2>
      <p style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">"OnlyBooks" is a place where books are stored. They make it easier for people to get access to them for reading.</p>
    </div>
  </div>
  <!-- Fin Carousel -->


  <!-- ---------------------------row 1---------- -->
  <h3 class="row">PRODUITS POPULAIRES</h3>
  <div id="row" class="row  position-relative top-100 start-50 translate-middle-x   ">
    <?php
    foreach ($manyProducts as $produit) {
      print '<div id="cart"  class="">
                     <div id="cart-petit"  class="card m"  ">
                        <img src="images/' . $produit['image'] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                          <h6 class="card_title">' . $produit['nom'] . '</h6>
                          <h6 id="prix" class="fw-bold">' . $produit['prix'] . '.00 MAD</h6>
                          <a id="voir" href="produit.php?id=' . $produit['id'] . '" class="fas fa-eye"> Voir</a>
                        </div>
                      </div>
                </div> ';
    }
    ?>
    <a href="categories/Best sellers.php" class="position-absolute top-100 end-0 SeeAll">See all... <i class="bi bi-caret-right-fill"></i></a>
  </div>
  <!-- -------------rounded cards categories-------- -->
  <h1 class="discover">To discover</h1>
  <div class="row   grand-round">
    <div class="col-2  div-round">
      <div class="card" id="card-rounded">
        <a class="round" href="categories/English books.php"><img src="images/america.png" class="image-round" alt=""></a>
      </div>
      <h5 class="titre-round">English books</h5>
    </div>
    <div class="col-2 div-round ">
      <div class="card" id="card-rounded">
        <a class="round" href="categories/أفضل الكتب العربية.php"><img src="images/arabe.png" class="image-round" alt=""></a>
      </div>
      <h5 class="titre-round">الكتب العربية</h5>
    </div>
    <div class="col-2  div-round">
      <div class="card" id="card-rounded">
        <a class="round" href="categories/french books.php"><img src="images/france.png" class="image-round" alt=""></a>
      </div>
      <h5 class="titre-round">French books</h5>
    </div>
    <div class="col-2  div-round">
      <div class="card" id="card-rounded">
        <a class="round" href="categories/Romans enfants.php"><img src="images/enfant.png" class="image-round" alt=""></a>
      </div>
      <h5 class="titre-round">Romans enfants</h5>
    </div>
  </div>


  <!-- ---------------------------row 2---------- -->
  <h3 class="row"> Littérature - Romans</h3>
  <div id="row" class="row  position-relative top-100 start-50 translate-middle-x  mb-5  ">
    <?php
    foreach ($manyProducts as $produit) {
      print '<div id="cart"  class="">
                     <div id="cart-petit"  class="card m"  ">
                        <img src="images/' . $produit['image'] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                          <h6 class="card_title">' . $produit['nom'] . '</h6>
                          <p id="prix" class="fw-bold">' . $produit['prix'] . '.00 MAD</p>
                          <a id="voir" href="produit.php?id=' . $produit['id'] . '" class="fas fa-eye"> Voir</a>
                        </div>
                      </div>
                </div> ';
    }
    ?>

    <a href="categories/Littérature - Romans.php" class="position-absolute top-100 end-0  SeeAll ">See All... <i class="bi bi-caret-right-fill"></i></a>
  </div>

  <!-- ---------------------------row 3---------- -->
  <h3 class="row">Développement personnel</h3>
  <div id="row" class="row  position-relative top-100 start-50 translate-middle-x mt-5 mb-5">
    <?php
    foreach ($manyProducts2 as $produit) {
      print '<div id="cart"  class="">
                     <div id="cart-petit"  class="card m"  ">
                        <img src="images/' . $produit['image'] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                          <h6 class="card_title">' . $produit['nom'] . '</h6>
                          <p id="prix" class="fw-bold">' . $produit['prix'] . '.00 MAD</p>
                          <a id="voir" href="produit.php?id=' . $produit['id'] . '" class="fas fa-eye"> Voir</a>
                        </div>
                      </div>
                </div> ';
    }
    ?>

    <a href="categories/Développement personnel.php" class="position-absolute top-100 end-0 SeeAll ">See All... <i class="bi bi-caret-right-fill"></i></a>
  </div>

  <!----------- footer -->
  <?php include "incl/footer.php" ?>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
  // window.onload = choosePic;

  var myPix = new Array("images/onlybooks-bg.png", "images/lwla.png");

  function choosePic() {
    var randomNum = Math.floor(Math.random() * myPix.length);
    document.getElementById("myPicture").src = myPix[randomNum];
  }

  function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {
      myIndex = 1
    }
    x[myIndex - 1].style.display = "block";
    setTimeout(carousel, 1000);
  }
</script>

</html>