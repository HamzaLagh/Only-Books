<?php
session_start();
// 1_recupperer les donnes de formulaire
$id = $_POST['idstock'];
$quantite = $_POST['quantite'];

// 2_la chaine de Cnx
include "../../incl/functions.php";
$conn = connect();
// 3 creation de la requette 

$req="UPDATE  stocks SET quantite='$quantite'  WHERE id='$id'";

// 4 execution de la req
$res = $conn->query($req);
if ($res) {
    header("location:liste.php?modifier=ok");
}
?>