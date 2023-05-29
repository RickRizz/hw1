$errors=false;

function setError(boolean){
    $errors=boolean;
}

function checkName(e){
    
    const $errore= document.querySelector("#name span");
    $nome= e.currentTarget.value;
    console.log("macheca");
    if($nome.length>2 && /^[A-Za-z]+$/.test($nome)){  //nome può comprendere solo lettere
        e.currentTarget.removeAttribute("style","border-color:red");
        $errore.style.display="none";
        setError(false);
    }else{
        e.currentTarget.setAttribute("style","border-color:red");
        $errore.style.display="block";
        setError(true);
    }
}

function checkUsername(e){
    const $errore= document.querySelector("#username span");
    $nome= e.currentTarget.value;
    console.log($nome);
    if($nome.length>2 && /^[a-zA-Z0-9]+$/.test($nome)){  //username può comprendere anche numeri ma non lo spazio
        e.currentTarget.removeAttribute("style","border-color:red");
        $errore.style.display="none";
        setError(false);
    }else{
        e.currentTarget.setAttribute("style","border-color:red");
        $errore.style.display="block";
        setError(true);
    }
}

function checkPassword(e){
    const $errore= document.querySelector("#password span");
    $nome= e.currentTarget.value;
    if(/^[A-Za-z]\w{7,15}$/.test($nome)){ //la password può contenere caratteri alfanumerici e la lunghezza deve essere compresa tra 8 e 16 e deve iniziare con una lettera
        e.currentTarget.removeAttribute("style","border-color:red");
        $errore.style.display="none";
        setError(false);
    }else{
        e.currentTarget.setAttribute("style","border-color:red");
        $errore.style.display="block";
        setError(true);
    }
}


function checkEmail(e){
    const $errore= document.querySelector("#email span");
    $nome= e.currentTarget.value;
    if( /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($nome)){
        e.currentTarget.removeAttribute("style","border-color:red");
        $errore.style.display="none";
        setError(false);
    }else{
        e.currentTarget.setAttribute("style","border-color:red");
        $errore.style.display="block";
        setError(true);
    }
}

function goHome(e){
    window.location="index.php";
}

function checkErrori(e){
    if($errors){
        e.preventDefault();
    }
}

document.querySelector('#name input').addEventListener('blur', checkName);
document.querySelector('#username input').addEventListener('blur', checkUsername);
document.querySelector('#password input').addEventListener('blur', checkPassword);
document.querySelector('#email input').addEventListener('blur', checkEmail);
document.querySelector(".logo").addEventListener("click",goHome);
document.querySelector("form").addEventListener("submit", checkErrori);
