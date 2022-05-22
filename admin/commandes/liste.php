<?php 
session_start();

include "../../inc/functions.php";
$commande = getAllCommandes();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Profil Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Déconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <?php 

        include "../template/navigation.php";

        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des commandes</h1>

            <div>
            </div>

          </div>

          <div>
          <?php 
            if(isset($_GET['ajout']) && $_GET['ajout'] == "ok"){
            print '<div class="alert alert-success">
              Commande ajoutée

            </div>';}

          ?>

          <?php 
            if(isset($_GET['delete']) && $_GET['delete'] == "ok"){
            print '<div class="alert alert-success">
              Commande supprimée

            </div>';}

          ?>


          <?php 
            if(isset($_GET['modif']) && $_GET['modif'] == "ok"){
            print '<div class="alert alert-success">
              Commande modifiée

            </div>';}

          ?>

<?php 
            if(isset($_GET['erreur']) && $_GET['erreur'] == "duplicate"){
            print '<div class="alert alert-danger">
              Nom de commande existe déjà
            </div>';}

          ?>

          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client</th>
      <th scope="col">Total</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>


    <?php 
     $i=0;
       foreach($commandes as $c){
        $i++;
        print '<tr>
      <th scope="row">'.$i.'</th>
      <td>'.$c['nom'].' '.$c['prenom']'</td>
      <td>'.$c['total'].'</td>
      <td>'.$c['date_creation'].'</td>
      <td>
        <a data-toggle="modal" data-target="#editModal'.$c['id'].'" class="btn btn-success">Modifier</a>
        <a onclick="return popUpDeleteCategorie()" href="supprimer.php?idc='.$c['id'].'" class="btn btn-danger">Supprimer</a>




      </td>
    </tr>';
       }
    ?>
    
    
    
  </tbody>
</table>
    


            </div>



          
        </main>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/vendor/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script>

      function popUpDeleteCategorie(){
        return confirm("Voulez-vous vraiment supprimer la catégorie?");
      }
      </script>
  </body>
</html>