<?php

require_once 'Controllo_sessione.php'; 

if(ControlloSessione() == 0){
    header("Location: login.php"); 
}


$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']) or die("Errore di connessione: ".mysqli_connect_error());



?>

<html>
    <head>
        <link rel="stylesheet" href="home.css">
        <title>LE TUE RICHIESTE</title>
        <script src = "visualizza_richieste.js" defer ></script>
    </head>
    <body>
    <header>
        <nav>
          <ul class="menu">
            
            <li><a href="homePage.php">HOME</a></li>
            <li><a href="profilo.php">PROFILO</a></li>
            <li><a href="cerca_utente.php">CERCA UTENTE</a></li>
            <li><a href="visualizza_richieste.php">RICHIESTE</a></li>

          </ul>
        <div id="username"><a href = "profilo.php"><?php echo($_SESSION['username']) ?></a></div>
        <div id="logout"><a href="logout.php">LOGOUT</a></div>

        </nav>
        <main>
        <h1 class="titolo">LE TUE RICHIESTE</h1>
        <div class='banner'></div>
        </main>

        <section class = "griglia">
            <ul class ="info">
               
            </ul>
        </section>

    </body>
</html>