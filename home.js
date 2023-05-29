//API NEWS

function mostraNews(){
  fetch("news.php").then(onNewsResponse).then(onNewsJson);
}

mostraNews();


function onNewsResponse(res){
  return res.json();
}

function onNewsJson(json){
  console.log(json);
  const vetrina= document.querySelector("#vetrina");
  for(let i=0;i<3;i++){
    let contenitore= document.createElement("a");
    contenitore.classList.add("contenitore");
    let titolo= document.createElement("h1");
    let copertina=document.createElement("img");
    titolo.textContent=json[i]['title'];
    copertina.src=json[i]['main_image'];
    contenitore.href=json[i]['article_url'];
    contenitore.appendChild(copertina);
    contenitore.appendChild(titolo);
    vetrina.appendChild(contenitore);
  }
}





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


// API
const form= document.querySelector("#search-form");
const input= document.querySelector("#search-input");

form.addEventListener("submit", ricerca);

function ricerca(e){
    e.preventDefault();
    //console.log(input.value);
    fetch("ricerca.php?q="+ encodeURIComponent(input.value)).then(onResponse).then(onJson);
   
}


function onResponse(response){
    //console.log(response);
    return response.json();
}

function onJson(json){
    //console.log(json);
    const risultati= document.querySelector("#search-results");
    risultati.innerHTML='';
    let count=0;
    //console.log(json.results);
    for(let i=0; i< 8;i++){ //voglio mostrare solo i primi 6 risultati
        
        
        count++;
        const blocco_gioco= document.createElement('div');
        blocco_gioco.dataset.copertina=json.results[i]['background_image'];
        blocco_gioco.dataset.titolo=json.results[i]['name'];
        blocco_gioco.classList.add("game");
        const sfondo= document.createElement("img");
        sfondo.setAttribute("src",json.results[i]['background_image']);
        const titolo= document.createElement('h2');
        titolo.innerHTML= json.results[i]['name'];
        const preferito= document.createElement("img");
        preferito.setAttribute("src","./img/heart.png");
        preferito.classList.add("preferiti");
        preferito.addEventListener("click",switchPreferito);
        blocco_gioco.appendChild(sfondo);
        blocco_gioco.appendChild(titolo);
        blocco_gioco.appendChild(preferito);
        blocco_gioco.dataset.id=json.results[i]['id'];
        risultati.appendChild(blocco_gioco);

    }

}



function switchPreferito(e){
 
  
  gioco=e.currentTarget.parentNode;
  
  if(gioco.childNodes[2].getAttribute("src") === "./img/heart.png")
  { //se devo aggiungere il gioco ai preferiti
    console.log("aggiungo ai preferiti");
    gioco.childNodes[2].src="./img/preferito.png"
    const formData= new FormData();
    formData.append('id',gioco.dataset.id);
    formData.append("copertina",gioco.dataset.copertina);
    formData.append("titolo",gioco.dataset.titolo)
    fetch("save_game.php",{method: 'post', body: formData}).then(dispatchResponse);
    e.stopPropagation();
  }else{ //devo rimuoverlo dai preferiti
    console.log("rimuovo dai preferiti");
    const formData= new FormData();
    formData.append('id',gioco.dataset.id);
     gioco.childNodes[2].src="./img/heart.png";
     fetch("delete_game.php", {method:'post', body: formData}).then(dispatchResponse);
  }
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





//layout sotto la barra di ricerca

function switchLayout(){
  if(input.value===''){
    let risultati= document.querySelector("#search-results");
    risultati.innerHTML='';
    info.style.display="flex";
  }
  else{
    info.style.display="none";
  }
}

//const input= document.querySelector("#search-input"); variabile già dichiarata sopra
 info= document.querySelector("#info-libreria");
 input.addEventListener("input",switchLayout);

  