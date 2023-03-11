<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
></script>

<style>
  *{
     font-family: system-ui;
  }
  #logo {
    position: relative;
    /* right: 10px; */
    margin-right: 150px;
    margin-left: 150px;
     width: 250px;
  }
  #toggle{
      margin: 5%;
    }

  #navbarSupportedContent{
            padding: 5%;
            border-radius: 5px;
          }
  #search:hover {
    background-color: whitesmoke;
    color: black;
  }
  .dropdown-menu {
    background-color: #6ABFC7;
  }
  
 .dropdown-menu li {
    position: relative;
    background-color: #6ABFC7;
  }
  

  .dropdown-menu .dropdown-submenu {
    display: none;
    position: absolute;
    left: 100%;
    top: -7px;
  }

  .dropdown-menu .dropdown-submenu-left {
    right: 100%;
    left: auto;
  }

  .dropdown-menu>li:hover>.dropdown-submenu {
    display: block;
  }
  .btnHeader{
    background-color:#6ABFC7;
    color: #fff;
    border:none;
    border-radius:10px;
    width: 120px;
    height: 40px;
    margin-right: 5px;
   /* box-shadow: 0px 0px 2px 2px rgb(0,0,0); */

  }
  @media screen and  (max-width:767px) {
    #navbarSupportedContent {
      background-color: white;
      position: relative;
      margin-top:-30px;
      width: 100%;
      height:auto;
      flex-direction: row;
      border: 1px solid  gray ;
    }
    #navbarSupportedContent .dropdown {
      width: 180px;
    }
    #logo {
      position: relative;
      bottom: 1%;
      margin-left: 10px;
      width: 50px;
    }
  .btnHeader{
    background-color:lightseagreen;
    color: #fff;
    border:none;
    border-radius:10px;
    width: 140px;
    height: 40px;
    margin-right: 5px;
    margin-bottom: 15px;
    /*padding:0px 0px 0px 20px ;*/
    /*font-size:15px;*/
    /* box-shadow: 0px 0px 2px 2px rgb(0,0,0); */

  }
  }
  @media screen and (min-width: 767px) and (max-width:1023px) {
    #navbarSupportedContent {
      background-color: rgb(205, 205, 205, 0.9);
      position: relative;
      margin-top: -17px;
      width: 100%;
      /* display: flex; */
      flex-direction: row;
    }
    #toggle{
      margin: 2%;
    }
    #logo {
      position: relative;
      bottom: 10px;
      right: 50px;
      width: 150px;
    }
  }
</style>
<nav class="navbar navbar-expand-lg position-fixed" style="height: 80px;box-shadow: 0 0 0.05em ; width: 100%;z-index: 10    ;font-weight: bold;background-color: white;">
  <div class="container-fluid ">
    <a id="logo" class="navbar-brand" href="../index.php"><img src="../images/logo_library.png" style=" height:70px;"></a>
    <button id="toggle" class="navbar-toggler position-absolute top-0 end-0 " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!--<li class="nav-item dropdown">-->
        <!--  <a class="btn nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>-->
        <!--  <ul class="dropdown-menu">-->
            <?php
            // foreach ($categories as $categorie) {
            //   print '<li><a class="dropdown-item fw-bold" href="categories/' . $categorie['nom'] . '.php">' . $categorie['nom'] . '</a></li>';
            // }
            ?>
        <!--  </ul>-->
        <!--</li>-->
        
        <div class="dropdown">
            <button class="btnHeader dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
              Categories
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              
                    <li>
                      <a class="dropdown-item" href="#">الكتب العربية &raquo;</a>
                              <ul class="dropdown-menu dropdown-submenu">
                                      <?php
                                            foreach ($categoriesArabe as $categorie) {
                                              print '<li><a class="dropdown-item fw-bold" href="categories/' . $categorie['nom'] . '.php">' . $categorie['nom'] . '</a></li>';
                                            }
                                      ?>
                              </ul>
                    </li>

                    <li>
                      <a class="dropdown-item" href="#">English Books &raquo;</a>
                              <ul class="dropdown-menu dropdown-submenu">
                                      <?php
                                            foreach ($categoriesEnglish as $categorie) {
                                              print '<li><a class="dropdown-item fw-bold" href="categories/' . $categorie['nom'] . '.php">' . $categorie['nom'] . '</a></li>';
                                            }
                                      ?>
                              </ul>
                    </li>

                    <li>
                      <a class="dropdown-item" href="#">French Books &raquo;</a>
                              <ul class="dropdown-menu dropdown-submenu">
                                      <?php
                                            foreach ($categoriesFrench as $categorie) {
                                              print '<li><a class="dropdown-item fw-bold" href="categories/' . $categorie['nom'] . '.php">' . $categorie['nom'] . '</a></li>';
                                            }
                                      ?>
                              </ul>
                    </li>
            </ul>
     </div>

        <?php
        if (isset($_SESSION['nom'])) {
          print ' <div class="dropdown">
          <button class="btnHeader dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
          profile 
            </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="profile.php">My profile  <i class="bi bi-person"></i></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="deconnexion.php">Logout  <i class="bi bi-box-arrow-right"></i></a></li>
          </ul>
        </div> ';

          if (isset($_SESSION['panier'][3]) && is_array($_SESSION['panier'][3])) {
            print ' <li class="nav-item">
              <a class=" btnHeader nav-link " aria-current="page" href="panier.php"> <i class="bi bi-cart3"></i> <span class="text-danger">( ' . count($_SESSION['panier'][3]) . ' )</span> </a>
            </li> ';
          } else {
            print ' <li class="nav-item">
              <a class=" btnHeader nav-link" aria-current="page" href="panier.php"> <i class="bi bi-cart3"></i> ( 0 ) </a>
            </li> ';
          }
        } else {
          print '<li class="btnHeader nav-item">
                <a class="btnHeader nav-link" aria-current="page" href="connexion-registration.php"><i class="bi bi-box-arrow-in-right"></i> Connexion</a>
              </li>
              ';
        } ?>
      </ul>
      <form class="d-flex " action="index.php" method="POST">
        <input  class="form-control me-1" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class=" btn-outline " type="submit" name="click" style="background-color: #1F271B ; color:white ; margin-right: 5px; border-radius:8px;width:20%"><i class="bi bi-search"></i></button>
     </form>

    </div>
  </div>
</nav>