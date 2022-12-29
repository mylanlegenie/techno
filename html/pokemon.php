<?php


function getAttStats($url){
    $response = file_get_contents($url);
    $att = json_decode($response);

    return ["nom" => $att->name, "power" => $att->power, "type" => $att->type->name];

}


function getPokemon($nom){
$apiUrl = 'https://pokeapi.co/api/v2/pokemon/';
$response = file_get_contents($apiUrl . $nom);
$pokemonData = json_decode($response);

$att_temp = array_slice($pokemonData->moves, 0, 2);

$att1 = $att_temp[0]->move;

$att2 = $att_temp[1]->move;


$attaques = [getAttStats($att1->url), getAttStats($att2->url)];

// $img = "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/" . $pokemonData->id. ".svg";

return ["nom" => $pokemonData->name, "pv" => $pokemonData->stats[5]->base_stat, "type" => $pokemonData->types[0]->type->name, "attaques" => $attaques, "image" => $pokemonData->sprites->front_default, "id" => $pokemonData->id, "taille" => $pokemonData->height, "poids" => $pokemonData->weight];
}


$pokemon = getPokemon('78');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/pokemon.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pokémon</title>
</head>
<body>

    <form action="" id="form_pokemon">
        <input type="text" placeholder="Entrez le nom d'un pokémon">
        <button><i class="fa-solid fa-magnifying-glass"></i></button>
        
    </form>

    <div id="pokemon_container">

         <svg id="noise"
            xmlns='http://www.w3.org/2000/svg'
            xmlns:xlink='http://www.w3.org/1999/xlink'
            style="width:290px;aspect-ratio: 29/40;">

            <filter id='n' x='0' y='0'>
                    <feTurbulence
                    type='fractalNoise'
                    baseFrequency='0.01'
                    numOctaves='5'
                    stitchTiles='stitch'/>
            </filter>

            <rect width='290' height="400" fill="#9ac652"/>
            <rect width='290' height='400' filter="url(#n)" opacity='0.7'  style="mix-blend-mode:hard-light;" />
        </svg>


        <div id="carte">
            <div id="carte-header">
                <div>
                    <p>BASE</p>
                    <h1><?php echo ucfirst($pokemon["nom"]); ?></h1>
                </div>
               
                <div>
                    <p><span>PV</span><?php echo($pokemon["pv"]); ?></p>
                    <img src="/img/<?php echo ($pokemon["type"]);?>.png" alt="Type">
                </div>

               
            </div>
            <div id="cadre">
                <img id="img_pokemon"src="<?php echo($pokemon["image"]); ?>" alt="" style="max-height: 250px;height:auto;width: auto;">
                <p id="specs">N°<?php echo($pokemon["id"]); ?>  Taille : <?php echo($pokemon["taille"]/10); ?>m  Poids : <?php echo($pokemon["poids"]/10); ?>kg</p>
            </div>
            <div id="atk">

                <div class="atk_img">
                    <img src="/img/<?php echo ($pokemon["type"]);?>.png" alt="">
                </div>

                <div class="atk_name">
                    <?php echo(ucfirst($pokemon["attaques"][0]["nom"])); ?>
                </div>

                <div class="atk_points">
                    <?php echo(ucfirst($pokemon["attaques"][0]["power"])); ?>
                </div>

                <div class="atk_img">
                    <img src="/img/<?php echo ($pokemon["type"]);?>.png" alt="">
                </div>

                <div class="atk_name">
                    <?php echo(ucfirst($pokemon["attaques"][1]["nom"])); ?>
                </div>

                <div class="atk_points">
                    <?php echo(ucfirst($pokemon["attaques"][1]["power"])); ?>
                </div>

                

            </div>

            <!-- <div id="footer">
                <div>
                    <div id="faiblesse" style="padding: 0px 10px;">
                        <p>Faiblesse</p>
                        
                        <img src="/img/type_normal.png" alt="" class="normal">
                    </div>

                    <div id="resistance"  style="padding: 0px 10px;">
                        <p>Résistance</p>
                        <img src="/img/type_normal.png" alt="" class="normal">
                    </div>
                </div>

                <div  style="padding: 0px 10px;">
                    <p>Retraite</p>
                    <img src="/img/type_normal.png" alt="" class="normal">
                </div>

            </div>

            <div id="description">
                <div></div>
                <p>Il a une étrange graine plantée sur son dos. Elle grandit avec lui depuis sa naissance.</p>
            </div> -->

        </div>
    </div>


       
   
</body>
</html>