<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form style="display:none;" id="form-connexion" action="../connexion/connexion.php" method="post">
      <input type="text" id="pseudo_input" name="pseudonyme">
      <input type="password" id="mdp_input" name="mot_de_passe">
    </form>

  </body>
</html>







<?php include '../config.php';

$nom = strtolower($_POST["nom"]);
$prenom = strtolower($_POST["prenom"]);
$email = strtolower($_POST ["email"]);
$date_de_naissance = $_POST["date_de_naissance"];
$pseudonyme = strtolower($_POST ["pseudonyme"]);
$mot_de_passe = $_POST["mot_de_passe"];



// Renvoie True si l'email dispo
function EmailDispo($db, $email)
{
  $query = "SELECT * FROM `utilisateurs` WHERE email =:email;";
  $resultat = $db->prepare($query);
  $resultat->execute(['email' => $email]);

  $nombrelignes = $resultat->rowcount();

  return $nombrelignes == 0;
}

// Renvoie True si le pseudo dispo
function PseudonymeDispo($db, $pseudonyme)
{
  $query = "SELECT * FROM `utilisateurs` WHERE pseudonyme =:pseudonyme";
  $resultat = $db->prepare($query);
  $resultat->execute(['pseudonyme' => $pseudonyme]);

  $nombrelignes = $resultat->rowcount();

  return $nombrelignes == 0;
}


if (!(empty($_POST['pseudonyme']))){

  if (EmailDispo($db, $email) && PseudonymeDispo($db, $pseudonyme)){


    // L'inscription est possible
    $query = " INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `mot_de_passe`, `pseudonyme`, `date_de_naissance`, `email`) VALUES (NULL, :nom, :prenom, :mot_de_passe, :pseudonyme, :date_de_naissance, :email);";
    $resultat = $db->prepare($query);
    $resultat->execute(['prenom' => $prenom, 'nom' => $nom, 'mot_de_passe' => $mot_de_passe, 'pseudonyme' => $pseudonyme, 'date_de_naissance' => $date_de_naissance ,'email' => $email]);

    ?>
    <script type="text/javascript">

      var form = document.getElementById('form-connexion');
      var pseudo_input = document.getElementById('pseudo_input');
      var mdp_input = document.getElementById('mdp_input');


      pseudo_input.value = "<?php echo $pseudonyme ?>";
      mdp_input.value = "<?php echo $mot_de_passe ?>";

      form.submit();

    </script>


    <?php
  }
  else{
      if (!(EmailDispo($db, $email))){
        header('Location: index.php?erreur=Email déjà existant');
        exit();
      }
      else{
        header('Location: index.php?erreur=Pseudonyme déjà existant');
        exit();
      }



  }

}
else {
  header('Location: index.php?erreur= Erreur');
  exit();
}


 ?>
