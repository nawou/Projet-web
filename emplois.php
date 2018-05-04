<!DOCTYPE html>
<html lang="en">
<head>
  <title>Emplois</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- On utilise le ichier css s'appelant styleVous.css --> 
  <head><link type="text/css" rel="stylesheet" href="stylePageAccueil.css" />
 </head>
</head>
<body>
<?php  
  session_start();
  $pseudo = $_SESSION['user'];
  $mdp= $_SESSION['mdp'];
?>
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
        <li class="active"><a href="#">Emplois</a></li>
        <li><a href="#">Messagerie</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href="#">Vous</a></li>
        <li><a href="#"><button type="button" class="btn btn-default btn-sm"> Déconnexion </button> </a><li>
        
       
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
$db_handle = mysqli_connect("localhost","root", "");
$db_found = mysqli_select_db($db_handle, "track");
 
 //si le BDD existe, faire le traitement
 if ($db_found) {
 $sql = "SELECT nom, prenom FROM utilisateur WHERE pseudo='$pseudo'";
 $result = mysqli_query($db_handle, $sql);
 while ($data = mysqli_fetch_assoc($result)) {
 echo $data['prenom'] . " ". $data['nom'];
 }//end while 
 }//end if

//si le BDD n'existe pas
 else {
 echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle);
?> </p>
        <img src="pp.png" class="img-circle" height="65" width="65" alt="Avatar">
      </div>  
    </div>


    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-center">
            <div class="panel-body">
              <p> <h3> <strong>EMPLOIS DISPONIBLES</strong> <span class="glyphicon glyphicon-briefcase"> </span></h3></p>
            
              <div class="text-right">
              
              </div>    
            </div>
          </div>
        </div>
      </div>
         
  <div class="row">
    <div class="col-sm-6">
      <div class="well">
        <p> <?php
//identifier le nom de base de données
$db_handle = mysqli_connect("localhost","root", "");
$db_found = mysqli_select_db($db_handle, "track");
 
 //si le BDD existe, faire le traitement
 if ($db_found) {
 $sql1 = "SELECT titre, compagnie ,description FROM emploi where id_offre='1'";
 $result1 = mysqli_query($db_handle, $sql1);
 while ($data1 = mysqli_fetch_assoc($result1)) {
 echo "Titre:" . $data1['titre'] . '<br>';
 echo "Compagnie: " . $data1['compagnie'] . '<br>';
 echo "Description: " . $data1['description'] . '<br>';
 }//end while 
 }//end if

//si le BDD n'existe pas
 else {
 echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle);
?> </p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
               <p> <?php
//identifier le nom de base de données
$db_handle = mysqli_connect("localhost","root", "");
$db_found = mysqli_select_db($db_handle, "track");
 
 //si le BDD existe, faire le traitement
 if ($db_found) {
 $sql2 = "SELECT titre, compagnie ,description FROM emploi where id_offre='2'";
 $result2 = mysqli_query($db_handle, $sql2);
 while ($data2 = mysqli_fetch_assoc($result2)) {
 echo "Titre:" . $data2['titre'] . '<br>';
 echo "Compagnie: " . $data2['compagnie'] . '<br>';
 echo "Description: " . $data2['description'] . '<br>';
 }//end while 
 }//end if

//si le BDD n'existe pas
 else {
 echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle);
?> </p>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
                <p> <?php
//identifier le nom de base de données
$db_handle = mysqli_connect("localhost","root", "");
$db_found = mysqli_select_db($db_handle, "track");
 
 //si le BDD existe, faire le traitement
 if ($db_found) {
 $sql3 = "SELECT titre, compagnie ,description FROM emploi where id_offre='3'";
 $result3 = mysqli_query($db_handle, $sql3);
 while ($data3 = mysqli_fetch_assoc($result3)) {
 echo "Titre:" . $data3['titre'] . '<br>';
 echo "Compagnie: " . $data3['compagnie'] . '<br>';
 echo "Description: " . $data3['description'] . '<br>';
 }//end while 
 }//end if

//si le BDD n'existe pas
 else {
 echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle);
?> </p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <p> <?php
//identifier le nom de base de données
$db_handle = mysqli_connect("localhost","root", "");
$db_found = mysqli_select_db($db_handle, "track");
 
 //si le BDD existe, faire le traitement
 if ($db_found) {
 $sql4 = "SELECT titre, compagnie ,description FROM emploi where id_offre='4'";
 $result4 = mysqli_query($db_handle, $sql4);
 while ($data4 = mysqli_fetch_assoc($result4)) {
 echo "Titre:" . $data4['titre'] . '<br>';
 echo "Compagnie: " . $data4['compagnie'] . '<br>';
 echo "Description: " . $data4['description'] . '<br>';
 }//end while 
 }//end if

//si le BDD n'existe pas
 else {
 echo "Database not found";
 }//end else
//fermer la connection
mysqli_close($db_handle);
?> </p>
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