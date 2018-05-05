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
  $pp=$data['photo'];
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
        <li><a href="profilInfos.php">Vous</a></li>
        <li class="active"><a href="profilModif.php">Modifier mon profil</a></li>
         <li><a href="page1test.php"><button type="button" class="btn btn-default btn-sm"> Déconnexion </button> </a><li>
        
       
      </ul>
      
    </div>
  </div>
</nav>
  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
          <p> 
          <?php
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
            <p> <h4> <strong>MODIFIER MON PROFIL</strong> <span class="glyphicon glyphicon-user"> </span></h4></p>
            <small id="changeHelp" class="form-text text-muted"> Veuillez entrer les informations que vous souhaitez modifier et cliquer sur "confirmer": </small>
<?php
//identifier le nom de base de données
$db_handle = mysqli_connect("localhost","root", "root");
$db_found = mysqli_select_db($db_handle, "track");

echo '<form method="post" =>
  <div class="form-group">
    <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Nouveau prénom">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nouveau nom">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="numero" name="numero" placeholder="Nouveau numéro de téléphone">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="sexe" name="sexe" placeholder="Préciser votre sexe (par F ou M)">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="statut" name="statut" placeholder="Nouveau statut professionnel">
  </div>
    <button name="submit" type="submit" class="btn btn-default btn-sm btn-danger">
                 <h5>  Confirmer </h5> 
              </button>

</form>';

//on recupere les donnees saisie par l'utilisateur

  $prenom = isset($_POST["prenom"])? $_POST["prenom"]: ""; 
  $nom = isset($_POST["nom"])? $_POST["nom"]: ""; 
  $numero = isset($_POST["numero"])? $_POST["numero"]: ""; 
  $sexe = isset($_POST["sexe"])? $_POST["sexe"]: ""; 
  $statut = isset($_POST["statut"])? $_POST["statut"]: ""; 

if ($db_found)
{
  if(isset($_POST['submit'])){
  
      if( $prenom=="" || $nom=="" || $numero=="" || $sexe=="" || $statut=="")
       {
        echo "Tous les champs ne sont pas remplis";
       }

      else
      {$sql_modif= "UPDATE utilisateur SET prenom='$prenom', nom='$nom', tel='$numero', sexe='$sexe', statut_pro='$statut' WHERE pseudo='$pseudo'";
        $result=mysqli_query($db_handle, $sql_modif);
        header('Location: profilInfos.php');
        
      }
  }

}

else
{
  echo "echec de connexion a la bdd"; 
}

?>   

             
              <br> <br>  <p> <h4>  </p> </h4>
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