<?php include '../config.php';

// Si la personne n'est pas connectée, on la redirige vers la connexion

session_start();

if (empty($_SESSION['id'])){
  header('Location: index.php');
  exit();
}


$infos = getInfosFromId($db, $_SESSION['id']);



 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/profil.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php include "../menu.php"; // Ajouter le menu ?>

    <p id="error"><?php   if (!(empty($_GET['erreur']))){
        echo $_GET['erreur'];
      } ?></p>

    <div class="formbox" class="">
      <h1>Mon Profil</h1>
      <form class= "form" action="update.php" method="post">

        <div class="">
          <label for="">Prénom</label>
          <input type="text" name="prenom" value="<?php  echo  $infos['prenom'] ;?>">
        </div>
        <div class="">
          <label for="">Nom</label>
          <input type="text" name="nom" value="<?php echo $infos['nom'] ?>">
        </div>
        <div class="">
          <label for="">Pseudonyme</label>
          <input type="text" name="pseudonyme" value="<?php echo $infos['pseudonyme'];?>">
        </div>
        <div class="">
          <label for="">E-Mail</label>
          <input type="email" name="email" value="<?php echo  $infos['email']; ?>">
        </div>
        <div class="">
          <label for="">Date de naissance</label>
          <input type="date" name="date_de_naissance" value="<?php  echo   $infos['date_de_naissance']; ?>">
        </div>
        <button type="submit" name="button">Validez</button>
      </form>

    </div>

    <div class="formbox">
      <h1>Changez votre mot de passe</h1>
      <form class="form" id= "mdp_form" action="update_mdp.php" method="post">
        <div class="">
          <label for="confirm">Confirmer votre mot de passe actuel</label>
          <input type="password" name="confirm" value="">
        </div>
        <div class="">
          <label for="modifier">Entrez un nouveau mot de passe</label>
          <input type="password" name="modifier" value="">
        </div>
        <div class="">
          <label for="confirm_newmdp">Confirmer votre nouveau mot de passe</label>
          <input type="password" name="confirm_newmdp" value="">
        </div>
        <button type="submit" name="button2">Confirmez la modification</button>
      </form>
    </div>

    <?php include "../footer.html"; // Ajouter le pied de page ?>

  </body>
</html>
