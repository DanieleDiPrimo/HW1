<?php

require_once "Controllo_sessione.php";

if(ControlloSessione() == 0){
    header("Location: login.php");
}

$conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']) or die("Errore Connessione".mysqli_connect_error()); 

$query = "SELECT * FROM utente WHERE username = '".$_SESSION['username']."'"; 

$res = mysqli_query($conn, $query); 

if($res == null){
    echo("Errore nella function MYSQLI_QUERY"); //allert in js
    return false; 
} 

$utente = mysqli_fetch_assoc($res); 

$nome = mysqli_real_escape_string($conn, $utente['nome']);
$cognome = mysqli_real_escape_string($conn, $utente['cognome']); 
$email = mysqli_real_escape_string($conn, $utente['email']); 
$username = mysqli_real_escape_string($conn, $utente['username']);
$url_profilo = mysqli_real_escape_string($conn, $utente['Pimage']);

?>

<html>
    <head>
        <link rel ="stylesheet" href = "home.css"></link>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <title>IL TUO PROFILO</title>
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
        <main>
            <div class = "titolo">
                IL TUO PROFILO
            </div>
            
            <ul class = "info">
                <li>NOME: <?php echo ($nome) ?></li>
                <li>COGNOME: <?php echo($cognome) ?></li>
                <li>EMAIL: <?php echo($email) ?></li>
                <li>USERNAME: <?php echo($username) ?></li>
            </ul>

            <div id = "conteiner_img"><img src=<?php echo($url_profilo) ?> ></div>

        </main>
    </body>
</html>