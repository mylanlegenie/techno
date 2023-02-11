<?php
// Turn off all error reporting
//error_reporting(0);

$host = 'localhost';
$dbname = 'pc-online';
$user = 'root';
$pass = 'root';


try{
	$db = new PDO('mysql:host='.$host.';dbname=' .$dbname, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}
catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
}




function getNom(PDO $db, $id)
{

	$requete = "SELECT * FROM utilisateurs WHERE id =:id1";

	$resultat = $db->prepare($requete);

	$resultat->execute([ 'id1'=> $id]);

	$ligne = $resultat->fetch();

	return $ligne['nom'];
}

function getPseudo(PDO $db, $id)
{

	$requete = "SELECT * FROM utilisateurs WHERE id =:id1";

	$resultat = $db->prepare($requete);

	$resultat->execute([ 'id1'=> $id]);

	$ligne = $resultat->fetch();

	return $ligne ['pseudonyme'];
}
function getMDP(PDO $db, $id)
{

	$requete = "SELECT * FROM utilisateurs WHERE id =:id1";

	$resultat = $db->prepare($requete);

	$resultat->execute([ 'id1'=> $id]);

	$ligne = $resultat->fetch();

	return $ligne ['mot_de_passe'];
}


function getInfosFromId(PDO $db, $id)
{

	$requete = "SELECT * FROM utilisateurs WHERE id =:id1";

	$resultat = $db->prepare($requete);

	$resultat->execute([ 'id1'=> $id]);

	$ligne = $resultat->fetch();

	return $ligne;
}



?>
