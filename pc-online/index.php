<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$path = dirname(__FILE__);

$pourjs = '[';
$liste = scandir($path . '/images/images-diapo');
foreach ($liste as $element ){
  if (strlen($element) > 2 && $element != '.DS_Store'){
    $pourjs = $pourjs . "'". $element . "',";
  }

}

$pourjs = $pourjs . ']';


 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="/pc-online/css/reset.css">
    <link rel="stylesheet" href="/pc-online/css/accueil.css">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Pc-Online</title>
  </head>
  <body>

    <?php include $path. "/menu.php"; // Ajouter le menu ?>


    <div id="conteneur">
      <div id = "carrousel">

        <img class="fleche" src="/pc-online/images/fleche_left.png" alt="" onclick="Precedent(<?php echo $pourjs; ?>)">
        <h1 id="titre-carrousel">CASQUE</h1>
        <img class="fleche" src="/pc-online/images/fleche_right.png" alt="" onclick="Suivant(<?php echo $pourjs; ?>)">

      </div>
    </div>


    <?php include $path . "/footer.html"; // Ajouter le pied de page ?>


  </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="/pc-online/js/carrousel.js" charset="utf-8"></script>


<script type="text/javascript">
var temporaire = <?php echo $pourjs; ?>;
var carrousel = document.getElementById('carrousel');
carrousel.style.backgroundImage = "url('/pc-online/images/images-diapo/"  + temporaire[0] + "')";


</script>
