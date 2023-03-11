<?php 
$idVisiteur=$_GET['id'];

include "../../incl/functions.php";
$conn=connect();
$req="UPDATE visiteurs SET etat=1 where id='$idVisiteur'";
$res=$conn->query($req);
if ($res) {
    header('location:liste.php?valider=ok');
}else {
    echo "erreur de validation";
}
?>