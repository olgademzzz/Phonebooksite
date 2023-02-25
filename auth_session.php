<?php
session_start();
    //This IF statement checks in the session is currently active, If this is not the case the user will always be redirected to login
    if(!isset($_SESSION["username"])) {
        header("Location: login.php");
        exit();
    }
?>
