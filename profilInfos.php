<!DOCTYPE html>
<html lang="en">
<head>
  <title>Votre profil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- On utilise le ichier css s'appelant styleVous.css --> 
  <head><link type="text/css" rel="stylesheet" href="stylePageAccueil.css" />
 </head>
</head>

<?php  
  session_start();
  $pseudo = $_SESSION['user'];
  $mdp= $_SESSION['mdp'];
?>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div id="img" class="header"><img src="trackpetit.png"/></div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
       <!-- Recherche -->
       <form class="navbar-form navbar-left" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Rechercher..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
    </div>
    <!-- Barre de menu -->
    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
      <ul class="nav navbar-nav">
        <!-- Pour montrer qu'on est dans l'onglet accueil--> 
        <li><a href="pageAccueil.php">Accueil</a></li>
        <li><a href="reseau.php">Mon réseau</a></li>
        <li><a href="emplois.php">Emplois</a></li>
        <li><a href="#">Messagerie</a></li>
        <li><a href="notifications.php">Notifications</a></li>
        <li class="active"><a href="profilInfos.php">Vous</a></li>
         <li><a href="profilModif.php">Modifier mon profil</a></li>
         <li><a href="page1test.php"><button type="button" class="btn btn-default btn-sm"> Déconnexion </button> </a><li>
        
       
      </ul>
      
    </div>
  </div>
</nav>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
          <p> <?php
//identifier le nom de base de données
$db_handle = mysqli_connect("localhost","root", "root");
$db_found = mysqli_select_db($db_handle, "track");
 
 //si le BDD existe, faire le traitement
 if ($db_found) {
 $sql = "SELECT nom, prenom, photo FROM utilisateur WHERE pseudo='$pseudo'";
 $result = mysqli_query($db_handle, $sql);
 while ($data = mysqli_fetch_assoc($result)) {
 echo '<u><h4>' . $data['prenom'] . " ". $data['nom'] . '</h4></u>';
 $pp=$data['photo'];
 }//end while 
 }//end if

//si le BDD n'existe pas
 else {
 echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle);
echo '</p>
       <img src='.$pp.' class="img-thumbnail" height="150" width="150" alt="Avatar">
       
      <br><br>
        <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-picture"></span> Changer ma photo
              </button>
      </div>  
    </div>';
?>


    <div class="col-sm-9">
      
      
      
      <div class="row">
    
        <div class="col-sm-12">
          <div class="well">
            <p> <h3> <strong>MON PROFIL</strong> <span class="glyphicon glyphicon-user"> </span></h3></p>
            
            <a href="profilInfos.php"><button type="button" class="btn btn-default btn-sm btn-success">
               <h5> Mes informations</h5>  <span class="glyphicon glyphicon-envelope"></span>
              </button> </a>
            <a href="profilPhotos.php"><button type="button" class="btn btn-default btn-sm">
               <h5> Mes photos</h5>    <span class="glyphicon glyphicon-picture"></span> 
              </button></a>
            <a href="profilCV.php"><button type="button" class="btn btn-default btn-sm">
                 <h5>  Mon CV </h5> <span class="glyphicon glyphicon-briefcase"></span>
              </button></a>

             
              <br> <br>  <p> <h4> <?php
//identifier le nom de base de données
$db_handle = mysqli_connect("localhost","root", "root");
$db_found = mysqli_select_db($db_handle, "track");
 
 //si le BDD existe, faire le traitement
 if ($db_found) {
 $sql1 = "SELECT date_naissance, tel ,sexe, statut_pro  FROM utilisateur where pseudo='$pseudo'";
 $result1 = mysqli_query($db_handle, $sql1);
 while ($data1 = mysqli_fetch_assoc($result1)) {
 echo '<strong>' . "Date de naissance: " .'</strong>'  . $data1['date_naissance'] . '<br>';
 echo '<strong>' . "Téléphone: " .'</strong>'  . $data1['tel'] . '<br>';
 echo '<strong>' . "Sexe: " .'</strong>'  . $data1['sexe'] . '<br>';
 echo '<strong>' . "Statut professionnel: " .'</strong>'  . $data1['statut_pro'] . '<br>';
 }//end while 
 }//end if

//si le BDD n'existe pas
 else {
 echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle);
?> </p> </h4>
          </div>
        </div>
      </div>
     
          
    </div>
   
  </div>
</div>

<!-- Barre en bas de la page --> 
<div id="barre2" class="body">
<div id="footer" class="barre2"> Droits d'auteur | Copyright © 2018, ANS.  </div> 
</div>


</body>
</html>