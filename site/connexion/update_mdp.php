<?php
// Si la personne n'est pas connectée, on la redirige vers la connexion
include '../config.php';
session_start();

if (empty($_SESSION['id'])){
  header('Location: index.php');
  exit();
}

if ($_POST["confirm"] == "" || $_POST["modifier"] == "" || $_POST["confirm_newmdp"] == ""){
header('Location: profil.php?erreur=Champ vide détecté, veuillez recommencer.');
exit();
}

$mdp_bdd = getMDP($db, $_SESSION['id']);

if ($mdp_bdd != $_POST['confirm']){
  header('Location: profil.php?erreur=Mot de passe actuel incorrect.');
  exit();
}


if ($_POST["modifier"] != $_POST["confirm_newmdp"]) {
  header('Location: profil.php?erreur=Les mots de passe ne correspondent pas, veuillez recommencer.');
  exit();
}


else{
  $query = "UPDATE utilisateurs SET mot_de_passe=:mdp_modifie WHERE id=:id;";
  $resultat = $db->prepare($query);
  $resultat->execute(['mdp_modifie' => $_POST['confirm_newmdp'], 'id' => $_SESSION['id']]);
  header('Location: profil.php');
  exit();


}



?>
