<?php

  session_start();

  if(isset($_SESSION['nom'])){
    header('location:profil.php');
  }

  include "inc/functions.php";
  $showRegistrationAlert = 0;
  $cat = getAllCategories();

  if(!empty($_POST)){
    if(AddVisitor($_POST)){
      //$showRegistrationAlert = 1;
      function_alert("Visiteur ajouté !");
    }
    //function_alert("Visiteur ajouté !");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>e-commerce</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.min.css"> 
</head>
<body>

	 <?php
     include "inc/header.php";
  ?>
    <div class="col-12 p-5">
      <form action="inscription.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse mail</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Nom</label>
    <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Prénom</label>
    <input type="text" name="prenom" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Téléphone</label>
    <input type="text" name="telephone" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.6/sweetalert2.all.min.js"></script>

<?php 
if($showRegistrationAlert == 1){
  print "
<script>
$wal.fire({
  title: 'Succès',
  text: 'Création de compte avec succès',
  icon: 'success',
  confirmButtonText: 'ok'
})
</script>

";
}
?>
</html>