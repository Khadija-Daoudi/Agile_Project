<?php
session_start();
//selectionner le produit avec ID

include "../inc/functions.php";
//connexion base de donnée
$conn = connect();
// id visiteur 
$visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('Y-m-d');
//creation de panier

$requette_panier = "INSERT INTO paniers(visiteur,total,date_creation) VALUES('$visiteur','$total','$date')";

//execution_requett_panier

$resultat = $conn->query($requette_panier);
$panier_id = $conn->lastInsertId();

$commandes = $_SESSION['panier'][3];


foreach($commandes as $commande){
        // //ajouter commande 
        $quantite = $commande[0];
        $total = $commande[1];
        $id_produit = $commande[4];
        $requette = "INSERT INTO commandes(quantite,total,panier,date_creation,date_modification,produit) VALUES('$quantite', '$total', '$panier_id', '$date', '$date', '$id_produit' ) ";

        // //execution 
        $resultat = $conn->query($requette);
}

// supprimer la panier
$_SESSION['panier'] = null ; 
// redirection vers la page index 
header('location:../index.php')



?>