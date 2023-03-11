<?php 
$idCategorie = $_GET['idc'];
include "../../incl/functions.php";
$conn = connect();
$req = "DELETE FROM categories  WHERE id='$idCategorie'";
$res = $conn->query($req);

if ($res) {
    header("location:liste.php?delete=ok");
}

?>