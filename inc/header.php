<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php">E-commerce</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					
					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Catégories</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php
              foreach($cat as $cat){
                print '<li><a class="dropdown-item" href="#">'.$cat['nom'].'</a></li>';
              }            

            ?>
            	
            </ul>
        </li>

        <?php 
          if(isset($_SESSION['nom'])){
            print '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profil.php">Profil</a>
        </li>';

        if( isset($_SESSION['pannier'])  &&  is_array($_SESSION['pannier'][3])){
          print '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="panier.php">panier<span class="text-danger">( '.count($_SESSION['pannier'][3]) .')</span></a>
        </li>';
        }else{
          print '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="panier.php">panier<span>( 0)</span></a>
        </li>';
        }
         
       
          } else{
            print '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inscription.php">Inscription</a>
        </li>';
          }

        ?>
        
        
    </ul>
    <form class="d-flex" action="index.php" method="POST">
    	<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
    	<button class="btn btn-outline-success" type="submit" name="submit">Search</button>
    </form>
    <?php 

     if(isset($_SESSION['nom'])){
      print'<a href="deconnexion.php" class="btn btn-primary">Déconnexion</a>';
     }
    ?>
  </div>
         </div>
    </nav>