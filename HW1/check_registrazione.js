function checkName(){

    const nome = document.querySelector(".nome");

    if(nome.value.trim() == ''){
        const error = document.createElement('h1'); 
        error.textContent = "IL NOME NON PUO' ESSERE VUOTO";
        error.classList.add("banner_errore");
        box_error.appendChild(error); 
        return false;
    }else{
        if( /^[a-zA-Z]{1,15}$/.test(nome.value.trim()) == false){
            //sono stati utilizzati nell'inserimento del nome underscore numeri o altri caratteri
            const error = document.createElement('h1'); 
            error.textContent = "IL NOME NON PUO' CONTENERE CARATTERI SPECIALI";
            error.classList.add("banner_errore");
            box_error.appendChild(error);
            return false; 
        }else{
            return true;
        }
    }
}

function checkCognome(){

    if(cognome.value.trim() == ''){
        const error = document.createElement('h1'); 
        error.textContent = "IL COGNOME NON PUO' ESSERE VUOTO";
        error.classList.add("banner_errore");
        box_error.appendChild(error); 
        return false;
    }else{
        if( /^[a-zA-Z]{1,15}$/.test(cognome.value.trim()) == false){
            //sono stati utilizzati nell'inserimento del nome underscore numeri o altri caratteri
            const error = document.createElement('h1'); 
            error.textContent = "IL COGNOME NON PUO' CONTENERE CARATTERI SPECIALI";
            error.classList.add("banner_errore");
            box_error.appendChild(error);
            return false; 
        }else{
            return true;
        }
    }

}

function checkUsername(){

    if(username.value.trim() == ''){
        const error = document.createElement('h1'); 
        error.textContent = "L'USERNAME NON PUO' ESSERE VUOTO";
        error.classList.add("banner_errore");
        box_error.appendChild(error); 
        return false;
    }else{
        if( /^[a-zA-Z0-9_]{1,15}$/.test(username.value.trim()) == false){
            //sono stati utilizzati nell'inserimento del caratteri speciali non consentiti
            const error = document.createElement('h1'); 
            error.textContent = "L'USERNAME NON PUO' CONTENERE CARATTERI SPECIALI";
            error.classList.add("banner_errore");
            box_error.appendChild(error);
            return false; 
        }else{
        return true;
        }

    }

}

function checkEmail(){

    if(email.value.trim() == ''){
        const error = document.createElement('h1'); 
        error.textContent = "IL CAMPO EMAIL E' OBBLIGATORIO";
        error.classList.add("banner_errore");
        box_error.appendChild(error); 
        return false;
    }else{
        if(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.value.trim()) == false){
            const error = document.createElement('h1'); 
            error.textContent = "FORMATO EMAIL NON VALIDO";
            error.classList.add("banner_errore");
            box_error.appendChild(error);
            return false;
        }else{
            return true;
        }

        
    }
}

function checkPassword(){
    
    if(password.value.trim() == ''){
        const error = document.createElement('h1'); 
        error.textContent = "CAMPO PASSWORD NON PUO' ESSERE VUOTO";
        error.classList.add("banner_errore");
        box_error.appendChild(error); 
        return false;
    }else{
        if( /^[a-zA-Z0-9_]{1,15}$/.test(password.value.trim()) == false){
            //sono stati utilizzati nell'inserimento del caratteri speciali non consentiti
            const error = document.createElement('h1'); 
            error.textContent = "PASSWORD NON PUO' CONTENERE CARATTERI SPECIALI";
            error.classList.add("banner_errore");
            box_error.appendChild(error);
            return false; 
        }else{
            return true;
        }

    }

    

}

const box_error = document.querySelector("#errore");

const nome = document.querySelector(".nome"); 
nome.addEventListener('blur', checkName);

const cognome = document.querySelector(".cognome"); 
cognome.addEventListener('blur', checkCognome);

const email = document.querySelector(".email"); 
email.addEventListener('blur', checkEmail); 

const username = document.querySelector(".username");
username.addEventListener('blur', checkUsername); 

const password = document.querySelector(".password"); 
password.addEventListener('blur', checkPassword); 





