 <?php
// $user="root";
// $mdp="";
// $db="e_shop";
// $server="localhost";

// $link=mysqli_connect($server,$user,$mdp,$db);

// if($link){
//     // echo "connection valide";

// }else
// {
//     // echo "error";
// }
// shiiih
$user="Hmz_Lagh10";
$mdp="Hmz_Lagh10";
$db="e_shop";
$server="";

try {
  $conn = new PDO("mysql:host=$server;dbname=$db", $user,$mdp);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}



?>