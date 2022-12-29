<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="website icon" type="png" href="img/logo2.png">
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
        <form>
            <div>
                <label for="" >Prénom</label>
                <input placeholder="Entrez votre prénom" type="text">
            </div>
           
            <div>
                <label for="" >Nom</label>
                <input id="input_nom" placeholder="Entrez votre nom" type="text">
            </div>

            <div>
                <label for="">Adresse E-Mail</label>
                <input placeholder="Entrez votre adresse e-mail" type="email">
            </div>
        
            <div>
                <label for="">Sexe</label>
                <div>
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
            
            <div>
                <label for="">Date de Naissance</label>
                <input type="date">
            </div>
            
            <input type="submit" value="Envoyer">
        </form>
</div>
<div id="footer_"><?php include "html/footer2.html"?></div>

</body>
</html>