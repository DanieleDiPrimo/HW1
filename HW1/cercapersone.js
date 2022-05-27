
function onJson(json){
    console.log(json);

    const post_view = document.querySelector(".postview");
    post_view.innerHTML = "";
    div.innerHTML = "";

    for(const elementi of json){
            

        console.log("json non nullo");

        const box_post = document.createElement("div"); 
        box_post.classList.add("box_post");

        var giocaConMe_button = document.createElement('input');
        giocaConMe_button.setAttribute('type','button');
        giocaConMe_button.setAttribute('name','' + elementi.titolo);
        giocaConMe_button.setAttribute('value', 'Gioca Con Me!');
        giocaConMe_button.addEventListener('click', GiocaConMe);
        
        
        const box_titolo = document.createElement("div");
        box_titolo.classList.add("box_titolo");

        const box_img = document.createElement("div"); 
        box_img.classList.add("box_img");

        const titolo = document.createElement("p");
        titolo.textContent = elementi.titolo; 

        const img = document.createElement("img"); 
        img.src = elementi.url_img;

        box_titolo.appendChild(titolo);
        box_img.appendChild(img); 

        box_post.appendChild(box_titolo);
        box_post.appendChild(box_img);
        box_post.appendChild(giocaConMe_button);

        post_view.appendChild(box_post);
        
    }
}

function FunctionNickname(event){
    event.preventDefault();
}

function onResponseGCM(response){
    if(response.ok){
        const esito = true;
        stampaBanner(esito);
    }else{
        const esito = false; 
        stampaBanner(esito);
    }
}

function stampaBanner(esito){
    div.innerHTML = ""; 

    const mess = document.createElement("span"); 

    if(esito == true){
    mess.textContent = "Richiesta inviata con successo!"; 
    mess.classList.add("bannOK");
    }else{
        mess.textContent = "c'è stato un problema al server";
    }
    div.appendChild(mess);
    window.scrollTo(0, 0);

}

function GiocaConMe(event){ 

    const game = event.currentTarget.name; 
    const persona_input = document.querySelector("#persona");
    const persona_value = encodeURIComponent(persona_input.value);

    console.log("QUESTO UTENTE IN SESSIONE VUOLE GIOCARE ASSIEME A" + persona_value + "AL GIOCO" +game);
    
    fetch("http://localhost/Esercizi/HW1/gioca_con_me.php?user_proprietario=" + persona_value + "&titolo=" + game).then(onResponseGCM); 
}

function onResponse(response){
    return response.json();
}

function CercaPersona(event){
    event.preventDefault();

    const persona_input = document.querySelector("#persona");
    const persona_value = encodeURIComponent(persona_input.value);

    const url = "http://localhost/Esercizi/HW1/do_cerca_utente.php?persona=" + persona_value;
    console.log(url);

    fetch(url).then(onResponse).then(onJson); 


}

const form = document.querySelector(".cerca_profilo");
const div = document.querySelector(".banner"); 

form.addEventListener('submit', CercaPersona);