<?php


session_start();

//tester la connexion de l'utilisateur $
if(!isset($_SESSION['nom'])){ //user non connecté
    header('location:../connexion.php');
    exit();

  }


  //selectionner le produit avec ID

include "../inc/functions.php";
//connexion base de donnée
$conn = connect();
$visiteur = $_SESSION['id'];




//var_dump($_POST);

$id_produit = $_POST['produit'];
$quantite = $_POST['quantite'];


//selectionner le produit avec ID

include "../inc/functions.php";
//connexion base de donnée
$conn = connect();
//requete
$requette = "SELECT prix FROM produit WHERE id='$id_produit' ";
$resultat = $conn->query($requette);
$produit = $resultat->fetch();

$total=$quantite*$produit['prix'];

$date = date("Y-m-d");


  //creation de panier

  $requette_panier = "INSERT INTO paniers(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";
  //execution_requett_panier
$resultat = $conn->query($requette_panier);
$panier_id = $conn->lastInsertId();

//ajouter commande 
$requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite', '$total', '$panier_id', '$date', '$date', '$id_produit' ) ";

//execution 
$resultat = $conn->query($requette);
?>