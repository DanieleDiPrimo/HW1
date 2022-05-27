<?php
    require_once 'db_config.php';
    session_start();

    function ControlloSessione() {
        if(isset($_SESSION['username'])) {
            return $_SESSION['username'];
        } else 
            return 0;
    }
?>