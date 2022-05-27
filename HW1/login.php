<?php

    include "Controllo_sessione.php";
    if(ControlloSessione() != 0){
        header("Location: homePage.php");
        exit;
    }

    if(!empty($_POST["username"]) && !empty($_POST["password"])){

    $conn = mysqli_connect($db_config['host'], $db_config['username_db'], "", $db_config['db_name']); 

    if($conn == false){
        echo "connessione al database fallita";
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT username, password FROM utente WHERE username = '$username'"; 

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;

    if(mysqli_num_rows($res) > 0){

        $utente = mysqli_fetch_assoc($res);

        if(strcmp($password, $utente['password']) == 0){
            $_SESSION["username"] = $_POST['username']; 
            header("Location: homePage.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }else{
            $errore = "Attenzione, credenziali non valide";
        }   
    }                                
    else{
        $errore = "Attenzione, credenziali non valide";
        }
    }
    
    

?>


<html>
    <head>
    </head>
    <body>
       <?php
            // Verifica la presenza di errori
             if(isset($errore))
            {
                echo "<p class = 'alert alert-error'>";
                echo "$errore";
                echo "</p>";
            }
        ?>
        <main>
          <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
          <link rel="stylesheet" href="file_nonmio.css" type="text/css">
          <div class="body-content">
          <div class="module">
          <h1>|LOGIN|</h1>
          <form class="form" method="post">
          <div class="alert alert-error"></div>
          <label><input type="text" placeholder="Username" name="username" required /></label>
          <label><input type="password" placeholder="Password" name="password" autocomplete="new-password" required /></label>
          <label><input type="submit" value="Accedi" name="accedi" class="btn btn-block btn-primary" /></label>
          </form>
          <div class="b_registrati">Non hai un account? <a href="registrazione.php">REGISTRATI</a></div>
          </div>
         
        </main>
        

        
    </body>
</html> 

