<!DOCTYPE html>
<html lang="en">
<head>
  <title>TRACK</title>
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
       <form class="navbar-form navbar-left" method="post">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Rechercher.." name="navBar" id="navBar">
          <span class="input-group-btn">
            <button class="btn btn-default" type="input" name="recherche" id="recherche">
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
		 
		 $db_handle = mysqli_connect("localhost","root", "");
		 $db_found = mysqli_select_db($db_handle, "track");
		 
		 // On recupere la recherche saisie
		 
		 $RECHERCHE = isset($_POST["navBar"])? $_POST["navBar"]:""; 
	 
		 // On Verifie si il existe des utilisateurs avec ce nom/prenom
		 
		 $sql_post= "SELECT prenom, nom FROM utilisateur WHERE prenom='$RECHERCHE' OR nom='RECHERCHE'"; 
		 
		 $result=mysqli_query($db_handle, $sql_post);
		 // On verifie les champs rentre
		 $data=mysqli_fetch_assoc($result);
		 if ($data) // Si les champ identifiant n'est pas vide
		 {
			 echo "on a trouve ce pelo: " .$RECHERCHE;
			 while ($data = mysqli_fetch_assoc($result)) {
		echo "prenom: " . $data['prenom'] . '<br>';
		echo "nom: " . $data['nom'] . '<br>';
		}
		 }
		else
		{
			echo "On a trouvé personne";
		}
		
		
 
 }
	 
	
	
	
	
	
	
	
	?>
    <!-- Barre de menu -->
    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
      <ul class="nav navbar-nav">
        <!-- Pour montrer qu'on est dans l'onglet accueil--> 
        <li class="active"><a href="pageAccueil.php">Accueil</a></li>
        <li><a href="reseau.php">Mon réseau</a></li>
        <li><a href="emplois.php">Emplois</a></li>
        <li><a href="#">Messagerie</a></li>
        <li><a href="#">Notifications</a></li>
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
          <div class="panel panel-default text-left">
            <div class="panel-body">
            <form method="post">
              <input id="textPost" placeholder="Post" type="text" name="textPost" /><br>
              <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-picture"></span> Photo
              </button>  
              <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-facetime-video"></span> Video
              </button>   
              <div class="text-right">
        
              <button type="submit" id="publier" name ="publier" value= "post" class="btn btn-default btn-sm">
               Publier
              </button> 
        </form>
              </div>    
            </div>
          </div>
        </div>
      </div>
<?php
   if(isset($_POST['publier']))  
   {
     $db_handle = mysqli_connect("localhost","root", "");
$db_found = mysqli_select_db($db_handle, "track");
     
     $TEXTPOST = isset($_POST["textPost"])? $_POST["textPost"]:""; 
   $date=date("Y-m-d");
   $heure=date("H:i:s");
   
     // On recupere les infos de l'utilisateur correspondant
     $sql_post= "INSERT INTO publication (date, heure, text_publication) VALUES ('$date', '$heure', '$TEXTPOST')"; 
     
     if(mysqli_query($db_handle, $sql_post))
     {
       
       
     }
	 
	 
   
}
  
  
    
    
    
    
?>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p><?php 
            echo $data['prenom'] . " ". $data['nom'];
            ?></p>
           <img src="pp.png" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p><?php 
            echo $TEXTPOST .'<br>' . $date . "  " . $heure;
            ?></p>
            <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-thumbs-up"></span> J'aime
              </button>  
            <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-comment"></span> Commenter
              </button>  
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Bo</p>
           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
            <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-thumbs-up"></span> J'aime
              </button>  
            <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-comment"></span> Commenter
              </button>  
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Jane</p>
           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
            <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-thumbs-up"></span> J'aime
              </button>  
            <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-comment"></span> Commenter
              </button>  
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