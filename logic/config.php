<?php

    # Database connection code 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "user_data";


    # Create connection
    $conn = new mysqli($server, $username, $password, $database);

    # Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    # echo "Connected successfully";

?>
