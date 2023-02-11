<?php include '../config.php';

// Renvoie True si le couple pseudo/mdp existe, False sinon.
function CoupleExiste($db, $pseudo, $mdp)
{
  $query = "SELECT * FROM `utilisateurs` WHERE BINARY mot_de_passe =:password AND pseudonyme =:nickname;";
  $resultat = $db->prepare($query);
  $resultat->execute(['password' => $mdp, 'nickname' => $pseudo]);

  $nombrelignes = $resultat->rowcount();

  return $nombrelignes >= 1;
}


function InfosDuCompte($db, $pseudo, $mdp)
{
  $query = "SELECT * FROM `utilisateurs` WHERE BINARY mot_de_passe =:password AND pseudonyme =:nickname;";
  $resultat = $db->prepare($query);
  $resultat->execute(['password' => $mdp, 'nickname' => $pseudo]);

  return $resultat->fetch();
}



if (!(empty($_POST['pseudonyme']))){
  echo $_POST['pseudonyme'];
  echo $_POST['mot_de_passe'];
  if (CoupleExiste($db, $_POST['pseudonyme'], $_POST['mot_de_passe'])){
    $infos = InfosDuCompte($db, $_POST['pseudonyme'], $_POST['mot_de_passe']);


    session_start();
    $_SESSION['id'] = $infos['id'];
    header('Location: profil.php');
    exit();
  }
  else{

    header('Location: index.php?erreur=Couple incorrect');
  exit();
  }
}
else {
  header('Location: index.php?erreur= Merci de remplir le formulaire');
  exit();
}


 ?>
