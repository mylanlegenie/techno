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
    <div id="rectbox">
        <div id="rectangle">
        </div>
    </div>
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
                <input id="input_prenom" placeholder="Entrez votre prénom" type="text" autocomplete="off">
            </div>
           
            <div>
                <label id="label_nom" for="" >Nom</label>
                <input id="input_nom" placeholder="Entrez votre nom" type="text" autocomplete="off">
            </div>

            <div>
                <label id="label_mail" for="">Adresse E-Mail</label>
                <input id="input_mail" placeholder="Entrez votre adresse e-mail" type="email" autocomplete="off">
            </div>
            <div>
            <label id="label_sexe" for="">Sexe</label>
            <div id="sexe">
                    <div id="divmale">
                        <input id="male" type="radio" name="sexe" value="male">
                        <label for="male">Mâle</label>
                    </div>
                    <div>
                        <input id="femelle" type="radio" name="sexe" value="femelle" >
                        <label for="femelle">Femelle</label>
                    </div>

                    <div>
                        <input id="autre" type="radio" name="sexe" value="autre">
                        <label for="autre">Autre</label>
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