<?php
//on recupere les donnee saisie par l'utilisateur

	$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"]: ""; ;
	$name = isset($_POST["name"])? $_POST["lastName"]: ""; ;
	$lastName = isset($_POST["lastName"])? $_POST["lastName"]: ""; ;
	$birth = isset($_POST["birth"])? $_POST["birth"]: ""; ;
	$email = isset($_POST["email"])? $_POST["email"]: ""; ;
	$mdp = isset($_POST["mdp"])? $_POST["mdp"]: ""; ;
	$mdpVerif = isset($_POST["mdpVerif"])? $_POST["mdpVerif"]: ""; ;
	
	
	require "bdd.php";


	 if( $pseudo!="" && $name!="" && $lastName!="" && $birth!="" && $email!="" && $mdp!="" && $mdpVerif!="")
	 {
		 // On verifie que le pseudo rentré n'existe pas deja
		 
		 $sql_checkPseudo= "SELECT pseudo FROM utilisateur WHERE pseudo='$peudo'";
		 
		 $result=my_sql_query($sql_checkPseudo) or die mysql_error(); // Envoi de la requete
		 
		 if ((mysql_num_rows($result)==0) && ($mdp=$mdpVerif)) // Si pseudo n'existe pas et les deux mots de passe saisit sont equivalents
		 {
			 $sql= "INSERT INTO `utilisateur` (`pseudo`, `nom`, `prenom`, `email`, `mdp`, `date_naissance`, `tel`, `sexe`, `statut_pro`, `id_statut`, `id_formation`, `id_experience`, `id_interet`, `id_competence`)
		 VALUES ('$pseudo','$lastName','$name', '$email', '$mdp','$birth', 00000000, '', 'inconnu', NULL, NULL, NULL, NULL, NULL)" ;
		 }
		 
		 else
		 {
			 
		 if ($mdp==$mdpVerif)
		 {
			echo "failMdp"; // Si les mdp ne sont pas identiques
		 }
		
			else 
			{
				echo "failPseudo"; // Si le pseudo existe deja
			}
			

		 
		 
	 }
	 
	 else
	 {
		 echo "failChamps"; // si tous les champs de sont pas rempli
	 }
 

 
 
 mysqli_query($db_handle,$sql)
 echo "success"; // Si l'ajout est un succès
 
 }
 

 
 
 
 
 
 
 
 
 


 
 