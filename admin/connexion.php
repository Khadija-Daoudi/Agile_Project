<?php
  session_start();

  if(isset($_SESSION['nom'])){
    //header('location:profil.php');
  }

  include "../inc/functions.php";
  
  $user = true;
  if(!empty($_POST)){

    $user = (array)ConnectAdmin($_POST);

    if(count($user) > 0){

      session_start();
      $_SESSION['id'] = $user['id'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['nom'] = $user['nom'];
      $_SESSION['mdp'] = $user['mdp'];
      

      //function_alert("Adresse mail ou mot de passe invalide");
      header('location:profil.php');
    }

    //else{
     // function_alert("Vous êtes connectés avec succés");
     // header("location:profil.php");
    //}
    
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
</head>
<body>

	
    <div class="col-12 p-5">


      <form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse mail</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
 

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" name="mdp" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>