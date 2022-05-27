<?php 

  require_once "Controllo_sessione.php";
  
  if(ControlloSessione() != 0){
    header("Location: homePage.php");
    exit;
  }
  
  if(!empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])){
        

    $conn = mysqli_connect($db_config['host'], $db_config['username_db'], $db_config['password_db'], $db_config['db_name']);
    $error = array();
    
    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])){
      $error[] =  "L'username non rispetta il pattern";  
    }else{
      $username= mysqli_real_escape_string($conn , $_POST["username"]);
      $query = "SELECT username FROM utente WHERE username = '$username'"; 
      $res = mysqli_query($conn, $query);

      if(mysqli_num_rows($res) > 0){
        $error[] = "Username già in uso";
      }

    }
    
    if(strlen($_POST['password']) < 8){
      $error[] = "Password troppo corta";
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $error[] = "Email non valida";
    }else{
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $query = "SELECT email FROM utente where email = '$email' "; 
      $res = mysqli_query($conn, $query); 

      if(mysqli_num_rows($res) > 0){ //vuol dire che la mail utilizzata in fase di registrazione è presente nel database
        $error[] = "Email già utilizzata";
      }      

    }

    if(count($error) == 0){
      $password = mysqli_real_escape_string($conn, $_POST["password"]); 

      $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
      $cognome = mysqli_real_escape_string($conn, $_POST["cognome"]);
      $immagine = mysqli_real_escape_string($conn, $_POST["avatar"]);
      $query2 = "INSERT INTO utente(nome, cognome, email, username, password, Pimage) VALUES ('$nome', '$cognome', '$email', '$username', '$password', '$immagine')"; 
        
      $ris = mysqli_query($conn, $query2);
        
      if($ris != false ){
        header("Location: login.php");
        mysqli_close($conn);
        exit; 
      }else{
        echo "errore nella query2";
      }
    }
  }


?>

<html>
    <head>
        <link rel = "stylesheet" href = "file_nonmio.css" >
        <title>Registrazione</title>
        <script src="check_registrazione.js" defer = "true"></script>
        <link href="//db.onlinewebfonts.com/c/a4e256ed67403c6ad5d43937ed48a77b?family=Core+Sans+N+W01+35+Light" rel="stylesheet" type="text/css"/>
        <link rel = "stylesheet" href = "registrazione.css">
    </head>
    <body>
    <?php
    if(isset($error)){
     
      foreach($error as $errore){
        echo "<p class = 'alert alert-error'>";
        echo "$errore";
        echo "</p>";
      }

    }
    ?>
        <main>

          <div class="body-content">
          <div class="module">
          <h1>Crea il tuo account</h1>
          <form name = "form_reg" method="post">
          <label><input class ="nome" type="text" placeholder="Nome" name="nome"  /></label>
          <label><input class = "cognome" type="text" placeholder="Cognome" name="cognome" /></label>
          <label><input class = "email" type="email" placeholder="Email" name="email"  /></label>
          <label><input class = "username" type="text" placeholder="Username" name="username"  /></label>
          <label><input class = "password" type="password" placeholder="Password" name="password"  /></label>
          <div class="avatar"><label>LINK della tua immagine del profilo </label><input type="text" name="avatar"/></div>
          <input type="submit" value="Registrati" name="registrati" class="btn btn-block btn-primary" />
          </form>
          <div class="b_registrazione">Hai già un account? <a href="login.php">LOGIN</a></div>
          </div>
          <div id ="errore"></div>

        </main>
    </body>
</html>



