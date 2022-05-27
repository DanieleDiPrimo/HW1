function onJsonVR(json){
    console.log(json);

    const ul = document.querySelector(".info");; 
    ul.innerHTML = ""; 

    if(json[0] == 0){
        console.log("AO");
        const div = document.querySelector(".banner"); 

        const span = document.createElement("span"); 
        span.textContent = "Ancora nessuna richiesta!"; 
        span.classList.add("bannER"); 

        div.appendChild(span);
    }else{
        for(const elementi of json){
             
            const li = document.createElement("li"); 
            li.textContent = elementi.user_main + " VUOLE GIOCARE CON TE A: " + elementi.titolo; 

            ul.appendChild(li);
        }
    }

}

function onResponseVR(response){
    return response.json();
}

fetch("http://localhost/Esercizi/HW1/v_richieste_fromServer.php").then(onResponseVR).then(onJsonVR);