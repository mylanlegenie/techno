<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/inscription.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <title>Formulaire</title>
  </head>
  <body>

    <?php include "../menu.php"; // Ajouter le menu ?>


    <div id="form-box">
      <h1 id="inscription-texte">INSCRIPTION</h1>
        <form id="form-inscription" action="inscription.php" method="post">
          <input type="text" name="nom" placeholder="Entrez votre Nom" required>
          <input type="text" name="prenom" placeholder="Entrez votre Prénom" required>
          <input type="text" name="pseudonyme" placeholder="Entrez votre Pseudonyme" id="pseudonyme"required>
          <p id="error_pseudonyme" style="color:red;"></p>
          <input type="email" name="email" placeholder="Entrez votre addresse e-mail" id="email" required>
          <p id="error_email" style="color:red;"></p>
          <input type="password" name="mot_de_passe" placeholder="Entrez votre mot de passe" required id="mdp">
          <div onclick="process_oeil_1();" id="div_oeil_1">
            <i id="oeil_cache_1" class="fa-solid fa-eye-slash"></i>
            <i id="oeil_1" class="fa-solid fa-eye"></i>
          </div>

          <input type="password" name="mot_de_passe_verif" placeholder="Vérifier votre mot de passe" required id="mdpverif">
          <div onclick="process_oeil_2();" id="div_oeil_2">
            <i id="oeil_cache_2" class="fa-solid fa-eye-slash"></i>
            <i id="oeil_2" class="fa-solid fa-eye"></i>
          </div>
          <p style='color:red;' id="error_mdp"></p>

          <input type="date" name="date_de_naissance" required>

          <button id= "button"type="submit" name="button" disabled>S'INSCRIRE</button>
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


<script src="/js/inscription.js" charset="utf-8"></script>
<script src="https://code.jquery.com/jquery.js" type="text/javascript"></script>
