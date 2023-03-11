<?php 
session_start();

if (!isset($_SESSION['id'])) {
    header('location:../connexion-registration.php');
    exit();
}

include "../incl/functions.php";

//cnx
$conn = connect();

$visiteur = $_SESSION['id'];



$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];


// //requette
$req = "SELECT prix,nom from produits where id='$id_produit' ";

//execution req
$res = $conn->query($req);
$produit = $res->fetch();
$total = $quantite * $produit['prix'];
$date = date('Y-m-d');

if (!isset($_SESSION['panier'])) {   //panier n'existe pas
    $_SESSION['panier'] = array( $visiteur , 0 , $date , array() ); //creation de panier
}
$_SESSION['panier'][1] += $total ;
 $_SESSION['panier'][3][] = array($quantite , $total , $date , $date , $id_produit, $produit['nom'] );




header('location:../panier.php');

?>