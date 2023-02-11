<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/connexion.css">
    <title>Formulaire</title>
  </head>
  <body>

    <?php include "../menu.php"; // Ajouter le menu ?>


    <div id="form-box">
      <h1 id="connexion-texte">CONNEXION</h1>
        <form id="form-connexion" action="connexion.php" method="post">
          <input type="text" name="pseudonyme" placeholder="Entrez votre pseudonyme">
          <input type="password" name="mot_de_passe" placeholder="Entrez votre mot de passe">
          <button id= "button"type="submit" name="button">ENVOYER</button>
        </form>
        <p style='color:red;'><?php

        if (!(empty($_GET['erreur']))){
          echo $_GET['erreur'];
        }
         ?></p>
    </div>

    <?php include "../footer.html"; // Ajouter le pied de page ?>


  </body>
</html>
