<?php
// Si la personne n'est pas connectée, on la redirige vers la connexion
include '../config.php';
session_start();

if (empty($_SESSION['id'])){
  header('Location: index.php');
  exit();
}

if ($_POST["prenom"] == "" || $_POST["nom"] == "" || $_POST["pseudonyme"] == "" || $_POST["email"] == "" || $_POST["date_de_naissance"]== ""){
header('Location: profil.php?erreur=Champ vide détecté, veuillez recommencer.');
exit();
}


else{
  $query = "UPDATE utilisateurs SET prenom=:prenom,nom=:nom,pseudonyme=:pseudonyme,date_de_naissance=:date_de_naissance,email=:email WHERE id=:id;";
  $resultat = $db->prepare($query);
  $resultat->execute(['prenom' => $_POST['prenom'], 'nom' => $_POST['nom'], 'pseudonyme' => $_POST['pseudonyme']  ,'email' => $_POST['email'], 'date_de_naissance' => $_POST['date_de_naissance'], 'id' => $_SESSION['id']]);
  header('Location: profil.php');
  exit();

}







 ?>
