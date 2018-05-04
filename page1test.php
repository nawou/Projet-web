
<!-- Fichier html --> 
<html> 
<title>TRACK</title>
<meta charset="utf-8">

<!-- On utilise le ichier css s'appelant style.css --> 
<head><link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
<!-- Barre de connexion en haut --> 
<div class="headerb">
</div>

<div class="header">
<!-- Logo du site dans la barre de connexion --> 

<div id="logo" class="header"><img src="track.png"/></div>
<!-- Formulaire de connexion --> 
<?php

echo '<form method="post" >
<div id="form1" class="header"> Email ou pseudo<br>
	<input id="id" placeholder="email ou pseudo" type="text" name="id" /><br>
</div>
<div id="form2" class="header">Mot de passe<br>
	<input id="mdp" placeholder="mot de passe" type="password" name="mdp"/<br>
</div>
<!-- Bouton connexion --> 
<input name="submit" type="submit" class="bouton1" value="Connexion"/>
</form>
<div>
';

$ID = isset($_POST["id"])? $_POST["id"]:""; ;
$MDP = isset($_POST["mdp"])? $_POST["mdp"]: ""; 
$db_handle = mysqli_connect("localhost","root", "");
$db_found = mysqli_select_db($db_handle, "track");

if ($db_found)
{
	if(isset($_POST['submit'])){
 // On recupere les infos de l'utilisateur correspondant
		 $sql_id = "SELECT nom FROM utilisateur WHERE pseudo='$ID' AND mdp='$MDP'";
		 $result=mysqli_query($db_handle, $sql_id);
		 // On verifie les champs rentre
		 $data=mysqli_fetch_assoc($result);
		 if ($data) // Si les champ identifiant n'est pas vide
		 {
			 session_start();
			$_SESSION['user']=$ID;
			$_SESSION['mdp']=$MDP;
			header('Location: pageAccueil.php');
		}

		else

		{
			if ($MDP=="" || $ID=="") // Si le champs mdp n'est pas vide
				{
						
						echo 'aucargf ';
			 
				} 
				
			else
			{
				echo "Identifiant ou mot de passe incorrect";
			}	
		}
	}
}
echo '</div>';
?>



<!-- Dans le corps principal de la page, texte de présentation et formulaire pour créer un compte --> 
<div class="body">
 <div id="mess1" class="body"> TRACK ou votre réseau<br>
 	social professionnel </div>
<div id="mess2" class="body"> Créer un compte</div>
<div id="img2" class="body"><img src="ece1.png"/></div>
<div id="img3" class="body"><img src="ece2.png"/></div>

<!-- Formulaire pour créer un compte -->
<form method="post" action=""=>
<div id="form3" class="body">
<input placeholder="Pseudo" type="text" class="namebox" /><br>
<input placeholder="Prénom" type="text" class="namebox" name="name1" />
<input placeholder="Nom" type="text" class="namebox" /></br>
<input type="date" class="namebox" /></br>
<input placeholder="Email" type="text" class="namebox" /></br>
<input placeholder="Mot de passe" type="password" class="namebox" /></br>
<input placeholder="Confirmer le mot de passe" type="password" class="namebox" /></br></br>
<div id="mess3" class="form3"> En cliquant sur "Inscription" vous vous engagez à accepter nos termes et conditions. <br></div>
<input type="submit" class="bouton2" value="Inscription"/>

</div>
</form>


<!-- Barre en bas de la page --> 
<div id="barre2" class="body">
<div id="footer" class="barre2"> Droits d'auteur | Copyright © 2018, ANS.  </div> 
</div>


</div>

</body>
</html>
