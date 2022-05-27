<?php
require_once "Controllo_sessione.php";

$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']) or die("Errore".mysqli_connect_error()); 

if(isset($_GET['persona'])){
    
    $query = "SELECT * FROM post where username = '".$_GET['persona']."' "; 

    $res = mysqli_query($conn, $query) or die("Errore".mysqli_error()); 

    $post = array();
    $a = 0;

    while($row = mysqli_fetch_array($res)){
        $post[$a]["username"] = $row['username'];
        $post[$a]["titolo"] = $row['titolo'];
        $post[$a]["url_img"] = $row['url_img'];

        $a++;
    }

    if(mysqli_num_rows($res) > 0){
        echo json_encode($post); 
    }else{
        $post[0] = 0;
        echo json_encode($post);
    }

    mysqli_close($conn);
    
}

?>