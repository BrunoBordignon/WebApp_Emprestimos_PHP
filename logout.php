<?php
    session_start();

    unset($_SESSION['id']);
    unset($_SESSION['user']);
    unset($_SESSION['acctipo']);

    header("Location: index.php");
    
?>