<?php 
session_start();
include "../incl/functions.php";

//cnx
$conn = connect();

$visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('Y-m-d');
// creation panier
$req_panier = "INSERT INTO paniers(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";
//execution requette paniers
$res = $conn->query($req_panier);
$panier_id = $conn->lastInsertId();

$commandes = $_SESSION['panier'][3];
foreach ($commandes as $commande) {
            //Ajout de commande
            //requette
            $quantite = $commande[0];
            $total = $commande[1];
            $id_produit = $commande[4];

            $req = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VAlUES('$quantite','$total','$panier_id','$date','$date','$id_produit')  ";

            //execution req
            $res = $conn->query($req);
}
//suppprimer le panier de seesion 
$_SESSION['panier'] = null;
header('location:../index.php');

?>