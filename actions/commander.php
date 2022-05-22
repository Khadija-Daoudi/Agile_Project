<?php


session_start();

// tester la connexion de l'utilisateur $
 if(!isset($_SESSION['nom'])){ //user non connecté
     header('location:../connexion.php');
     exit();

   }


   //selectionner le produit avec ID

 include "../inc/functions.php";
 //connexion base de donnée
 $conn = connect();
 $visiteur = $_SESSION['id'];




// //var_dump($_POST);

 $id_produit = $_POST['produit'];
 $quantite = $_POST['quantite'];


// //selectionner le produit avec ID

// include "../inc/functions.php";
// //connexion base de donnée
// $conn = connect();
// //requete
 $requette = "SELECT prix , nom FROM produit WHERE id='$id_produit' ";
 $resultat = $conn->query($requette);
 $produit = $resultat->fetch();

 $total=$quantite*$produit['prix'];

 $date = date("Y-m-d");

 if(!isset($_SESSION['panier'])){//panier n'existe pas
  $_SESSION['panier']=array($visiteur , 0 , $date , array() ); // create panier

 }
 $_SESSION['panier'][1] += $total;
 $_SESSION['panier'][3][]=array($quantite , $total , $date ,$id_produit ,$produit['nom'] );

 
 header('location:../panier.php')
 ?>
