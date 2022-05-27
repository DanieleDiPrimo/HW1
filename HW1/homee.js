//Codice js che mi permette di avere un record di tutti i giochi che possono essere aggiunti
//purtroppo questa API non ha un URL che gestisce la ricerca del gioco per nome gioco, ma solo per id che non conosco a prescindere.Mi conservo quindi tutto in una vettore e gestisco tutto da li. So che è inefficiente ma non ho trovato un'altra API funzionante

const doc = []; 

function OnJson(json){
    
    //console.log(json);

    for(let i = 0; i < json.length; i++){
        doc[i] = json[i];
        console.log(" "+ doc[i].title);
    }
    

}

function onResponse(response){
    return response.json();
}

fetch("http://localhost/Esercizi/HW1/api_games.php").then(onResponse).then(OnJson);

const box_error = document.querySelector("#gamenotfound");
const form = document.querySelector("form");
form.addEventListener('submit' , gameSearch);

//Codice relativo alla visualizzazione dei post

function OnJsonPost(json){
    console.log("Arrivo alla onjsonpost");
    console.log(json);

    
    const post_view = document.querySelector(".postview");
    post_view.innerHTML = "";

    for(const elementi of json){

        if(elementi != 0){

            console.log("json non nullo");

            const box_post = document.createElement("div"); 
            box_post.classList.add("box_post");

            var remove_button = document.createElement('input');
            remove_button.setAttribute('type','button');
            remove_button.setAttribute('name','' + elementi.titolo);
            remove_button.setAttribute('value', 'Rimuovi Gioco');
            remove_button.addEventListener('click', remove_game);
        
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
            box_post.appendChild(remove_button);

            post_view.appendChild(box_post);
        }
    
    }

}

function onResponsePost(response){
    return response.json();
}

function ResponseDelete(response){
    if(response.ok){
        console.log("T'appo");
        window.location.reload();
    }
}


function remove_game(event){
    console.log(event.currentTarget.name);

    fetch("http://localhost/Esercizi/HW1/rimuovi_post.php?game_remove=" + event.currentTarget.name).then(ResponseDelete);
}



fetch("http://localhost/Esercizi/HW1/lista_post.php").then(onResponsePost).then(OnJsonPost);


//Codice relativo alla ricerca giochi attraverso API REST

function gameSearch(event){

    event.preventDefault();

    box_error.innerHTML = "";

    let flag = 0;

    const game_input = document.querySelector("#gioco");
    const game_value = encodeURIComponent(game_input.value); 
    
    console.log(" " + game_value);
    
    for(let i = 0; i < doc.length; i++){
        if(doc[i].title == game_input.value){
            console.log("TROVATO");
            fetch("http://localhost/Esercizi/HW1/add_post.php?titolo="+doc[i].title + "&url_img="+ doc[i].thumbnail); //mando i dati al server 
            flag=1;
        }
        
    }

    if(flag == 0){ 
        const errore = document.createElement("h1"); 
        
        errore.textContent = "MI DISPIACE, GIOCO NON TROVATO";
        errore.classList.add("gameError");
        
        box_error.appendChild(errore);
    }else{
        window.location.reload();
    }

}