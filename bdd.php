<?php 


//connecter l'utilisateur dans BDD

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');


 $db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
 $db_found = mysqli_select_db($db_handle, $database);

if (!$db_found)
{
	echo "echec de la connection a la base de donnée";
}



?>