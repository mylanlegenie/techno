<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/pagecss.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "html/nav.html" ?>
    <h1>PÉTITIONS POUR QUE L'ALGÉRIE REJOUE SON MATCH CONTRE LE CAMEROUN</h1>
    <h2>Les conditions pour que cette pétition se retrouve entre les mains de la FIFA :</h2>
    <div> 
        <li>Minimum 150 000 signatures.</li>
        <li>Que l'objectif précédent s'accomplissent avant le 30 mars 2023.</li>
        <li>Que l'on verse 10 000 euros à la FAF pour qu'il réorganise le match.</li>
        <li>Baricader tous les magasins de Paris en cas de victoire de l'Algérie.</li>
    </div>
    <br>
    <div>
        <form action="">
            <label for="">Prénom</label>
            <br>
            <input placeholder="Entrez votre prénom" type="text">
        </form>
        <br>
        <form action="">
            <label for="" >Nom</label>
            <br>
            <input placeholder="Entrez votre nom" type="text">
        </form>
        <br>
        <form action="">
            <label for="">Adresse E-Mail</label>
            <br>
            <input placeholder="Entrez votre adresse e-mail" type="email">
        </form>
        <br>
        <label for="">Sexe</label>
        <form action="">
            <label for="">Mâle</label>
            <input type="radio">
            <label for="">Femelle</label>
            <input placeholder="" type="radio">
            <label for="">Autre</label>
            <input placeholder="" type="radio">
        </form>
        <br>
        <form action="">
            <label for="">Date de Naissance</label>
            <br>
            <input type="date">
            <br>
            <br>
            <input type="submit" value="Envoyer">
        </form>
</div>
<?php include "html/footer.html"?>
</body>
</html>