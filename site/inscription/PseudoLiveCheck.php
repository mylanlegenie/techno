<?php

include '../config.php';

// Renvoie True si l'email dispo
function PseudonymeDispo($db, $pseudonyme)
{
  $query = "SELECT * FROM `utilisateurs` WHERE pseudonyme =:pseudonyme;";
  $resultat = $db->prepare($query);
  $resultat->execute(['pseudonyme' => $pseudonyme]);

  $nombrelignes = $resultat->rowcount();

  if ($nombrelignes == 0){
    return "True";
  }
  else{
    return "False";
  }
}

if (!(empty($_POST['pseudonyme']))){

  echo PseudonymeDispo($db, $_POST['pseudonyme']);

}



  ?>
