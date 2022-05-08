<?php

include "../../inc/functions.php";
//echo "Id de catégorie".$_GET['idc'];
$idcat = $_GET['idc'];

$conn = connect();
$req = "DELETE FROM categorie WHERE id = '$idcat'";
$res = $conn->query($req);
if($res){

	//echo "catégorie supprimée";
	header('location:liste.php?delete=ok');
}

?>