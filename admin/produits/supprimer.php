<?php 
$idProduit = $_GET['idp'];
include "../../incl/functions.php";
$conn = connect();
$req = "DELETE FROM produits  WHERE id='$idProduit'";
$res = $conn->query($req);

if ($res) {
    header("location:liste.php?delete=ok");
}

?>