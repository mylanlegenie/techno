var mdp = document.getElementById('mdp');
var mdpverif = document.getElementById('mdpverif');
var erreur = document.getElementById('error_mdp');
var sign_up = document.getElementById('button');


var email_ok = false;
var mdp_ok = false;
var pseudonyme_ok = false;

function buttonVerif() {
    if (email_ok && mdp_ok && pseudonyme_ok){
        sign_up.disabled = false;
    }
    else{
        sign_up.disabled = true;
    }
}


mdp.addEventListener('input', function () {
    verifmdp();
});

mdpverif.addEventListener('input', function () {
    verifmdp();
});

function verifmdp() {

if (mdp.value == mdpverif.value) {
  if(mdp.value.length >= 8){
    erreur.innerHTML = "Parfait !";
    erreur.style.color = "green";
    mdp_ok = true;
    buttonVerif();
    }
  else {
    erreur.innerHTML = "Le mot de passe est trop court !";
    erreur.style.color = "red";
    mdp_ok = false;
    buttonVerif();

  }

}
else {
  erreur.innerHTML = "Les mots de passe ne correspondent pas !";
  erreur.style.color = "red";
  mdp_ok = false;
  buttonVerif();
}

}


var erreur_email = document.getElementById("error_email");
var email = document.getElementById('email');
email.addEventListener('input', function () {


  if(email.value.length >= 5){
    var myData = jQuery('#form-inscription').serialize();
    jQuery.ajax({
      url: '/inscription/EmailLiveCheck.php', method: "POST",data: myData,
      success: function(reponse){
        if (reponse=="True"){
          erreur_email.innerHTML = "Email disponible";
          erreur_email.style.color = "green";
          email_ok = true;
          buttonVerif();

        }
        else {
          erreur_email.innerHTML = "Email indisponible";
          erreur_email.style.color = "red";
          email_ok = false;
          buttonVerif();
        }

      }
    });
  }

});


var erreur_pseudonyme = document.getElementById("error_pseudonyme");
var pseudonyme = document.getElementById('pseudonyme');
pseudonyme.addEventListener('input', function () {


  if(pseudonyme.value.length > 0){
    var myData = jQuery('#form-inscription').serialize();
    jQuery.ajax({
      url: '/inscription/PseudoLiveCheck.php', method: "POST",data: myData,
      success: function(reponse){
        if (reponse=="True"){
          erreur_pseudonyme.innerHTML = "Pseudonyme disponible";
          erreur_pseudonyme.style.color = "green";
          pseudonyme_ok = true;
          buttonVerif();

        }
        else {
          erreur_pseudonyme.innerHTML = "Pseudonyme indisponible";
          erreur_pseudonyme.style.color = "red";
          pseudonyme_ok = false;
          buttonVerif();
        }

      }
    });
  }
  else{
    erreur_pseudonyme.innerHTML = "";
    erreur_pseudonyme.style.color = "red";
    pseudonyme_ok = false;
    buttonVerif();
  }

});



function findPos(obj){
    var curleft = curtop = 0;
    if (obj.offsetParent) {
        curleft = obj.offsetLeft
        curtop = obj.offsetTop

        while (obj = obj.offsetParent) {
            curleft += obj.offsetLeft
            curtop += obj.offsetTop
        }
    }
    return [curleft,curtop];
}

coords_pseudo = findPos(pseudonyme);

erreur_pseudonyme.style.left = coords_pseudo[0] + 20 + "px";
erreur_pseudonyme.style.top = coords_pseudo[1] + 42 +"px";

window.addEventListener("resize", function () {
  coords_pseudo = findPos(pseudonyme);

  erreur_pseudonyme.style.left = coords_pseudo[0] + 20 + "px";
  erreur_pseudonyme.style.top = coords_pseudo[1] + 42 +"px";

});


coords_email = findPos(email);

erreur_email.style.left = coords_email[0] + 20 + "px";
erreur_email.style.top = coords_email[1] + 42 +"px";

window.addEventListener("resize", function () {
  coords_email = findPos(email);

  erreur_email.style.left = coords_email[0] + 20 + "px";
  erreur_email.style.top = coords_email[1] + 42 +"px";


});



coords_mdp = findPos(mdpverif);

erreur.style.left = coords_mdp[0] + 20 + "px";
erreur.style.top = coords_mdp[1] + 42 +"px";

window.addEventListener("resize", function () {
  coords_mdp = findPos(mdpverif);

  erreur.style.left = coords_mdp[0] + 20 + "px";
  erreur.style.top = coords_mdp[1] + 42 +"px";

});

var oeil1 = document.getElementById("oeil_1");
var oeilcache1 = document.getElementById("oeil_cache_1");
var div_oeil_1 = document.getElementById("div_oeil_1");
var affichage_1 = "cache";

function process_oeil_1() {

  if (affichage_1 == "cache"){
    oeil1.style.display = "block";
    oeilcache1.style.display = "none";
    affichage_1 = "normal";
    // On affiche le mdp
    mdp.type = "text";
  }
  else{
    oeil1.style.display = "none";
    oeilcache1.style.display = "block";
    affichage_1 = "cache";
    // On masque le mdp
    mdp.type = "password";
  }
}

var oeil2 = document.getElementById("oeil_2");
var oeilcache2 = document.getElementById("oeil_cache_2");
var div_oeil_2 = document.getElementById("div_oeil_2");
var affichage_2 = "cache";

function process_oeil_2() {

  if (affichage_2 == "cache"){
    oeil2.style.display = "block";
    oeilcache2.style.display = "none";
    affichage_2 = "normal";
    // On affiche le mdp
    mdpverif.type = "text";
  }
  else{
    oeil2.style.display = "none";
    oeilcache2.style.display = "block";
    affichage_2 = "cache";
    // On masque le mdp
    mdpverif.type = "password";
  }
}




coords_oeil_1 = findPos(mdp);
coords_oeil_2 = findPos(mdpverif);

var positionInfo = mdp.getBoundingClientRect();
var width = positionInfo.width;

div_oeil_1.style.left = coords_oeil_1[0] + width - 35 + "px";
div_oeil_1.style.top = coords_oeil_1[1] + 12 +"px";


var positionInfo2 = mdpverif.getBoundingClientRect();
var width2 = positionInfo2.width;

div_oeil_2.style.left = coords_oeil_2[0] + width2 - 35 + "px";
div_oeil_2.style.top = coords_oeil_2[1] + 12 +"px";



window.addEventListener("resize", function () {



  coords_oeil_1 = findPos(mdp);
  coords_oeil_2 = findPos(mdpverif);

  var positionInfo = mdp.getBoundingClientRect();
  var width = positionInfo.width;

  div_oeil_1.style.left = coords_oeil_1[0] + width - 35 + "px";
  div_oeil_1.style.top = coords_oeil_1[1] + 12 +"px";


  var positionInfo2 = mdpverif.getBoundingClientRect();
  var width2 = positionInfo2.width;

  div_oeil_2.style.left = coords_oeil_2[0] + width2 - 35 + "px";
  div_oeil_2.style.top = coords_oeil_2[1] + 12 +"px";


});
