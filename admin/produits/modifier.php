<?php
session_start();
// 1_recupperer les donnes de formulaire
$idp = $_POST['idp'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$createur =  $_POST['createur'];
$categorie = $_POST['categorie'];
$dateModification = date("Y-m-d"); //2022-08-06

// 2_la chaine de Cnx
include "../../incl/functions.php";
$conn = connect();
// 3 creation de la requette 

$req=" UPDATE  produits SET nom='$nom', description='$description', prix='$prix', categorie='$categorie' WHERE id='$idp'";
// $req=" UPDATE produits
// SET nom = '$nom'
// WHERE id =28 ";

// 4 execution de la req
$res = $conn->query($req);
if ($res) {
    header("location:liste.php?modifier=ok");
}
?>