var carrousel = document.getElementById('carrousel');
var titre = document.getElementById('titre-carrousel');

var compteur = 0 ;


function Suivant(images) {
  compteur++ ;
  if (compteur >= images.length ) {compteur = 0;}

  carrousel.style.backgroundImage = "url('../images/images-diapo/"  + images[compteur] + "')";
  changeTitre(images);

}

function Precedent(images) {
  compteur-- ;
  if (compteur < 0) {compteur = images.length - 1;}

  carrousel.style.backgroundImage = "url('../images/images-diapo/"  + images[compteur] + "')";
  changeTitre(images);
}

function removeExt(nom){
  return nom.replace(/\.[^\/.]+$/, '');
}


function redirection(images) {
  window.location.href = ( removeExt(images[compteur]) );
}

function changeTitre(images) {
  titre.innerHTML = removeExt(images[compteur]).toUpperCase();
}

$('.fleche').on('click', function (event) {event.stopPropagation();});
