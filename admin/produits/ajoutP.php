<?php
session_start();

$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$createur =  $_POST['createur'];
$categorie = $_POST['categorie'];
$quantite = $_POST['quantite'];
$date_creation = date('Y-m-d');
$id = $_POST['idp'];

$target_dir = "../../images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);


    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
      $image = $_FILES["image"]["name"];
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
$date = date('Y-m-d');

//2--
    include "../../incl/functions.php";
    $conn = connect();

try {
    // 3 creation de la requette 
    
    $req="INSERT INTO produits(nom,description,prix,image,categorie,createur,date_creation) VALUES ('$nom','$description','$prix','$image','$categorie','$createur','$date')";
    
    // 4 execution de la req
    $res = $conn->query($req);
 
    if ($res) {
        $produit_id = $conn->lastInsertId();
        $req2 ="INSERT INTO stocks(produit,quantite,createur,date_creation) VALUES ('$produit_id','$quantite','$createur','$date_creation')";

        if( $conn->query($req2)){
            header('location:liste.php?ajout=ok');

        }else{
            echo "impossible dajouter" ;
        }
        
    }
}catch(PDOException $e){
    if ($e->getCode()==23000) {
        echo 'error';
    }
}

?>
