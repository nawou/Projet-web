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
     
     $sql_post= "SELECT * FROM utilisateur WHERE prenom='$RECHERCHE' OR nom='$RECHERCHE'";

     
     $result=mysqli_query($db_handle, $sql_post);
     // On verifie les champs rentre
     while($data=mysqli_fetch_assoc($result))
       
       {
          session_start();
       $_SESSION['pseudoAmi']=$data['pseudo'];
       $_SESSION['nomAmi']=$data['nom'];
       $_SESSION['prenomAmi']=$data['prenom'];
       $_SESSION['pp1']=$data['photo'];
       header('Location: recherche.php');

       
       }
    if (!$data)
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
        <li><a href="notifications.php">Notifications</a></li>
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
 $sql = "SELECT nom, prenom,photo FROM utilisateur WHERE pseudo='$pseudo'";
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
  echo ' </p>
        <img src='.$pp.' class="img-thumbnail" height="150" width="150" alt="Avatar">
      </div>  
    </div>
 <!-- div class row -->
 </div>';
 ?> 
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
            <form method="post">
              <input id="textPost" placeholder="Postez un message         " type="text" name="textPost" /><br><br>
              <button type="button" class="btn btn-default btn-sm btn-danger">
                <span class="glyphicon glyphicon-picture"></span> Photo
              </button>  
              <button type="button" class="btn btn-default btn-sm btn-danger">
                <span class="glyphicon glyphicon-facetime-video"></span> Video
              </button>   
              <div class="text-right">
        
              <button type="submit" id="publier" name ="publier" value= "post" class="btn btn-default btn-sm btn-success">
               Publier
              </button>
              </div>     
            </form>
            </div>    
          </div>
        </div>
      </div>
    </div>
    <p>

    <?php
    $TEXTPOST = isset($_POST["textPost"])? $_POST["textPost"]:""; 
    if(isset($_POST['publier']))  
       {
    $db_handle = mysqli_connect("localhost","root", "root");
    $db_found = mysqli_select_db($db_handle, "track");
         
      
       $date=date("Y-m-d");
       $heure=date("H:i:s");
       
         // Ajouter publication dans la base de données
         $sql_post= "INSERT INTO publication (date, heure, test_publication,pseudo) VALUES ('$date', '$heure', '$TEXTPOST', '$pseudo')"; 
         
         if(mysqli_query($db_handle, $sql_post))
         {
           
         }
        } 
    
            
    $db_handle = mysqli_connect("localhost","root", "root");
    $db_found = mysqli_select_db($db_handle, "track"); 
        if ($db_found) {
     $sql1 = "SELECT pseudo, test_publication, date, heure FROM publication ORDER BY heure DESC";
     $result1 = mysqli_query($db_handle, $sql1);

     while ($data1 = mysqli_fetch_assoc($result1)) {        
    echo '<div class="row">
            <div class="well col-sm-9 panel panel-default text-left">
              <div class="col-sm-1 pp_publi " >
                <img src='.$pp.' class="img-circle" height="55" width="55" alt="Avatar"> <br><br>';
                 echo '<strong> <h4>' . $data1['pseudo'] . '</h4></strong>' ;
              echo '</div>
            <div class="well col-sm-offset-1 col-sm-8 ">';
    echo '<h4>' . $data1['test_publication'] . '</h4>' .'<br>' . '<i>' . $data1['date'] . "  " . $data1['heure'] . '</i>';


         if(mysqli_query($db_handle, $sql1))
         { 
         }
      ?><p>
     <br>
      <button type="button" class="btn btn-default btn-sm btn-danger">
                      <span class="glyphicon glyphicon-thumbs-up"></span> J'aime
                    </button>  
                  <button type="button" class="btn btn-default btn-sm btn-danger">
                      <span class="glyphicon glyphicon-comment"></span> Commenter
                    </button>  
                </div>
                </div>
                </div>

           <?php
        }
      }
      ?> 
</p>

<!-- container text center -->   
</div>
</body>
</html>