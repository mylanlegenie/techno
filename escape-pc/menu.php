<link rel="stylesheet" href="/pc-online/css/menu.css">
<section id="menu">
  <nav>
    <div id="nav_gauche">
      <img id="logo" src="/pc-online/images/logo.png" onclick="document.location.href='/pc-online';" style='cursor:pointer;'>
      <a class="navlink navhover" href="/pc-online/">accueil</a>
      <a class="navlink navhover" href="/pc-online/boutique">boutique</a>
    </div>
    <div id="nav_droite">
      <div id="searchmenu">
          <img id="loupe" src="/pc-online/images/loupe.png" alt="" onclick="search()">
          <form class="searchbar" id="searchbarbureau" action="/pc-online/index.html" method="post">
            <input type="text" name="search" value="" placeholder="Rechercher">
            <button type="button" name="button" > <img style="height:15px;" src="/pc-online/images/loupe.png" alt=""></button>
          </form>
      </div>
      <?php
   

      # Pas connecté
      if (empty($_SESSION['id'])){
        echo "<a id='se_connecter' class='navlink' href='/pc-online/connexion'>Se connecter </a>
        <a id='s_inscrire' class='navlink' href='/pc-online/inscription'>s'inscrire</a>";
      }

      else{ # On est connecté
        echo "<a id='s_inscrire' class='navlink' href='/pc-online/connexion/profil.php'>Mon compte </a>
        <a id='se_connecter' class='navlink' href='/pc-online/connexion/exit.php'>Se déconnecter</a>";
      }





       ?>

      <div class="burger" onclick="menu();">
        <img id= "burger" src="/pc-online/images/burgerbleu.png" alt="">
        <img id="croix" src="/pc-online/images/croixbleu.png" alt="">
      </div>

    </div>

  </nav>



</section>

<form  class="searchbar" id="searchbarmobile" action="/index.html" method="post">
  <input type="text" name="search" value="" placeholder="Rechercher">
  <button type="button" name="button" > <img style="height:15px;" src="/pc-online/images/loupe.png" alt=""></button>
</form>

<div id="menu_mobile">
  <a class="navlink-mobile navhover-mobile" href="/pc-online">Accueil</a>
  <a class="navlink-mobile navhover-mobile" href="/pc-online/boutique">Boutique</a>

  <?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  # Pas connecté
  if (empty($_SESSION['id'])){
    echo "<a id='se_connecter-mobile' class='navlink-mobile' href='/pc-online/connexion'>Se connecter </a>
    <a id='s_inscrire-mobile' class='navlink-mobile' href='/pc-online/inscription'>s'inscrire</a>";
  }

  else{ # On est connecté
    echo "<a id='s_inscrire-mobile' class='navlink-mobile' href=/pc-online/connexion/profil.php'>Mon compte </a>
    <a id='se_connecter-mobile' class='navlink-mobile' href='/pc-online/connexion/exit.php'>Se déconnecter</a>";
  }





   ?>
</div>



    <script src="/pc-online/js/menu.js" charset="utf-8"></script>
