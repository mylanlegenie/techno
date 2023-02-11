<?php

include '../config.php';

// Renvoie True si l'email dispo
function EmailDispo($db, $email)
{
  $query = "SELECT * FROM `utilisateurs` WHERE email =:email;";
  $resultat = $db->prepare($query);
  $resultat->execute(['email' => $email]);

  $nombrelignes = $resultat->rowcount();

  if ($nombrelignes == 0){
    return "True";
  }
  else{
    return "False";
  }
}

if (!(empty($_POST['email']))){

  echo EmailDispo($db, $_POST['email']);

}



  ?>
