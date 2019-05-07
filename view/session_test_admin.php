<?php
    session_start();
    if(!isset($_SESSION['Admin'])){
        header("Location: _Login.php");
    }

?>