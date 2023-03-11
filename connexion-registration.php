<?php

session_start();
if (isset($_SESSION['nom'])) {
    header('location:profile.php');
}


include "incl/functions.php";
$showRegistrationAlert = 0;

$categories = getAllCatg();

if (!empty($_POST)) {

    if (AddVisiteurs($_POST)) {
        $showRegistrationAlert = 1;
    }
}

// ----------connexion

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
    <link rel="icon" href="images/iconLogo.png" type="icon">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WRVWX7DX69"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-WRVWX7DX69');
    </script>
</head>

<style> 
    #row-grand {
        position: relative;
        display: grid;
        width: 25%;
        height: 650px;
        /* background-color: rgb(192, 192, 192, 0.6); */
        justify-content: center;
        margin: 100px 0;
        box-shadow: 0 0 0.5em;
        color: white;
        /* background: linear-gradient(#E55D87, #5FC3E4); */
        /* background: linear-gradient(#5FC3E4, black); */

    }



    .btn-cnx {

        position: absolute;
        background-color:#2F5972;
        color: white;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 15px;
        width: 50%;
        height: 70px;
        float: inline-start;
    }
    .btn-cnx:hover{
        opacity: 0.5;
    }

    .btn-registre {
        position: absolute;
        background:#5FC3E4;
        color: white;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 15px;
        width: 50%;
        height: 70px;
        right: 0;

    }
    .btn-registre:hover{
        opacity: 0.5;
    }

    /* .tablink:hover {
        background-color: #777;
    } */

    /* Style the tab content */
    #cnx {
        background: linear-gradient(#2F5972,black);
        position: absolute;
        display: none;
        padding-left: 50px;
        padding-top: 50px;
        margin-top: 70px;
        height:89.3%;
        justify-content: center;
    }

    #registration{
        /* background-color:rgb(192, 192, 192, 0.6);; */
        background:linear-gradient(#5FC3E4, black);
        position: absolute;
        display: none;
        padding: 35px;
        margin-top: 70px;
        height:95%;
    }
 @media screen and (max-width: 800px) {
    #row-grand {
        position: relative;
        display: grid;
        width: 80%;
        height: 650px;
        /* background-color: rgb(192, 192, 192, 0.6); */
        justify-content: center;
        margin: 110px 0px 20px 0px ;
        box-shadow: 0 0 0.5em;
        color: white;
        /* background: linear-gradient(#E55D87, #5FC3E4); */
        /* background: linear-gradient(#5FC3E4, black); */

    }
  }
</style>

<body class="d-flex flex-column min-vh-100">
    <?php
    include "incl/header.php";
    ?>
    <!----- fin nav -->
    <div id="row-grand" class="row  position-relative  top-50 start-50 translate-middle-x pt-5 bg-light">
        <button class="btn-cnx" onclick="openCity('cnx', this)" id="defaultOpen">Connexion</button>
        <button class="btn-registre" onclick="openCity('registration', this)">registration</button>

        <div id="cnx" class="tabcontent" class="col-12   position-absolute top-50 start-50 translate-middle ">
            <form action="connexion2.php" method="POST">
            <h4>Connexion</h4>
                <div class="mt-4">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control w-75 " id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text ">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="mp" class="form-control w-75" id="exampleInputPassword1" required>
                </div>

                <button type="submit" class="btn btn-outline-light">Sauvgarder</button>
            </form>
        </div>


        <!-- -----------------Form Registration -->

        <div id="registration" class="tabcontent">
            <form action="registration.php" method="POST">
                <h4>CRÉATION D'UN COMPTE</h4>
                <div class="mt-4  ">
                    
                    <input type="email" name="email" class="form-control mb-2" id="exampleInputEmail1" placeholder="Email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text w-100"></div>
                </div>
                <div class="mb-2">

                    <input type="text" name="nom" class="form-control" id="exampleInputPassword1" placeholder="Nom" required >
                </div>
                <div class="mb-2">
                    
                    <input type="text" name="prenom" class="form-control" id="exampleInputPassword1" placeholder="Prénom"  required>
                </div>
                <div class="mb-2">

                    <input type="text" name="tele" class="form-control" id="exampleInputPassword1" placeholder="Numéro de téléphone" required>
                </div>
                <div class="mb-2">

                    <input type="text" name="ville" class="form-control" id="exampleInputPassword1" placeholder="Ville" required>
                </div>
                <div class="mb-2">

                    <input type="text" name="adresse" class="form-control" id="exampleInputPassword1" placeholder="Adress" required>
                </div>
                <div class="mb-3">
                    
                    <input type="password" name="mp" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe"  required>
                </div>

                <button type="submit" class="btn btn-outline-light">Sauvgarder</button>
            </form>
        </div>


    </div>






    <!-- footer -->
    <?php include "incl/footer.php" ?>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.min.js"></script>
<script>
    function openCity(cityName, elmnt, color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(cityName).style.display = "block";
        elmnt.style.backgroundColor = color;

    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>
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