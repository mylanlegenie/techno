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



// Radio





function toggle(toDisplay, toHide){
    toDisplay.style.display ='block';
    toHide.style.display ="none";
}


let allSexe = document.getElementsByName('sexe');

allSexe.forEach(radio => {
  
  radio.addEventListener('change',function(){

    allSexe.forEach(radio2 => {
      let parent = radio2.parentNode;
      let p = parent.querySelector("label p");
      let i = parent.querySelector("label i");

      if (radio2.checked){
        toggle(i, p);
      }
      else{
        toggle(p, i);
      }

      
    });

  })


});