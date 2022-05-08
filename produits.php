<?php

  include "inc/functions.php";
  $cat = getAllCategories();
  //$produit = getProductbyId();

  if(isset($_GET['id'])){
    $produit = getProductbyId($_GET['id']);

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

	<?php
     include "inc/header.php";
  ?>

    <div class="row col-12 mt-4">

      <div class="card col-8 offset-2">
  <img src="img/<?php echo $produit['image']; ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $produit['nom'] ?></h5>
    <p class="card-text"><?php echo $produit['description'] ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $produit['prix'] ?></li>
        
  </ul>
    
<div class ="col-12 m-2">
  <form class="d-flex" action="actions/commander.php" method="POST">

  <input type="hidden" value="<?php echo $produit['id'] ?>" name="produit">
  <input type="number" class ="form-control" name="quantite" step="1" placeholder="Quantité du produit...">
  <button type="submit" class = "btn btn-primary">Commander</button>
  </form>
</div>
</div>

    </div>

      


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

<!-- <?php
          //foreach($cat as $index => $c){
            //if ($c['id'] == $produit['categorie']){
             // print '<button class="btn btn-success mb-2">'.$c['nom'].'</button>';
            //}
          //}
      ?>-->