<?php 



for($num=1; $num < 10;$num++){
    $apiUrl = 'https://pokeapi.co/api/v2/pokemon/' . $num;
    $response = file_get_contents($apiUrl);
    $pokemonData = json_decode($response);

    echo $pokemonData->name . "\n";


}

?>