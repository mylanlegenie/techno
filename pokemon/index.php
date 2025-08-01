<?php


if (!(empty($_GET["gaufre"]))){
    header("Location: https://google.fr");
    exit();
}

function getAttStats($url)
{
    $response = file_get_contents($url);
    $att = json_decode($response);

    return ["nom" => $att->name, "power" => $att->power, "type" => $att->type->name];

}


function getPokemon($nom)
{

    if (is_int(intval($nom))) {

        if (intval($nom) > 898) {
            return getPokemon(1);
        }
    }

    $apiUrl = 'https://pokeapi.co/api/v2/pokemon/';
    $response = @file_get_contents($apiUrl . $nom);

    if ($response == NULL) {
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

if (!(empty($_GET['pokemon']))) {
    $my_pokemon = strtolower($_GET['pokemon']);
} else {
    $my_pokemon = 1;
}

if ($my_pokemon =="elon musk"){

    $attaques = [["nom" => "Sprint", "power" => 14], ["nom" => "Coup de pied", "power" => 10]];
    $pokemon =  ["nom" => "Elon", "pv" => 75, "type" => "genie", "attaques" => $attaques, "image" => "https://www.pngplay.com/wp-content/uploads/13/Mahrez-Manchester-City-Transparent-File.png", "id" => 900, "taille" => 13, "poids" => 50];
}
else{
    $pokemon = getPokemon($my_pokemon);
}


$colors = [
    "electric" => "#ffd324",
    "grass" => "#96cf4e",
    "fire" => "#f05320",
    "normal" => "#D0D1D6",
    "bug" => "#96c94e",
    "water" => "#05a6de",
    "psychic" => "#793D96",
    "poison" => "#793D96",
    "ghost" => "#793D96",
    "ground" => "#d67e2c",
    "fighting" => "#d67e2c",
    "dark" => "#505050",
    "steel" => "#B6BEC1",
    "dragon" => "#e0b63b",
    "rock" => "#d67e2c",
    "fairy" => "#b0386d",
    "genie"=> '#afcaf2'

];

$color = $colors[$pokemon["type"]];

$id = $pokemon['id'];

$path = "img/svg/" . $id . ".svg";

if (file_exists($path)) {
    $image = $path;
} else {
    $image = $pokemon['image'];
}


function getRandomImage($folder)
{
    try {
        $files = preg_grep('~\.(jpeg|jpg|png|gif)$~', scandir($folder));

    } catch (Exception $e) {
        $files = preg_grep('~\.(jpeg|jpg|png|gif)$~', scandir("img/background/default"));

    }
    return $files[array_rand($files)];


}

$path = "img/background/";

$bg = getRandomImage($path . $pokemon['type']);

if (is_null($bg)) {
    $bg_url = $path . "default/" . getRandomImage($path . "default");
} else {
    $bg_url = $path . $pokemon['type'] . "/" . $bg;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pokémon</title>
</head>

<body id="body">

    <img src="<?php echo $pokemon['image']; ?>" alt="Cursor" class="cursor" />
    <img src="<?php echo $pokemon['image']; ?>" alt="Cursor" class="maincursor" />


    <div id="boxbox">
        <div id="box">
            <form action="index.php" id="form_pokemon">
                <input type="text" id="recherche" placeholder="Entrez le nom d'un pokémon" name="pokemon"
                    autocomplete="off" />
                <button><i class="fa-solid fa-magnifying-glass"></i></button>


            </form>

            <div id="suggestion">
                <!-- <button onclick="select('bulbasaur');"><p>Bulbasaur</p></button>
                <button onclick="select('bulbasaur');"><p>Bulbasaur</p></button> -->
            </div>

        </div>
    </div>

    <div style="height: 200px" id="debug">

    </div>

    <div id="box_pokemon">
        <div id="pokemon_container">



            <div id="carte">
              
                <div id="carte-header">
                    <div>
                        <p>BASE</p>
                        <h1>
                            <?php echo ucfirst($pokemon["nom"]); ?>
                        </h1>
                    </div>

                    <div>
                        <p><span>HP</span>
                            <?php echo ($pokemon["pv"]); ?>
                        </p>

                        <img id="mytype" src="img/<?php

                        $type = ($pokemon["type"]);

                        echo $type;
                        ?>.png" alt="Type">
                    </div>


                </div>
                <div id="cadre" style="background-image:url(<?php echo $bg_url; ?>);">
                    <p> </p>
                    <img id="img_pokemon" src="<?php echo ($image); ?>" alt="">
                    <p id="specs">N°
                        <?php echo ($pokemon["id"]); ?> Length :
                        <?php echo ($pokemon["taille"] / 10); ?>m Weight :
                        <?php echo ($pokemon["poids"] / 10); ?>kg
                    </p>
                </div>
                <div id="atk">

                    <div class="atk_img">
                        <img src="img/<?php echo $type; ?>.png" alt="" style="border-radius: 30px;">
                    </div>

                    <div class="atk_name">
                        <?php echo (ucfirst($pokemon["attaques"][0]["nom"])); ?>
                    </div>

                    <div class="atk_points">
                        <?php echo (ucfirst($pokemon["attaques"][0]["power"])); ?>
                    </div>

                    <div class="atk_img">
                        <img src="img/<?php echo $type; ?>.png" alt="" style="border-radius: 30px;">
                    </div>

                    <div class="atk_name">
                        <?php echo (ucfirst($pokemon["attaques"][1]["nom"])); ?>
                    </div>

                    <div class="atk_points">
                        <?php echo (ucfirst($pokemon["attaques"][1]["power"])); ?>
                    </div>



                </div>
                <div id="back">
                    <?php

                    if ($my_pokemon=="elon musk"){
                        echo " <img src='img/specialback.png' alt='Back of the card'>";
                    }
                    else{
                        echo " <img src='img/backofcard.png' alt='Back of the card'>";
                    }

                    ?>
                   
                </div>
                <svg id="noise" xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'
                    style="width:290px;aspect-ratio: 29/40;">

                    <filter id='n' x='0' y='0'>
                        <feTurbulence type='fractalNoise' baseFrequency='0.01' numOctaves='5' stitchTiles='stitch' />
                    </filter>

                    <rect id="myrect" width='290' height="400" fill="<?php echo $color; ?>" />
                    <rect width='290' height='400' filter="url(#n)" opacity='0.7' style="mix-blend-mode: luminosity;" />
                </svg>

            </div>

            <div id="glow"></div>
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


    <style>
        .cursor,
        .maincursor {
            background-color:
                <?php echo $color; ?>
            ;
            border-radius: 50px;
            border: none;
            position: absolute;
            width: 45px;
            height: 45px;
            left: -100px;
            cursor: none;
            pointer-events: none;
            z-index: 99999999;
        }

        * {
            cursor: none;
        }
    </style>


</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>

    async function getSortedData() {
        try {
            const response = await fetch('all_infos.json');
            const data = await response.json();
            return data.sort((a, b) => (a.name).localeCompare(b.name));
        } catch (error) {
            console.error(error);
        }
    }


    function Search(array_, beginning) {
        return array_.filter(pokemon => pokemon.name.startsWith(beginning));
    }



</script>


<script>




    let recherche = document.getElementById("recherche");
    recherche.addEventListener('input', function (evt) {



        getSortedData().then(data => {
            var sortedData = data;
            var mysearch = Search(sortedData, recherche.value.toLowerCase());
            var cinqpoke = mysearch.slice(0, 5);

            var suggestion = document.getElementById('suggestion');

            suggestion.innerHTML = "";

            cinqpoke.forEach(pokemon => {

                let pokemonname = pokemon.name

                let button = document.createElement("button");
                let p = document.createElement('p');
                p.innerHTML = pokemonname;
                button.appendChild(p);
                button.addEventListener("click", function () {
                    select(pokemonname);
                });





                $(button).on("mouseover", function () {

                    $('.maincursor').hide();


                    $('.cursor').css("background-color", pokemon.color);
                    $('.cursor').attr("src", pokemon.image);



                })
                suggestion.appendChild(button);
            });

        });

    });

    document.addEventListener("click", (evt) => {
        let targetEl = evt.target; // clicked element      

        suggestion.innerHTML = "";
    });


    function select(name) {
        window.location.href = "index.php?pokemon=" + name;
    }



    $(function () {
        $("body").mousemove(function (e) {
            $(".cursor").css({
                "left": e.clientX - 10,
                "top": e.clientY - 10
            });

            $(".maincursor").css({
                "left": e.clientX - 10,
                "top": e.clientY - 10
            });

            var position = $($("#pokemon_container")).offset();

            $("#glow").css({
                "left": e.clientX - 35 - position.left,
                "top": e.clientY - 35 - position.top
            });
        }).mouseout(function () {
            $(".cursor").hide();
        });
    });



    $(function () {
        $('#suggestion').mousemove(function (e) {
            $('.maincursor').hide();

            $('.cursor').show();

        }).mouseout(function () {
            $(".cursor").hide();
            $('.maincursor').show();
        });
    });





</script>
<script src="bg.js"></script>


<script>
    setNewBg("<?php echo $color ?>");
</script>

<script>

    var pokemonContain = document.getElementById("pokemon_container");

    var carte = document.getElementById("carte");

    var angle = 0;


    pokemonContain.addEventListener('click', () => {

        angle = angle + 180;

        carte.style.transform = "rotateY(" + angle + "deg)";

    }, true);




</script>