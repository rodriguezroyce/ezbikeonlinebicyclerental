<?php
    include_once "functions.php";
    session_start();
    session_unset();
    session_destroy();
    redirectTo("index.php");
?>