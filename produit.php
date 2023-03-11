<?php
session_start();
include "incl/functions.php";
$categories = getAllCatg();

if (isset($_GET['id'])) {
    $produit = getProduitById($_GET['id']);
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
        .card {
            position: relative;
            padding: 5%;
            width: 40%;
            height:auto;
            /* height: 50%; */
            justify-content: center;
            margin: 7% 0 4% 0;
            background: linear-gradient(#5FC3E4);
            box-shadow: 0 0 0.3em;
            border-radius: 5px;
        }
        .description{
            width: 150%;
            margin-bottom:20%;
            }
        .prix{
            font-weight: bold;
        }
        .commander{
            background-color:#5FC3E4;
            width: 90%;
            height: 40px;
            border-radius: 8px;
            border:solid gray 0.01px;
        }
        .commander:hover{
            border:solid black 0.1px
        }
        @media only screen and (max-width: 600px) {
            .card {
                position: relative;
                padding: 5%;
                width: 80%;
                height:auto;
                justify-content: center;
                margin: 30% 0 4% 0;
                background: linear-gradient(#5FC3E4);
                box-shadow: 0 0 0.3em;
                border-radius: 5px;
            }
            .nom{
                font-size:medium;
            }
            .card-img-top {
                position: relative;
                width: 30%;
            }
            .description{
                font-size: small;
                height:auto;
                width: 150%;
                margin-bottom:300px;
            }
            .prix{
                width: 45%;
                font-size: 9px;
                height: 30px;
                margin-top:10% ;
                margin-bottom: 2%;
                padding-top:9px;
            }
            .quantite{
                width: 45%;
                height: 30px;
                font-size:9px;
            }
            .commander{
                width: 50%;
                height: 30px;
                font-size:9px;
                background-color: #5FC3E4;

            }
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php
    include "incl/header.php";
    ?>

    <!-- // fin header -->

    <div class="card position-relative top-100 start-50 translate-middle-x  " class="card" ">
        <div class=" row g-0 w-75 ">
            <div class=" col-md-5">
        <img src="images/<?php echo $produit['image'] ?>" class="card-img-top " alt="...">
    </div>
    <div class="col-md-7">
        <div class="card-body">
            <h5 class="card-title nom"><?php echo $produit['nom'] ?></h5>
            <p class="card-text description"><?php echo $produit['description'] ?></p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="form-control mb-3 ms-3 prix"><?php echo $produit['prix']  ?>.00 MAD</li>
            <?php
            //affichage du nom de categorie
            // foreach ($categories as $index => $c) {
            //     if ($c['id'] == $produit['categorie']) {
            //         print '<button class=" mb-2">' . $c['nom'] . '</button>';
            //     }
            // }
            ?>
        </ul>
        <div>
            <form action="actions/commander.php" method="POST">
                <input type="hidden" value="<?php echo $produit['id']  ?>" name="produit">
                <input type="number" name="quantite" class="form-control mb-2 ms-3 quantite" placeholder="Quantite de produit..." required>
                <button type="submit"  class="ms-3 fw-bold commander" ><i class="bi bi-bag-plus"></i> Commander</button>
            </form>
        </div>
    </div>
    </div>
    </div>

    <?php include "incl/footer.php" ?>
</body>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</html>
