


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mon réseau</title>
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
        <li><a href="#">Accueil</a></li>
        <li class="active"><a href="#">Mon réseau</a></li>
        <li><a href="#">Emplois</a></li>
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
        <p> Nawel Lalioui </p>
        <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
      </div>  
    </div>


    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-center">
            <div class="panel-body">
              <p> <h3> <strong>MON RÉSEAU</strong> <span class="glyphicon glyphicon-user"> </span></h3></p>
            
              <div class="text-right">
              
              </div>    
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <p>Ami 1</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <p>Ami 2</p>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-6">
          <div class="well">
            <p>Ami 3</p>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="well">
            <p>Ami 4</p>
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