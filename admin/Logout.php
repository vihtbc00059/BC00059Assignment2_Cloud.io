<?php
    session_start();
    unset($_SESSION['AdminAcc']);
    header("Location: Login.php");
?>