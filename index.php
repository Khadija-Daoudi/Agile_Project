<?php
  session_start();

  include "inc/functions.php";
  $cat = getAllCategories();

  if(!empty($_POST)){ // bouton search
   // echo $_POST['search'];
    $prod = searchProducts($_POST['search']);

  }else{
    $prod = getAllProducts();
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

      <?php
        foreach($prod as $prod){
          print '<div class="col-3 mt-2">
        <div class="card" style="width: 18rem;">
  <img src="img/'.$prod['image'].'" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">'.$prod['nom'].'</h5>
    <p class="card-text">'.$prod['description'].'</p>
    <a href="produits.php?id='.$prod['id'].'" class="btn btn-primary">Afficher</a>
  </div>
</div>
      </div>';
        }

      ?>
    </div>
    	


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>