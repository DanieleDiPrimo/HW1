<?php

require_once "Controllo_sessione.php";


$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']) or die("Errore:".mysqli_connect_error());

$query = "SELECT * FROM post where username = '".$_SESSION['username']."' "; 

$res = mysqli_query($conn, $query) or die("Errore Query:".mysqli_error());

$post_utente = array(); 
$a = 0;

while($row = mysqli_fetch_array($res)){
    $post_utente[$a]["username"] = $row['username']; 
    $post_utente[$a]["titolo"] = $row['titolo'];
    $post_utente[$a]["url_img"] = $row['url_img'];

    $a++;
    
}

if(mysqli_num_rows($res) > 0){
    echo json_encode($post_utente);
}else{
    $post_utente[0] = 0;
    echo json_encode($post_utente);
}

mysqli_close($conn);

?>