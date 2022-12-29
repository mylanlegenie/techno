


function afficher() {
    etat = "affiché";
  document.getElementById('div_li').style.display = 'flex';
}
function cacher() {
    etat = "masqué";
  document.getElementById('div_li').style.display = 'none';
}

button.addEventLister('clcik', event =>){
    afficher()
}


