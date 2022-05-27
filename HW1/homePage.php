<?php 

require_once "Controllo_sessione.php";

if(ControlloSessione() == 0){
  header("Location: login.php");
}

$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']);

$query = "SELECT * FROM utente WHERE username = '".$_SESSION['username']."'"; 

$res = mysqli_query($conn, $query); 
$utenza = mysqli_fetch_assoc($res); 

$username = mysqli_real_escape_string($conn, $_SESSION['username']);
$link_img = $utenza['Pimage'];


?>


<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "home.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <script src = "homee.js" defer = "true"></script>
        <title>GamesLab</title>
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
        <div id="sfondo">
        <div id="overlay"></div>
          <div class = "titolo">
              <h1>GameMeet</h1>
          </div>
        </div>
      </header>

      <main>
        <div class = "titolo" >QUALE GIOCO VUOI AGGIUNGERE AL TUO PROFILO? </div>
        <form method = "POST" class = "gameform">
          <label><input type="text" placeholder = "Inserisci il gioco qui" id = "gioco" name = "gioco"></label>
          <label><input type="submit" value = "Cerca"></label>
        </form>
        <div id = "gamenotfound"></div>
      </main>

      <section class="postview">
        
      </section>

      <footer>
        <span>PAGINA IDEATA E REALIZZATA DA:</span>
        <span>DANIELE DI PRIMO 1000001110</span>
      </footer>


    </body>
</html>