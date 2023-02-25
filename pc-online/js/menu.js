var etat = "masqué";

function menu() {

    if (etat == "masqué"){

      afficher();
    }
    else if (etat == "affiché"){

      cacher();
    }

}




function afficher() {
    etat = "affiché";
  document.getElementById('croix').style.display = 'block';
  document.getElementById('burger').style.display = 'none';
  document.getElementById('menu_mobile').style.display = 'flex';

}
function cacher() {
    etat = "masqué";
  document.getElementById('croix').style.display = 'none';
  document.getElementById('burger').style.display = 'block';
  document.getElementById('menu_mobile').style.display = 'none';
}

window.addEventListener("resize", function a() {
  searchBack();
  if (window.matchMedia("(min-width:850px)").matches){
    cacher();
  }
}, false);





function search() {
  cacher();
  if (window.matchMedia("(min-width:850px)").matches){
    document.getElementById('searchbarbureau').style.display = 'flex';
  }
  else{
    document.getElementById('searchbarmobile').style.display = 'flex';

  }
  document.getElementById('loupe').style.display = 'none';
}


function searchBack() {
  document.getElementById('searchbarbureau').style.display = 'none';
  document.getElementById('searchbarmobile').style.display = 'none';
  document.getElementById('loupe').style.display = 'block';
}


var searchmenu = document.getElementById('searchmenu');

document.addEventListener('click', function(event){
  var isInSearchBar = searchmenu.contains(event.target);
  if (!isInSearchBar){
    searchBack();
  }
})
