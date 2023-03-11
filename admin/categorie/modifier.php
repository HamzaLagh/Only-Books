<?php
session_start();
// 1_recupperer les donnes de formulaire
$id = $_POST['idc'];
$nom = $_POST['nom'];
$descrption = $_POST['description'];
$dateModification = date("Y-m-d"); //2022-08-06

// 2_la chaine de Cnx
include "../../incl/functions.php";
$conn = connect();
// 3 creation de la requette 

$req="UPDATE  categories SET nom='$nom',language='$descrption',date_modification='$dateModification' WHERE id='$id'";

// 4 execution de la req
$res = $conn->query($req);
if ($res) {
    header("location:liste.php?modifier=ok");
}
?>