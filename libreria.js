
//tenda
const mobileMenuIcon = document.getElementById('mobile-menu-icon');
const curtain = document.querySelector('.curtain');
const curtainCloseIcon = document.querySelector('.curtain .close-icon');

mobileMenuIcon.addEventListener('click', () => {
  curtain.classList.toggle('show');
});

curtainCloseIcon.addEventListener('click', () => {
  curtain.classList.remove('show');
});

//LIBRERIA
mostraLibreria();

function mostraLibreria(){
    fetch("preferiti.php").then(onResponse).then(onJson);
}

function onResponse(response){
    console.log(response);
    return response.json();
}

function onJson(json){
    console.log(json);
    let booleano=true;
    if(json.length==0){
      booleano=false
    }
    libreriaVuota(booleano);
    let vetrina= document.querySelector("#vetrina");
    for(let i=0; i< json.length;i++){
        const blocco_gioco= document.createElement('div');
        blocco_gioco.classList.add("game");
        const sfondo= document.createElement("img");
        sfondo.setAttribute("src",json[i]['content']['copertina']);
        const titolo= document.createElement('h2');
        titolo.innerHTML= json[i]['content']['titolo'];
        const preferito= document.createElement("img");
        preferito.setAttribute("src","./img/preferito.png");
        preferito.addEventListener("click",rimuoviPreferito);
        preferito.classList.add("preferiti");
        blocco_gioco.dataset.id=json[i]['id'];
        blocco_gioco.appendChild(sfondo);
        blocco_gioco.appendChild(titolo);
        blocco_gioco.appendChild(preferito);
        vetrina.appendChild(blocco_gioco);
    }
}

function libreriaVuota(booleano){
  const libreria=document.querySelector("#libreria-vuota");
  if(!booleano){
    libreria.style.display="flex";
  }else
    libreria.style.display="none";
}

//rimuovi dalla libreria

function rimuoviPreferito(e){
  gioco=e.currentTarget.parentNode;
  const formData= new FormData();
  formData.append('id',gioco.dataset.id);
  gioco.childNodes[2].src="./img/heart.png";
  fetch("delete_game.php", {method:'post', body: formData}).then(dispatchResponse);
  let vetrina= document.querySelector("#vetrina");
  vetrina.innerHTML="";
  mostraLibreria();
}

function dispatchResponse(res){
  console.log(res);
  return res.json().then(databaseResponse);
}

function databaseResponse(json){
   if(!json){
    console.log("errore");
    return null;
    }
}