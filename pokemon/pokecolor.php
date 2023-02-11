<?php


function getAttStats($url){
    $response = file_get_contents($url);
    $att = json_decode($response);

    return ["nom" => $att->name, "power" => $att->power, "type" => $att->type->name];

}


function getPokemon($nom){

if (is_int(intval($nom))){

    if (intval($nom) > 898){
        return getPokemon(1);
    }
}

$apiUrl = 'https://pokeapi.co/api/v2/pokemon/';
$response = @file_get_contents($apiUrl . $nom);

if ($response == NULL){
    return getPokemon(1);
}


$pokemonData = json_decode($response);

$att_temp = array_slice($pokemonData->moves, 0, 2);

$att1 = $att_temp[0]->move;

$att2 = $att_temp[1]->move;


$attaques = [getAttStats($att1->url), getAttStats($att2->url)];

// $img = "https://unpkg.com/pokeapi-sprites@2.0.2/sprites/pokemon/other/dream-world/" . $pokemonData->id. ".svg";

return ["nom" => $pokemonData->name, "pv" => $pokemonData->stats[5]->base_stat, "type" => $pokemonData->types[0]->type->name, "attaques" => $attaques, "image" => $pokemonData->sprites->front_default, "id" => $pokemonData->id, "taille" => $pokemonData->height, "poids" => $pokemonData->weight];
}

if (!(empty($_GET['pokemon']))){
    $my_pokemon = strtolower($_GET['pokemon']);
}
else{
    $my_pokemon = 1;
}


$pokemon = getPokemon($my_pokemon);

$colors = ["electric" => "#ffd324", "grass" => "#96cf4e", "fire" => "#f05320", "normal" => "#D0D1D6","bug" => "#96c94e", "water" => "#05a6de", "psychic" => "#793D96","poison" => "#793D96", "ghost" => "#793D96", "ground" => "#d67e2c", "fighting" => "#d67e2c", "dark" => "#505050", "steel" => "#B6BEC1", "dragon" => "#e0b63b"];

echo $pokemon["type"];
 


$color = $colors[$pokemon["type"]];


echo $color;


?>