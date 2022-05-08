<?php

function connect(){

	$servername = "localhost";
   $DBuser = "root";
   $DBpassword = "";
   $DBname = "agile";

try {
$conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

return $conn;


}

function getAllCategories(){

	$conn = connect();

$req = "SELECT * FROM categorie";
$res = $conn->query($req);
$cat = $res->fetchAll();

return $cat;
}

function getAllProducts(){
	$conn = connect();
$req = "SELECT * FROM produit";
$res = $conn->query($req);
$prod = $res->fetchAll();

return $prod;
}


function searchProducts($keywords){

	$conn = connect();

$req = "SELECT * FROM produit WHERE nom LIKE '%$keywords%' ";
$res = $conn->query($req);
$prod = $res->fetchAll();
return $prod;

}

function getProductbyId($id){
	$conn = connect();

	$req = "SELECT * FROM produit WHERE id=$id";
	$res = $conn->query($req);
	$produit = $res->fetch();

	return $produit;

}

function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}

function AddVisitor($data){
	$conn = connect();
	$mdphash = md5($data['mdp']);

	$req = "INSERT INTO visiteur(nom,prenom,email,mdp,telephone) VALUES('".$data['nom']."','".$data['prenom']."','".$data['email']."','".$mdphash."','".$data['telephone']."')";

	$res = $conn->query($req);

	if($res){
		return true;
		
	}

	else{return false;}
}


function ConnectVisitor($data){
	$conn = connect();

	$email = $data['email'];
	$mdp = md5($data['mdp']);

	$req = "SELECT * FROM visiteur WHERE email='$email' AND mdp='$mdp'";
	$res = $conn->query($req);
	$user = $res->fetch();
	//var_dump($user);

	return $user;


}


function ConnectAdmin($data){

	$conn = connect();

	$email = $data['email'];
	$mdp = md5($data['mdp']);

	$req = "SELECT * FROM administrateur WHERE email='$email' AND mdp='$mdp'";
	$res = $conn->query($req);
	$user = $res->fetch();
	//var_dump($user);

	return $user;

}



function getAllUsers(){
	$conn = connect();
	
	$req = "SELECT * FROM visiteur WHERE etat=0";
	$res = $conn->query($req);
	$users = $res ->fetchAll();
	return $users;
}


function getStock(){

	$conn = connect();
	
	$req = "SELECT p.nom,s.id,s.quantite FROM produit p ,stocks s WHERE p.id = s.produit";
	$res = $conn->query($req);
	$stocks = $res ->fetchAll();
	return $stocks;

}


?>