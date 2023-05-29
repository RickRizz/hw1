
// Nasconde il messaggio di conferma dopo 5 secondi

let message = document.querySelector('#message p');

if(message){ // se è appena avvenuta la registrazione ci sarà un messaggio
// Imposta l'opacità iniziale
let opacity = 1;

// Riduci gradualmente l'opacità ogni 100 millisecondi
let fadeInterval = setInterval(function() {
  if (opacity > 0) {
    opacity -= 0.05; // Regola la velocità di dissolvenza modificando l'incremento/decremento
    message.style.opacity = opacity;
  } else {
    clearInterval(fadeInterval); // Interrompi l'intervallo una volta che l'opacità raggiunge 0
  }
}, 100);

}
