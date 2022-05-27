<?php

require_once 'Controllo_sessione.php'; 

if(ControlloSessione() == 0){
    header("Location: login.php"); 
}

$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']); 


if(isset($_GET['titolo']) && isset($_GET['url_img'])){

    $titolo = mysqli_real_escape_string($conn, $_GET['titolo']); 
    $url_img = $_GET['url_img'];
    $username = mysqli_real_escape_string($conn, $_SESSION['username']);


    $query = "INSERT INTO post(username, titolo, url_img) VALUES ('$username', '$titolo', '$url_img')"; 
  
    $res = mysqli_query($conn, $query); 
  
}

mysqli_close($conn);

?>