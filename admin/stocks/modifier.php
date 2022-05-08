<?php 

session_start();

$ids = $_POST['ids'];
$quantite = $_POST['quantite'];

include "../../inc/functions.php";
$conn = connect();

$req = "UPDATE stocks SET quantite='$quantite' WHERE id='$ids'";

$res = $conn->query($req);
if($res){
	header('location:liste.php?modif=ok');

}


?>