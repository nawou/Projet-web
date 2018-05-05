<!DOCTYPE html>
<html lang="en">
<head>
  <title>Recherche</title>
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
  $pseudoAmi=$_SESSION['pseudoAmi'];
  $nomAmi=$_SESSION['nomAmi'];
  $prenomAmi=$_SESSION['prenomAmi'];
  $pp1=$_SESSION['pp1'];
  
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
       <form class="navbar-form navbar-left" role="search" method="post" >
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Rechercher.." name="navBar">
          <span class="input-group-btn">
            <button class="btn btn-default" type="input" name="recherche">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
    </div>

  <!-- Php pour la recherche-->
  
  <?php
  
  if(isset($_POST['recherche']))   
   {

     // Connection a la bdd
     
     $db_handle = mysqli_connect("localhost","root", "root");
     $db_found = mysqli_select_db($db_handle, "track");
     
     // On recupere la recherche saisie
     
     $RECHERCHE = isset($_POST["navBar"])? $_POST["navBar"]:""; 
   
     // On Verifie si il existe des utilisateurs avec ce nom/prenom
     
     $sql_post= "SELECT pseudo,photo FROM utilisateur WHERE prenom='$RECHERCHE' OR nom='$RECHERCHE'"; 
     
     $result=mysqli_query($db_handle, $sql_post);
     // On verifie les champs rentre
     while($data=mysqli_fetch_assoc($result))
       
       {
        
          session_start();
       $_SESSION['pseudoAmi']=$data['pseudo'];
       header('Location: recherche.php');
       
       }
    if (!$data)
    {
      echo "Personne introuvable";
    }
    
    
 
 }
  ?>
    <!-- Barre de menu -->
    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
      <ul class="nav navbar-nav">
        <!-- Pour montrer qu'on est dans l'onglet accueil--> 
        <li><a href="pageAccueil.php">Accueil</a></li>
        <li><a href="reseau.php">Mon réseau</a></li>
        <li><a href="emplois.php">Emplois</a></li>
        <li><a href="#">Messagerie</a></li>
        <li><a href="#notitifications.php">Notifications</a></li>
        <li><a href="profilInfos.php">Vous</a></li>
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
       <img src='.$pp.' class="img-circle" height="65" width="65" alt="Avatar">
       
      <br><br>
        <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-picture"></span> Changer ma photo
              </button>
      </div>  
    </div>';
?>



    <div class="col-sm-9">
      
        <div class="col-sm-12">
          <div class="panel panel-default text-center">
            <div class="panel-body">
              <p> <h3> <strong> <span class="glyphicon glyphicon-search"> </span> Résultat de votre recherche:</strong></h3></p>
            
               
            </div>
          </div>
        </div>
      
         
  
   
         <div class="col-sm-6">
      <div class="well">
    <p><h4>
    <?php

    echo '<strong>'  . "Pseudo: " .'</strong>'  . $pseudoAmi . '<br>';
    echo '<strong>'  ."Prénom: " .'</strong>'  . $prenomAmi . '<br>';
    echo '<strong>'  ."Nom: " .'</strong>'  . $nomAmi . '<br>';
    //echo '</h4></p><br><img src=' . $pp1 .' class="img-circle" height="65" width="65" alt="Avatar">';  ?>
 <br> <br>
 <form method="post">
    <button type="submit" class="btn btn-default btn-sm btn-success" name="submit">
                <span class="glyphicon glyphicon-user"></span> Ajouter en ami
              </button>  
  </form>
      
       </div>
        </div>
    </div>
  </div>
</div>

<?php

if(isset($_POST['submit']))   
   {



     // Connection a la bdd
     
     $db_handle = mysqli_connect("localhost","root", "root");
     $db_found = mysqli_select_db($db_handle, "track");
     
     // On recupere la recherche saisie
  
     
   
   
       // On Verifie si il existe des utilisateurs avec ce nom/prenom
     
     $sql_ami= "INSERT INTO ami (pseudo1,pseudo2) VALUES ('$pseudo', '$pseudoAmi')";
     $sql_ami2="INSERT INTO ami (pseudo1,pseudo2) VALUES ('$pseudoAmi', '$pseudo')";
     $r=mysqli_query($db_handle, $sql_ami);
     $res=mysqli_query($db_handle, $sql_ami);
     // On verifie les champs rentre
     if ($r)
       {
       
       echo 'Ami ajouté !';
       
       }
      if (!$r)
      {
        echo 'Echec ami';
      } 
     
   }

?>


<!-- Barre en bas de la page --> 
<div id="barre2" class="body">
<div id="footer" class="barre2"> Droits d'auteur | Copyright © 2018, ANS.  </div> 
</div>


</body>
</html>