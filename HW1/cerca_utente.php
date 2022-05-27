<?php
require_once "Controllo_sessione.php";

if(ControlloSessione() == 0){
    header("Location: login.php");
}

$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']) or die("Errore".mysqli_connect_error()); 

?>

<html>
    <head>
        <link rel ="stylesheet" href = "home.css"></link>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <script src="cercapersone.js" defer = "true"></script>
        <title>CERCA UTENTE</title>
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
        </header>
    </body>

    <main>
    <div class = "titolo" >CERCA QUI I TUOI AMICI! </div>
        <form method = "POST" class = "cerca_profilo">
          <label><input type="text" placeholder = "Username utente" id= "persona" name = "utente_da_cercare"></label>
          <label><input type="submit" value = "Cerca"></label>
        </form>

        <div class = "banner"></div>

    </main>
    <section class="postview">
        
    </section>



</html>