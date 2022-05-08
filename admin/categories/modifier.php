<?php 

session_start();

$idc = $_POST['idc'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$date_modif = date("Y-m-d");

include "../../inc/functions.php";
$conn = connect();

$req = "UPDATE categorie SET nom='$nom', description='$description', date_modif='$date_modif' WHERE id='$idc'";

$res = $conn->query($req);
if($res){
	header('location:liste.php?modif=ok');

}


?>