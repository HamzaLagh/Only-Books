<?php
function connect(){
  $user="u322053445_e_shop_Db";
  $mdp="E_shop10";
  $db="u322053445_e_shop_Db";
  $server="localhost";
  try {
    $conn = new PDO("mysql:host=$server;dbname=$db", $user,$mdp);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection faile: " . $e->getMessage();
  }

  return $conn;
}


function getAllCatg(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="select * from categories";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $categories= $res ->fetchAll();

  return $categories;
}
function getArabeCatg(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="select * from categories where language='arabe' ";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $categories= $res ->fetchAll();

  return $categories;
}

function getFrenchCatg(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="select * from categories WHERE language='french' ";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $categories= $res ->fetchAll();

  return $categories;
}

function getEnglishCatg(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="select * from categories WHERE language='english' ";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $categories= $res ->fetchAll();

  return $categories;
}

function getAllProd(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="select * from produits";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $produits= $res ->fetchAll();

  return $produits;
}
function getArabeProd(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="SELECT * FROM produits INNER JOIN categories ON produits.categorie = categories.id WHERE categories.language='arabe'";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $produits= $res ->fetchAll();

  return $produits;
}
function getFrenchProd(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="SELECT * FROM produits INNER JOIN categories ON produits.categorie = categories.id WHERE categories.language='french'";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $produits= $res ->fetchAll();

  return $produits;
}
function getEnglishProd(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="SELECT * FROM produits INNER JOIN categories ON produits.categorie = categories.id WHERE categories.language='english'";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $produits= $res ->fetchAll();

  return $produits;
}
function getManyProdPopulaire(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="SELECT * FROM `produits` WHERE categorie=1 limit 10;";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $produits= $res ->fetchAll();

  return $produits;
}

function getManyProdDevPers(){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="SELECT * FROM `produits` WHERE categorie=3 limit 10;";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $produits= $res ->fetchAll();

  return $produits;
}

function searchProd($keywords){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="SELECT * from produits where nom like '%$keywords' ";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $produits= $res ->fetchAll();

  return $produits;
}

function getProduitById($id){
  //1-base donnees
  $conn = connect();
  //2-creation de la requette
  $req="SELECT * from produits where id=$id ";
  //3-execution de la requette
  $res=$conn->query($req);
  //4-resultat de la requette
    $produit= $res ->fetch();

  return $produit;
}

function AddVisiteurs($data){
  $conn = connect();
  $req="INSERT INTO visiteurs(nom,prenom,email,mp,telephone,ville) VALUES('".$data['nom']."','".$data ['prenom']."','".$data ['email']."','".$data ['mp']."','".$data['tele']."','".$data['ville']."')";
  $res=$conn->query($req);
  if ($res) {
      return true;
  }else {
    return false;
  }
}
function ModifierVisiteurs($data){
  $conn = connect();
  $req =" UPDATE visiteurs SET nom='".$data['nom']."' , prenom='".$data ['prenom']."' , email='".$data ['email']."' , mp='".$data ['mp']."' , telephone='".$data ['tele']."', ville='".$data ['ville']."' WHERE id='".$data ['id']."'  ";
  $res = $conn->query($req);
  if ($res) {
    return true;
}else {
  return false;
}
}

function connectVisiteur($data)
{
  $conn = connect();
  $email=$data ['email'];
  $mp=$data ['mp'];
  $req="SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp' ";
  $res=$conn->query($req);
  $user=$res->fetch();

  return $user;
}

function connectAdmin($data)
{
  $conn = connect();
  $email=$data ['email'];
  $mp=$data ['mp'];
  $req="SELECT * FROM administrateur WHERE email='$email' AND mp='$mp' ";
  $res=$conn->query($req);
  $user=$res->fetch();

  return $user;
}

function getAllUsers(){
  $conn =connect();
  $req="SELECT * FROM visiteurs WHERE etat=0 ";

  $res = $conn->query($req);
  $user=$res->fetchAll();
  return  $user;


}

function getStocks(){
  $conn =connect();
  $req=" SELECT s.id,p.nom,s.quantite FROM produits p, stocks s WHERE p.id = s.produit; ";

  $res = $conn->query($req);
  $stocks=$res->fetchAll();
  return  $stocks;
}

function getAllPaniers(){
  $conn =connect();
  $req=" SELECT v.nom , v.prenom , v.telephone , p.total , p.etat , p.date_creation, p.id FROM paniers p, visiteurs v WHERE p.visiteur = v.id; ";

  $res = $conn->query($req);
  $paniers = $res->fetchAll();
  return  $paniers;
}

function getAllCommandes(){
  $conn =connect();
  $req=" SELECT p.nom , p.image , c.quantite , c.total , c.panier  FROM produits p, commandes c WHERE c.produit = p.id; ";

  $res = $conn->query($req);
  $commandes = $res->fetchAll();
  return  $commandes;
}

function changerEtatPanier($data){
  $conn =connect();
  $req=" UPDATE paniers SET etat='".$data['etat']."' where id='".$data['panier_id']."'   ";
  $res = $conn->query($req);
}

function getPanierByEtat($paniers,$etat){

  $paniersEtat = array();

  foreach ($paniers as $p) {
    if ($p['etat'] == $etat) {
      array_push($paniersEtat,$p);
     
    }
  }
  return $paniersEtat;
}

function editAdmin($data){
  $conn =connect();
  if ($data['mp'] !=" ") {
    $req=" UPDATE administrateur SET nom='".$data['nom']."', email='".$data['email']."', mp='".$data['mp']."' where id='".$data['id_admin']."'   ";
  }else {
    $req=" UPDATE administrateur SET nom='".$data['nom']."', email='".$data['email']."' where id='".$data['id_admin']."'   ";
  }
  $res = $conn->query($req);

  return true;
}

function getData(){
  $data = array(); 
  $conn =connect();

  $req1 = " SELECT count(*) from produits ";
  $res = $conn->query($req1);
  $nbrProds = $res->fetch();

  $req2 = " SELECT count(*) from categories ";
  $res2 = $conn->query($req2);
  $nbrCat = $res2->fetch();

  $req3 = " SELECT count(*) from visiteurs ";
  $res3 = $conn->query($req3);
  $nbrClients = $res3->fetch();

  $data["produits"] = $nbrProds[0]; 
  $data["categories"] = $nbrCat[0]; 
  $data["clients"] = $nbrClients[0];
  
  return $data ;
}
?>
