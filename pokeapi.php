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

return ["nom" => $pokemonData->name, "pv" => $pokemonData->stats[5]->base_stat, "type" => $pokemonData->types[0]->type->name, "attaques" => $attaques, "image" => $pokemonData->sprites->front_default ];
}

var_dump(getPokemon('bulbasaur'));
?>
