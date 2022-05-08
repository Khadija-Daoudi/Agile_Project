<?php
session_start();

$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$createur = $_POST['createur'];
$categorie = $_POST['categorie'];
$quantite = $_POST['quantite'];
$date_creation = date("Y-m-d");


$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

$date = date("Y-m-d");

include "../../inc/functions.php";
$conn = connect();

try {
     $req = "INSERT INTO produit(nom,description,prix,image,createur,categorie,date_creation) VALUES('$nom','$description','$prix','$image','$createur','$categorie','$date')";
   
    $res = $conn->query($req);

if($res){

    $produit_id = $conn ->lastInsertId();

    $req2 = "INSERT INTO stocks(produit,quantite,createur,date_creation) VALUES('$produit_id','$quantite','$createur', '$date_creation')";

  if($conn->query($req2)){
    header('location:liste.php?ajout=ok');

  } else {
    echo "Impossible d'ajouter le stock du produit";
  }

}


} catch(PDOException $e){
	echo "Connection failed:" . $e->getMessage();
	if($e->getcode() == 23000){
		header('location:liste.php?erreur=duplicate');
	}

}
?>