<?php

require_once 'Controllo_sessione.php'; 

$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']) or die("Errore di connessione: ".mysqli_connect_error());

$query = "SELECT * FROM giocaConMe WHERE user_proprietario = '".$_SESSION['username']."'"; 

$res = mysqli_query($conn, $query) or die("Errore nella richiesta: ".mysqli_error()); 

$richieste = array(); 

$a = 0; 


while($row = mysqli_fetch_array($res)){
    $richieste[$a]['user_main'] = $row['user_main'];
    $richieste[$a]['user_proprietario'] = $row['user_proprietario']; 
    $richieste[$a]['titolo'] = $row['titolo']; 
    $a++; 
}

if(mysqli_num_rows($res) > 0){
    echo json_encode($richieste); 
}else{
    $richieste[0] = 0; 
    echo json_encode($richieste); 
}

?>