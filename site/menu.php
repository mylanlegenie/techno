<link rel="stylesheet" href="/css/menu.css">
<section id="menu">
  <nav>
    <div id="nav_gauche">
      <img id="logo" src="/images/logo.png" onclick="document.location.href='/';" style='cursor:pointer;'>
      <a class="navlink navhover" href="/">accueil</a>
      <a class="navlink navhover" href="/boutique">boutique</a>
    </div>
    <div id="nav_droite">
      <div id="searchmenu">
          <img id="loupe" src="/images/loupe.png" alt="" onclick="search()">
          <form class="searchbar" id="searchbarbureau" action="/index.html" method="post">
            <input type="text" name="search" value="" placeholder="Rechercher">
            <button type="button" name="button" > <img style="height:15px;" src="/images/loupe.png" alt=""></button>
          </form>
      </div>
      <?php
      if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }

      # Pas connecté
      if (empty($_SESSION['id'])){
        echo "<a id='se_connecter' class='navlink' href='/connexion'>Se connecter </a>
        <a id='s_inscrire' class='navlink' href='/inscription'>s'inscrire</a>";
      }

      else{ # On est connecté
        echo "<a id='s_inscrire' class='navlink' href='/connexion/profil.php'>Mon compte </a>
        <a id='se_connecter' class='navlink' href='/connexion/exit.php'>Se déconnecter</a>";
      }





       ?>

      <div class="burger" onclick="menu();">
        <img id= "burger" src="/images/burgerbleu.png" alt="">
        <img id="croix" src="/images/croixbleu.png" alt="">
      </div>

    </div>

  </nav>



</section>

<form  class="searchbar" id="searchbarmobile" action="/index.html" method="post">
  <input type="text" name="search" value="" placeholder="Rechercher">
  <button type="button" name="button" > <img style="height:15px;" src="/images/loupe.png" alt=""></button>
</form>

<div id="menu_mobile">
  <a class="navlink-mobile navhover-mobile" href="/">Accueil</a>
  <a class="navlink-mobile navhover-mobile" href="/boutique">Boutique</a>

  <?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  # Pas connecté
  if (empty($_SESSION['id'])){
    echo "<a id='se_connecter-mobile' class='navlink-mobile' href='/connexion'>Se connecter </a>
    <a id='s_inscrire-mobile' class='navlink-mobile' href='/inscription'>s'inscrire</a>";
  }

  else{ # On est connecté
    echo "<a id='s_inscrire-mobile' class='navlink-mobile' href='/connexion/profil.php'>Mon compte </a>
    <a id='se_connecter-mobile' class='navlink-mobile' href='/connexion/exit.php'>Se déconnecter</a>";
  }





   ?>
</div>



    <script src="/js/menu.js" charset="utf-8"></script>
