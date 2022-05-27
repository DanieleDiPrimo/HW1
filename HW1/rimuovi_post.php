<?php

require_once 'Controllo_sessione.php'; 

$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']) or die("Errore".mysqli_connect_error());

if(isset($_GET['game_remove'])){
   
    $query = "DELETE  FROM post WHERE username = '".$_SESSION['username']."' AND titolo = '".$_GET['game_remove']."' "; 

    mysqli_query($conn, $query) or die("Errore".mysqli_error()); 
    
    mysqli_close($conn);
}

?>
