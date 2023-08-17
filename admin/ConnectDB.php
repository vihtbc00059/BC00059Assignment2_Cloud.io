<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product_manager";

    $conn = new mysqli($host, $username, $password, $dbname);

    if($conn->connect_error)
        die("Can not connect DB server" . $conn->connect_error);
    // else
    //     echo "Connect DB successful";
?>