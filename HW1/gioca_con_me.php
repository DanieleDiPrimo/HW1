<?php

require_once 'Controllo_sessione.php'; 

$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']) or die("Errore".mysqli_connect_error()); 

if(isset($_GET['user_proprietario']) && isset($_GET['titolo']) ){

    $user_proprietario = mysqli_real_escape_string($conn, $_GET['user_proprietario']);
    $titolo = mysqli_real_escape_string($conn, $_GET['titolo']); 
    $user_main = mysqli_real_escape_string($conn, $_SESSION['username']);

    $query = "INSERT INTO giocaConMe(user_proprietario, user_main, titolo) VALUES ('$user_proprietario', '$user_main' , '$titolo')";

    mysqli_query($conn, $query); 
} 

mysqli_close($conn); 

?>