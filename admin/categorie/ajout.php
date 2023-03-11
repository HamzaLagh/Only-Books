<?php
session_start();
// 1_recupperer les donnes de formulaire
$nom = $_POST['nom'];
$descrption = $_POST['description'];
$createur = $_SESSION['id'];
$dateCreation = date("Y-m-d"); //2022-08-06

// 2_la chaine de Cnx
include "../../incl/functions.php";
$conn = connect();
// 3 creation de la requette 

$req="INSERT INTO categories(nom,language,createur,date_creation) VALUES ('$nom','$descrption','$createur','$dateCreation')";

// 4 execution de la req
$res = $conn->query($req);
if ($res) {
    header("location:liste.php?ajout=ok");
}
?>