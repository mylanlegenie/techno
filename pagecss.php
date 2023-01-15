<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/pagecss.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="website icon" type="png" href="img/logo2.png">
</head>
<body>
    <?php include "html/nav.html" ?>
    <h1 id="h1" >PÉTITION POUR QUE L'ALGÉRIE REJOUE SON MATCH CONTRE LE CAMEROUN</h1>
        <div id="petition" class="fade-in" style="display:flex;align-items-center;justify-content:center;margin-right:35px;">
            <span>P</span>
            <span>É</span>
            <span>T</span>
            <span>I</span>
            <span>T</span>
            <span>I</span>
            <span>O</span>
            <span>N</span>
        </div>
        <div id="pourque" class="fade-in" style="display:flex;align-items-center;justify-content:center;">
            <div style="margin-right:9px;">
                <span>P</span>
                <span>O</span>
                <span>U</span>
                <span>R</span>
            </div>
            <div>
                <span>Q</span>
                <span>U</span>
                <span>E</span>
            </div>
        </div>
        <div id="lalgerie" class="fade-in" style="display:flex;align-items-center;justify-content:center;">
            <div>
                <span>L</span>
                <span>'</span>
            </div>
            <div style="margin-left:4px;">
                <span>A</span>
                <span>L</span>
                <span>G</span>
                <span>É</span>
                <span>R</span>
                <span>I</span>
                <span>E</span>
            </div>
        </div>
        <div id="rejoueson" class="fade-in" style="display:flex;align-items-center;justify-content:center;margin-left:20px;">
            <div>
                <span>R</span>
                <span>E</span>
                <span>J</span>
                <span>O</span>
                <span>U</span>
                <span>E</span>
            </div>
            <div style="margin-left:10px;">
                <span>S</span>
                <span>O</span>
                <span>N</span>
            </div>
        </div>
        <div id="match" class="fade-in" style="display:flex;align-items-center;justify-content:center;margin-right:50px;">
            <span>M</span>
            <span>A</span>
            <span>T</span>
            <span>C</span>
            <span>H</span>
        </div>
        <!-- <div>
            <span>C</span>
            <span>O</span>
            <span>N</span>
            <span>T</span>
            <span>R</span>
            <span>E</span>
        </div>
        <div>
            <span>L</span>
            <span>E</span>
        </div>
        <div>
            <span>C</span>
            <span>A</span>
            <span>M</span>
            <span>E</span>
            <span>R</span>
            <span>O</span>
            <span>U</span>
            <span>N</span>
        </div> -->
    <h2 id="h2">Les conditions pour que cette pétition se retrouve entre les mains de la FIFA :</h2>
    <div id="div_li"> 
        <li id="cond1">Minimum 150 000 signatures.</li>
        <li id="cond2">Que l'objectif précédent s'accomplissent avant le 30 mars 2023.</li>
        <li id="cond3">Que l'on verse 10 000 euros à la FAF pour qu'il réorganise le match.</li>
        <li id="cond4">Baricader tous les magasins de Paris en cas de victoire de l'Algérie.</li>
    </div>
   
    <br>
    <div id="div_form">
        <form action="" id="myform">
            <div>
                <label id="label_prenom" for="">Prénom</label>
                <input id="input_prenom" placeholder="Entrez votre prénom" type="text">
            </div>
           
            <div>
                <label id="label_nom" for="" >Nom</label>
                <input id="input_nom" placeholder="Entrez votre nom" type="text">
            </div>

            <div>
                <label id="label_mail" for="">Adresse E-Mail</label>
                <input id="input_mail" placeholder="Entrez votre adresse e-mail" type="email">
            </div>
        
            <div>
                <label id="label_sexe" for="">Sexe</label>
                <div id="sexe">
                    <div>
                        <input placeholder="" type="radio" name="sexe" value="male">
                        <label for="">Mâle</label>
                    </div>

                    <div>
                        <input placeholder="" type="radio" name="sexe" value="femelle">
                        <label for="">Femelle</label>
                    </div>

                    <div>
                        <input placeholder="" type="radio" name="sexe" value="autre">
                        <label for="">Autre</label>
                    </div>   
            </div>
            </div>
            <div id="date">
                <label for="">Date de Naissance</label>
                <input id="input_date" type="date">
            </div>
                <input id="input_envoyer" type="submit" value="Envoyer"> 
        </form>
    </div> 

    <div id="footer1" style="border-top:1px solid black; height:150px;">
        <?php  include "html/footer.html"?>
    </div>

</body>
</html>