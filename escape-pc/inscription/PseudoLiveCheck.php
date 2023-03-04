<?php 
   if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
?>

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
    return 1;
  }
  else{
    return 0;
  }
}

if (!(empty($_POST['pseudonyme']))){

  echo(PseudonymeDispo($db, $_POST['pseudonyme']));

}



  ?>
