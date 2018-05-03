<?php
//on recupere les donnee saisie par l'utilisateur

	$identifiant = isset($_POST["identifiant"])? $_POST["identifiant"]: ""; ;
	$password = isset($_POST["password"])? $_POST["password"]: ""; ;


echo "id: ".$identifiant.'<br>';
echo "mdp: ".$password.'<br>';

//identifier le nom de base de données

 $database = "track";
 
//connecter l'utilisateur dans BDD

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');


 $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
 $db_found = mysqli_select_db($db_handle, $database); 

//si la BDD existe
 if ($db_found) {
 
 // On recupere les infos de l'utilisateur correspondant
 
 $sql_id = "SELECT * FROM utilisateur WHERE pseudo='%id%' AND mdp='%password%";
 
 // On verifie les champs rentre
 
 if ($identifiant!="") // Si les champ identifiant n'est pas vide
 {
	$sql_id.= "WHERE pseudo LIKE '%id%'";
 

	if ($password!="") // Si le champs mdp n'est pas vide
	{
		$sql_id.= "WHERE mdp LIKE '%password%'";
	} //fin if
	
	else
	{
		echo "Veuillez indiquer un mot de passe";
		exit;
	} // Fin else
	
 } // fin if
 
 else 
 {
	echo"Veuillez indiquer un identifiant";
	exit;
 }
 
 }// Fin if
 
 else 
 {
	echo "impossible de se connecter a la base de donnée";
	exit;
} 
 
 // On effectue la requete SQL
 
 $result = mysqli_query($db_handle,$sql_id) or die (" Identifiant ou mot de passe erroné"); // Si les identifiants sont faux
 
//fermeture connexion

 mysqli_close($db_handle);
 
?>