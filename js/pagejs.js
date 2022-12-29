let etat = "masqué";
let conditions = document.getElementsByClassName('conditions')[0];



function afficher() {
    etat = "affiché";
  document.getElementById('div_li').style.display = 'flex';
}
function cacher() {
    etat = "masqué";
  document.getElementById('div_li').style.display = 'none';
}

function toggle(){
    if (etat=="masqué"){
      afficher();
    }
    else{
      cacher();
    }
}



conditions.addEventListener('click', function() {

toggle();
 }, false);


// Checkbox

let checkbox = document.getElementById("checkbox_input");
let bouton = document.getElementById("input_envoyer");
bouton.style.pointerEvents = "none";


checkbox.addEventListener('change', function() {
  if (this.checked) {
    bouton.style.pointerEvents = "auto";
  } else {
    bouton.style.pointerEvents = "none";
  }
});